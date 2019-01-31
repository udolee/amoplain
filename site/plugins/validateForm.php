<?php

function validateForm($data) {

  $response = array();

  // if the honeypot is filled, we set the redirect key to true
  if(!empty($data['website'])) {
    $response['redirect'] = true;

  } else {

    // array of rules for form validation
    $rules = array(
      'email' => array('required', 'email'),
    );

    // array of messages to return if some of the data is not valid
    $messages = array(
      'email' => l::get('valid-email'),
    );

    // evaluate data and rules using the invalid() helper
    if($invalid = invalid($data, $rules, $messages)) {
      $response['errors'] = $invalid;
    } else {
      $response['success'] = true;
    }

  }

  return $response;
}

function addToStructure($p, $field, $data = array()) {

  $response = array();

  // escape user data
  $data = array(
    'email'     => $data['email'],
  );

  // try to add data to field
  try {
    $fieldData = $p->$field()->yaml();
    $fieldData[] = $data;
    $fieldData = yaml::encode($fieldData);
    $p->update(array(
      $field => $fieldData,
    ));

    // if successful, add success message to $response array
    $response['success'] = l::get('newsletter-success');

  } catch(Exception $e) {

    // if it fails, add error message to $response array
    $response['error'] = 'Your registration failed: ' . $e->getMessage();

  }

  return $response;

}
