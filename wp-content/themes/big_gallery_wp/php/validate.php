<?php
session_start(); 
error_reporting(E_ERROR);
include_once 'securimage/securimage.php';


header("Content-Type: text/html; charset=utf-8");
// Start the main function
if($_POST["mail"]==1)
{
	sendEmail();
}
else
	validateData();

// Validates data and sending e-mail
function sendEmail()
{
	$output = '';
	$error = 0;
	if(!$_POST['name'])
	{
		$output .= '<p>'.$_POST['insert_name'].'</p>';
		$error = 1;
	}
	if(!strip_tags($_POST['email']))
	{
		$output .= '<p>'.$_POST['insert_email'].'</p>';
		$error = 1;
	}
	elseif(!(ereg("^([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}$", $_POST['email'], $regs)))
	{
		$output .= '<p>'.$_POST['wrong_email'].'</p>';
		$error = 1;
	}
	
	if(!$_POST['message'])
	{
		$output .= '<p>'.$_POST['insert_message'].'</p>';
		$error = 1;
	}
	//captcha 
	if($_POST['capreq']=="1")
	{	
		if(!isset($securimage)) {
			$securimage = new Securimage();
		}
		if ($securimage->check($_POST['captcha_code']) == false) {
			$output .= '<p>'.$_POST['wrong_captcha'].'</p>';
			$error = 1;
		}
	}
	if($error)
	{
		echo '<blockquote class="error margin_1line margin_bottom_1line">'.$output.'</blockquote>';
	}
	else
	{
			$custom1 = ($_POST['custom1_title'])?$_POST['custom1_title'].': '.$_POST['custom1']:false;
			$custom2 = ($_POST['custom2_title'])?$_POST['custom2_title'].': '.$_POST['custom2']:false;
			$custom3 = ($_POST['custom3_title'])?$_POST['custom3_title'].': '.$_POST['custom3']:false;
			$to = strip_tags($_POST['to_email']);
			$headers    = array
			(
				'MIME-Version: 1.0',
				'Content-Type: text/plain; charset="UTF-8";',
				'Content-Transfer-Encoding: 7bit',
				'Date: ' . date('r', $_SERVER['REQUEST_TIME']),
				'Message-ID: <' . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME']) . '@' . $_SERVER['SERVER_NAME'] . '>',
				'From: ' . strip_tags($_POST['email']),
				'Reply-To: ' . strip_tags($_POST['email']),
				'Return-Path: ' . strip_tags($_POST['email']),
				'X-Mailer: PHP v' . phpversion(),
				'X-Originating-IP: ' . $_SERVER['SERVER_ADDR'],
    );
$subject =  strip_tags($_POST['mail_title']);
$mbody = "
Sender:
".strip_tags($_POST['name'])."
".strip_tags($_POST['email'])."
".$custom1."
".$custom2."
".$custom3."
			
Message:
".$_POST['message']."
";
			if(mail($to, $subject, $mbody, implode("\n", $headers)))
			{
				echo '<blockquote class="success margin_1line margin_bottom_1line">'.strip_tags($_POST['mail_success']).'</blockquote>';
			}
			else
			{
				echo '<blockquote class="error margin_1line margin_bottom_1line">'.strip_tags($_POST['mail_error']).'</blockquote>';				
			}
	}
}

function validateData() {
	
	$required = $_GET["required"];
	$type = $_GET["type"];
	$value = $_GET["value"];

	validateRequired($required, $value, $type);

	switch ($type) {
		case 'number':
			validateNumber($value);
			break;
		case 'alphanum':
			validateAlphanum($value);
			break;
		case 'alpha':
			validateAlpha($value);
			break;
		case 'date':
			validateDate($value);
			break;
		case 'email':
			validateEmail($value);
			break;
		case 'url':
			validateUrl($value);
		case 'all':
			validateAll($value);
		//case 'phpcaptcha':
		//	validatePhpcaptcha($value);
		break;
	}
}

// The function to check if a field is required or not
function validateRequired($required, $value, $type) {
	if($required == "required") {

		// Check if we got an empty value
		if($value == "") {
			echo "false";
			exit();
		}
	} else {
		if($value == "") {
			echo "none";
			exit();
		}
	}
}

// Validation of an Email Address
function validateEmail($value) {
	if(ereg("^([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}$", $value, $regs)) {
		echo "true";
		exit();
	} else {
		echo "false";
		exit();
	}
}

// Validation of a date
function validateDate($value) {
	if(ereg("^(([1-9])|(0[1-9])|(1[0-2]))\/(([0-9])|([0-2][0-9])|(3[0-1]))\/(([0-9][0-9])|([1-2][0,9][0-9][0-9]))$", $value, $regs)) {
		echo "true";
		exit();
	} else {
		echo "false";
		exit();
	}
}

// Validation of an URL
function validateUrl($value) {
	if(ereg("^(http|https|ftp)\://[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(:[a-zA-Z0-9]*)?/?([a-zA-Z0-9\-\._\?\,\'/\\\+&amp;%\$#\=~])*[^\.\,\)\(\s]$", $value, $regs)) {
		echo "true";
		exit();
	} else {
		echo "false";
		exit();
	}
}

// Validation of characters
function validateAlpha($value) {
	if(ereg("^[a-zA-Z]+$", $value, $regs)) {
		echo "true";
		exit();
	} else {
		echo "false";
		exit();
	}
}

// Validation of characters and numbers
function validateAlphanum($value) {
	if(ereg("^[a-zA-Z0-9]+$", $value, $regs)) {
		echo "true";
		exit();
	} else {
		echo "false";
		exit();
	}
}

// Validation of numbers
function validateNumber($value) {
	if(ereg("^[0-9]+$", $value, $regs)) {
		echo "true";
		exit();
	} else {
		echo "false";
		exit();
	}
}

// Validation of numbers
function validateAll($value) {
		echo "true";
		exit();
}

function validatePhpcaptcha($value) {
	include_once 'securimage/securimage.php';
	$securimage = new Securimage();
	if ($securimage->check($value) == false) {
		echo "false";
		exit();
	} else {
		echo "true";
		exit();
	}
}

?>
