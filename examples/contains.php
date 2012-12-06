#!/usr/bin/php -q
<?php

require "../gump.class.php";

$validator = new GUMP();

$rules = array(
	'account_type' => 'required|contains,pro free basic premium',
);

// Valid Data
$_POST_VALID = array(
	'account_type' => 'pro'
);

$valid = $validator->validate(
	$_POST_VALID, $rules
);

if($valid !== true) {
	echo $validator->get_readable_errors(true);
} else {
	echo "Validation passed! \n";
}

// Invalid
$_POST_INVALID = array(
	'account_type' => 'bad'
);

$invalid = $validator->validate(
	$_POST_INVALID, $rules
);

if($invalid !== true) {
	echo $validator->get_readable_errors(true);
} else {
	echo "Validation passed!";
}