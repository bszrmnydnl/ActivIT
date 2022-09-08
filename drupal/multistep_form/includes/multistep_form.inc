<?php

/**
 * @file
 * Multistep form
 */

/**
 * Imports the steps from an include file.
 */
module_load_include('inc', 'multistep_form', 'includes/multistep_form_steps');

/**
 * Returns the list of steps and their associated forms.
 */
function _multistep_form_steps()
{
    return array(
        1 => array(
            'form' => 'multistep_form_personal_info',
        ),
        2 => array(
            'form' => 'multistep_form_location_info',
        ),
        3 => array(
            'form' => 'multistep_form_iban',
        ),
    );
}

/**
 * The form builder function.
 */
function multistep_form($form, &$form_state)
{

    if (empty($form_state['step'])) {
        $form_state['step'] = 1;

        $form_state['step_information'] = _multistep_form_steps();
    }
    $step = &$form_state['step'];
    drupal_set_title(t('Multistep form: Step @step', array('@step' => $step)));

    $form = $form_state['step_information'][$step]['form']($form, $form_state);

    if ($step > 1) {
        $form['prev'] = array(
            '#type' => 'submit',
            '#value' => t('Previous'),
            '#name' => 'prev',
            '#submit' => array('multistep_form_previous_submit'),
            '#limit_validation_errors' => array(),
        );
    }

    if ($step < count($form_state['step_information'])) {
        $form['next'] = array(
            '#type' => 'submit',
            '#value' => t('Next'),
            '#name' => 'next',
            '#submit' => array('multistep_form_next_submit'),
        );
    } else {

        $form['finish'] = array(
            '#type' => 'submit',
            '#value' => t('Finish'),
        );
    }

    if (function_exists($form_state['step_information'][$step]['form'] . '_validate')) {
        $form['next']['#validate'] = array($form_state['step_information'][$step]['form'] . '_validate');
    }

    return $form;
}

/**
 * Submit handler for the 'previous' button.
 */
function multistep_form_previous_submit($form, &$form_state)
{
    $current_step = &$form_state['step'];
    $form_state['step_information'][$current_step]['stored_values'] = $form_state['input'];
    if ($current_step > 1) {
        $current_step--;
        $form_state['values'] = $form_state['step_information'][$current_step]['stored_values'];
    }
    $form_state['rebuild'] = TRUE;
}

/**
 * Submit handler for the 'next' button.
 */
function multistep_form_next_submit($form, &$form_state)
{
    $current_step = &$form_state['step'];
    $form_state['step_information'][$current_step]['stored_values'] = $form_state['values'];

    if ($current_step < count($form_state['step_information'])) {
        $current_step++;
        if (!empty($form_state['step_information'][$current_step]['stored_values'])) {
            $form_state['values'] = $form_state['step_information'][$current_step]['stored_values'];
        } else {
            $form_state['values'] = array();
        }
        // Force rebuild with next step.
        $form_state['rebuild'] = TRUE;
        return;
    }
}

/**
 * Submit handler for the finish button => actual submit handler.
 */
function multistep_form_submit($form, &$form_state)
{
    $name = '';
    $address = '';
    $iban = '';

    $current_step = &$form_state['step'];
    $form_state['step_information'][$current_step]['stored_values'] = $form_state['values'];

    foreach ($form_state['step_information'] as $index => $value) {

        unset($value['stored_values']['form_id']);
        unset($value['stored_values']['form_build_id']);
        unset($value['stored_values']['form_token']);

        switch ($index) {
            case 1:
                $name = $value['stored_values']['first_name'] . ' ' . $value['stored_values']['last_name'];
                break;
            case 2:
                $address = $value['stored_values']['street'] . ' ' . $value['stored_values']['number'] . ', ' . $value['stored_values']['city'] . ' ' . $value['stored_values']['zip'];
                break;
            case 3:
                $iban = $value['stored_values']['iban'];
                break;
        }
    }

    $f_id = db_insert('multistep_form')
        ->fields(array(
            'name' => $name,
            'address' => $address,
            'iban' => $iban,
        ))
        ->execute();
    drupal_set_message(t('Your form has been submitted!'));
}
