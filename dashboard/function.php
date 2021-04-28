<?php


function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

function convert_string($action, $string)
{
    $output = '';
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'eaiYYkYTysia2lnHiw0N0vx7t7a3kEJVLfbTKoQIx5o=';
    $secret_iv = 'eaiYYkYTysia2lnHiw0N0';
    // hash
    $key = hash('sha256', $secret_key);
    $initialization_vector = substr(hash('sha256', $secret_iv), 0, 16);
    if ($string != '') {
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $initialization_vector);
            $output = base64_encode($output);
        }
        if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $initialization_vector);
        }
    }
    return $output;
}

function time_difference($created_time)
{
	date_default_timezone_set('Asia/Calcutta'); //Change as per your default time
	$str = strtotime($created_time);
	$today = strtotime(date('Y-m-d H:i:s'));

	// It returns the time difference in Seconds...
	$time_differnce = $today - $str;

	// To Calculate the time difference in Years...
	$years = 60 * 60 * 24 * 365;

	// To Calculate the time difference in Months...
	$months = 60 * 60 * 24 * 30;

	// To Calculate the time difference in Days...
	$days = 60 * 60 * 24;

	// To Calculate the time difference in Hours...
	$hours = 60 * 60;

	// To Calculate the time difference in Minutes...
	$minutes = 60;

	if (intval($time_differnce / $years) > 1) {
		return intval($time_differnce / $years) . " years ago";
	} else if (intval($time_differnce / $years) > 0) {
		return intval($time_differnce / $years) . " year ago";
	} else if (intval($time_differnce / $months) > 1) {
		return intval($time_differnce / $months) . " months ago";
	} else if (intval(($time_differnce / $months)) > 0) {
		return intval(($time_differnce / $months)) . " month ago";
	} else if (intval(($time_differnce / $days)) > 1) {
		return intval(($time_differnce / $days)) . " days ago";
	} else if (intval(($time_differnce / $days)) > 0) {
		return intval(($time_differnce / $days)) . " day ago";
	} else if (intval(($time_differnce / $hours)) > 1) {
		return intval(($time_differnce / $hours)) . " hours ago";
	} else if (intval(($time_differnce / $hours)) > 0) {
		return intval(($time_differnce / $hours)) . " hour ago";
	} else if (intval(($time_differnce / $minutes)) > 1) {
		return intval(($time_differnce / $minutes)) . " minutes ago";
	} else if (intval(($time_differnce / $minutes)) > 0) {
		return intval(($time_differnce / $minutes)) . " minute ago";
	} else if (intval(($time_differnce)) > 1) {
		return intval(($time_differnce)) . " seconds ago";
	} else {
		return "few seconds ago";
	}
}

function randomColor()
{
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];
	return $color;
}

function convertYoutube($string)
{
	return preg_replace(
		"/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
		"<iframe class=\"embed-responsive-item rounded\" src=\"https://www.youtube.com/embed/$2?autoplay=0&showinfo=0&controls=0&rel=0\" allowfullscreen></iframe>",
		$string
	);
}

function description_l($text, $length)
{
	$length = abs((int)$length);
	if (strlen($text) > $length) {
		$text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
	}
	return ($text);
}

function description($string) {	
    $expr = '/(?<=\s|^)[A-Z]/';
    preg_match_all($expr, $string, $matches);    
    $result = implode('', $matches[0]);
    return $result;
 }
