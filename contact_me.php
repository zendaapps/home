<?php
// check if fields passed are empty

if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

/*
// uncomment for testing
$name = 'Test User';
$email_address = 'TestUser@TestCompany.net';
$message = 'Hi from Test User';
*/

// create email body and send it	
//$to = 'zodiac.seven@gmail.com'; // put your email // WORKING
//$to = 'sales@3techineers.com'; // NOT WORKING
$to = '3techineers@gmail.com, zodiac.seven@gmail.com'; 
$email_subject = ">> 3TECHINEERS URGENT << Contact form submitted at 3Techineers.com by:  $name";
$email_body = "You have received a new message. \n\n".
				  " Here are the details:\n \nName: $name \n ".
				  "Email: $email_address\n Message \n $message";
$headers = "From: zodiac7@3techineers.com\n"; //godaddy user name @ registered domain
//$headers .= "Reply-To: $email_address";	
//$headers .= "Reply-To: zodiac7@3techineers.com";
//var_dump(mail($to,$email_subject,$email_body,$headers));
if (mail($to,$email_subject,$email_body,$headers))
{
	echo "We have received your message. Someone from our team will be in touch with you shortly.";
	return true;
}
else
{
	echo "Looks like there was a problem sending your message. Please email us at sales@3techineers.com";
	return false;
}
?>