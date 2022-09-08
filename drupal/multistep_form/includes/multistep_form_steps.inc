<?php

/**
 * @file
 * Multistep form steps
 */

/**
 * Returns form elements for the 'personal info' page of the wizard.
 */
function multistep_form_personal_info($form, &$form_state) {
    $form = array();
    $form['first_name'] = array(
        '#type' => 'textfield',
        '#title' => t('First Name'),
        '#default_value' => !empty($form_state['values']['first_name']) ? $form_state['values']['first_name'] : '',
    );
    $form['last_name'] = array(
        '#type' => 'textfield',
        '#title' => t('Last Name'),
        '#default_value' => !empty($form_state['values']['last_name']) ? $form_state['values']['last_name'] : '',
    );
    return $form;
}

/**
 * Returns form elements for the 'location info' page of the wizard.
 */
function multistep_form_location_info($form, &$form_state) {
    $form = array();
    $form['street'] = array(
        '#type' => 'textfield',
        '#title' => t('Street'),
        '#required' => TRUE,
        '#default_value' => !empty($form_state['values']['street']) ? $form_state['values']['street'] : '',

    );
    $form['number'] = array(
        '#type' => 'textfield',
        '#title' => t('Building No.'),
        '#required' => TRUE,
        '#default_value' => !empty($form_state['values']['number']) ? $form_state['values']['number'] : '',

    );
    $form['zip'] = array(
        '#type' => 'textfield',
        '#title' => t('Zip code'),
        '#required' => TRUE,
        '#default_value' => !empty($form_state['values']['zip']) ? $form_state['values']['zip'] : '',

    );
    $form['city'] = array(
        '#type' => 'textfield',
        '#title' => t('Municipality'),
        '#required' => TRUE,
        '#default_value' => !empty($form_state['values']['city']) ? $form_state['values']['city'] : '',

    );
    return $form;
}

/**
 * Returns form elements for the 'other info' page of the form.
 */
function multistep_form_iban($form, &$form_state) {
    $form = array();
    $form['iban'] = array(
        '#type' => 'textfield',
        '#title' => t("IBAN"),
        '#default_value' => !empty($form_state['values']['iban']) ? $form_state['values']['iban'] : '',
    );
    return $form;
}