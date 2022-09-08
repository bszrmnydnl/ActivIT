<?php

/**
 * @file
 * Administration side of the Weather app.
 */

/**
 * Administration page for submissions on Weather app form.
 */
function weather_admin_list(){
    $results = db_query("SELECT * FROM {weather}");

    $header = array(t('Name'), t('Longitude'), t('Latitude'));
    $rows = array();

    foreach($results as $result){
        $rows[] = array(
            $result->name,
            $result->longitude,
            $result->latitude,
        );
    }
    return theme('table', array('header' => $header, 'rows' => $rows));
}

/**
 * Administration form for Weather app.
 */
function weather_admin_form($form, &$form_state){

    $form['name'] = array(
        '#type' => 'textfield',
        '#title' => 'Name',
        '#size' => 20,
        '#maxlength' => 20,
        '#required' => TRUE,
        '#description' => t('Name of the location.')
    );

    $form['longitude'] = array(
        '#type' => 'textfield',
        '#title' => 'Longitude',
        '#size' => 20,
        '#maxlength' => 20,
        '#required' => TRUE,
        '#default_value' => '0.00000',
        '#description' => t('Longitudinal coordinates.')
    );

    $form['latitude'] = array(
        '#type' => 'textfield',
        '#title' => 'Latitude',
        '#size' => 20,
        '#maxlength' => 20,
        '#required' => TRUE,
        '#default_value' => '0.00000',
        '#description' => t('Latitudinal coordinates.')
    );

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Submit')
    );

    return $form;
}
/**
 * Admin form
 */
function weather_admin_form_submit($form, &$form_state){
    $w_id = db_insert('weather')
        ->fields(array(
            'name' => $form_state['values']['name'],
            'latitude' => $form_state['values']['latitude'],
            'longitude' => $form_state['values']['longitude'],
        ))
        ->execute();
    drupal_set_message(t('Your form has been submitted!'));
}