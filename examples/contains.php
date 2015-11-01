#!/usr/bin/php -q
<?php

require "../gump.class.php";

$validator = new GUMP();
$validator->set_i8n(
  array(
      'mismatch' => 'There is no validation rule for {field}',
      'validate_required' => 'The {field} field is required',
      'validate_valid_email' => 'The {field} field is required to be a valid email address',
      'validate_max_len' => 'The {field} field needs to be {params} or shorter in length',
      'validate_min_len' => 'The {field} field needs to be {params} or longer in length',
      'validate_exact_len' => 'The {field} field needs to be exactly {params} characters in length',
      'validate_alpha' => 'The {field} field may only contain alpha characters(a-z)',
      'validate_alpha_numeric' => 'The {field} field may only contain alpha-numeric characters',
      'validate_alpha_dash' => 'The {field} field may only contain alpha characters &amp; dashes',
      'validate_numeric' => 'The {field} field may only contain numeric characters',
      'validate_integer' => 'The {field} field may only contain a numeric value',
      'validate_boolean' => 'The {field} field may only contain a true or false value',
      'validate_float' => 'The {field} field may only contain a float value',
      'validate_valid_url' => 'The {field} field is required to be a valid URL',
      'validate_url_exists' => 'The {field} URL does not exist',
      'validate_valid_ip' => 'The {field} field needs to contain a valid IP address',
      'validate_valid_cc' => 'The {field} field needs to contain a valid credit card number',
      'validate_valid_name' => 'The {field} field needs to contain a valid human name',
      'validate_contains' => 'El campo {field} solo debe contener los siguientes valores : {params}',
      'validate_street_address' => 'The {field} field needs to be a valid street address',
      'validate_date' => 'The {field} field needs to be a valid date',
      'validate_min_numeric' => 'The {field} field needs to be a numeric value, equal to, or higher than {params}',
      'validate_max_numeric' => 'The {field} field needs to be a numeric value, equal to, or lower than {params}',
      'validate_min_age' => 'The {field} field needs to have an age greater than or equal to {params}',
      'default' => 'The {field} field is invalid'
    )
);

$rules = array(
  'account_type' => "required|contains,pro free basic premium",
  'priority'     => "required|contains,'low' 'medium' 'very high'",
);

echo "\nVALID DATA TEST:\n\n";

// Valid Data
$_POST_VALID = array(
  'account_type' => 'pro',
  'priority'     => 'very high'
);

$valid = $validator->validate(
  $_POST_VALID, $rules
);

if($valid !== true) {
  echo $validator->get_readable_errors(true);
} else {
  echo "Validation passed! \n";
}

echo "\nINVALID DATA TEST:\n\n";

// Invalid
$_POST_INVALID = array(
  'account_type' => 'bad',
  'priority'     => 'unknown'
);

$invalid = $validator->validate(
  $_POST_INVALID, $rules
);

if($invalid !== true) {
  echo $validator->get_readable_errors(true);
  echo "\n\n";
} else {
  echo "Validation passed!\n\n";
}