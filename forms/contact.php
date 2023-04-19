<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'info@amazingpayment.fr';

  if( file_exists($php_email_form = 'class.phpmailer.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHPMailer(true);
  $contact->CharSet = 'UTF-8';
  $contact->isSMTP();
  $contact->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
  $contact->SMTPAuth   = true;                                   //Enable SMTP authentication
  $contact->Username   = 'user@example.com';                     //SMTP username
  $contact->Password   = 'secret';                               //SMTP password
  $contact->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
  $contact->Port       = 465; 
  $contact->AddReplyTo($_POST['email'], $_POST['name']);
  $contact->addAddress($receiving_email_address, 'Receiving Name');
  $contact->Subject = $_POST['subject'];
  $contact->Body = $_POST['message'];
  $mail=$contact->send();
  if($mail){
    echo "ok";
  }else{
    echo "error";
  }
?>
