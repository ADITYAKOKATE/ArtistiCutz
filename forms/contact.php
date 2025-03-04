<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  // Check if the PHP Email Form library file exists before including it
  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  // Create a new instance of the PHP_Email_Form class
  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  // Set the recipient email address
  $contact->to = $receiving_email_address;

  // Set the sender's name, email, and subject from the form input
  $contact->from_name = isset($_POST['name']) ? $_POST['name'] : '';
  $contact->from_email = isset($_POST['email']) ? $_POST['email'] : '';
  $contact->subject = isset($_POST['subject']) ? $_POST['subject'] : '';

  // Uncomment the below block to use SMTP for sending emails (if you have SMTP credentials)
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  // Add the form fields to the message
  $contact->add_message( $contact->from_name, 'From');
  $contact->add_message( $contact->from_email, 'Email');
  $contact->add_message( isset($_POST['message']) ? $_POST['message'] : '', 'Message', 10);

  // Send the email and output the result
  echo $contact->send();
?>
