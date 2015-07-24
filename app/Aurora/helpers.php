<?php
// Global helper functions.
function auto_open_modal()
{
	return
	'<script>
	$(document).ready(function () {
	window.DSModal.open($("#signin-modal"));
	});
	</script>';
}

function addClassToFirstResult()
{
	return
	"<script>
	$(document).ready(function () {
		$('.results').first().addClass('first-result').prepend('<h3>This appears to be the most recent user!</h3>')
	});
	</script>";
}

function time_formatter($date)
{
  $date = date_create($date);

  $date->setTimeZone(new DateTimeZone('America/New_York'));

  return date_format($date, 'Y-m-d h:ia');
}

function message_state_class($message)
{
	if ($message == "sent") {
		echo 'is-sent';
	} elseif ($message == "failed_permanently"){
		echo 'is-failed';
	} else{
		echo 'is-received';
	}
}

//https://github.com/giggsey/libphonenumber-for-php
function sanitize_phone_number($number, $countryName = 'US')
{
	$phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
	try {
		$formattedNumber = $phoneUtil->parse($number, $countryName);
		return $phoneUtil->format($formattedNumber, \libphonenumber\PhoneNumberFormat::INTERNATIONAL);
	}catch (\libphonenumber\NumberParseException $e) {
    Log::error($e);
		return $number;
	}
}
