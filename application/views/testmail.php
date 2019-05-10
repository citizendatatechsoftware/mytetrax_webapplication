<?php
$username = 'asanaliyar';
$from = 'asanaliyar@gmail.com';
$to = 'vs.siva13@gmail.com';
$subject = 'This Mail Recived Form Mytetrax';
$message = 'Username :'.$username;
 
sendMail($from, $to, $subject, $message);

function sendMail($from, $to, $subject, $message1)
{
	 
	$from = 'Test <test@gmail.com>';
 	$textVersion = strip_tags($message1);
	$htmlVersion = '<html xmlns="http://www.w3.org/1999/xhtml">';
	$htmlVersion .= $message1;
	$htmlVersion .='</html>';
	$boundary = uniqid('np');
 				$boundary = uniqid('np');
 				//headers - specify your from email address and name here
				//and specify the boundary for the email
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "From: ". $from ." \r\n";
 				$headers .= "Content-Type: multipart/alternative;boundary=" . $boundary . "\r\n";
 				//here is the content body
				$message = "This is a MIME encoded message.";
				$message .= "\r\n\r\n--" . $boundary . "\r\n";
				$message .= "Content-type: text/plain;charset=utf-8\r\n\r\n";
 				//Plain text body
				$message .= $textVersion;
				$message .= "\r\n\r\n--" . $boundary . "\r\n";
				$message .= "Content-type: text/html;charset=utf-8\r\n\r\n";
 				//Html body
				$message .= $htmlVersion;
				$message .= "\r\n\r\n--" . $boundary . "--";
 	if (@mail($to, $subject, $message, $headers)) {
		return true;
	} else {
		return false;
	}
}

?>