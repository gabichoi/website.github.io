<!-- Gets the values submitted for the fields: name, email, message -->
<?php

  $errors = '';
  if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];

  if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

$myemail = "gabichoi96@gmail.com";
if( empty($errors))
{
  $to = $myemail; 
  $email_subject = "Contact form submission";
  $email_body = "You have received a new message.".
  "Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
  
  $headers = "From: $myemail\n"; 
  $headers .= "Reply-To: $email_address";
  
  mail($to,$email_subject,$email_body,$headers);
  //redirect to the 'thank you' page
  header("Location: index.html");
} 
?>


