<?php

/**
 * @file
 * Administration side of the Multistep form module.
 */

/**
 * Administration page for submissions on Multistep form.
 */
function multistep_form_admin_list(){
$results = db_query("SELECT * FROM {multistep_form}");

$header = array(t('Name'), t('Address'), t('IBAN'));
$rows = array();

foreach($results as $result){
$rows[] = array(
$result->name,
$result->address,
$result->iban,
);
}
return theme('table', array('header' => $header, 'rows' => $rows));
}