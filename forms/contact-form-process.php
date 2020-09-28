
<?php     

// if (isset($_POST['Email'])) {

    
//     $email_to = "aeljelladi@gmail.com";
//     $email_subject = "New form submissions";

//     function problem($error)
//     {
//         echo "We are very sorry, but there were error(s) found with the form you submitted. ";
//         echo "These errors appear below.<br><br>";
//         echo $error . "<br><br>";
//         echo "Please go back and fix these errors.<br><br>";
//         die();
//     }

   
//     if (
//         !isset($_POST['Name']) ||
//         !isset($_POST['Email']) ||
//         !isset($_POST['Message'])
//     ) {
//         problem('We are sorry, but there appears to be a problem with the form you submitted.');
//     }

//     $name = $_POST['Name']; // required
//     $email = $_POST['Email']; // required
//     $message = $_POST['Message']; // required

//     $error_message = "";
//     $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

//     if (!preg_match($email_exp, $email)) {
//         $error_message .= 'The Email address you entered does not appear to be valid.<br>';
//     }

//     $string_exp = "/^[A-Za-z .'-]+$/";

//     if (!preg_match($string_exp, $name)) {
//         $error_message .= 'The Name you entered does not appear to be valid.<br>';
//     }

//     if (strlen($message) < 2) {
//         $error_message .= 'The Message you entered do not appear to be valid.<br>';
//     }

//     if (strlen($error_message) > 0) {
//         problem($error_message);
//     }

//     $email_message = "Form details below.\n\n";

//     function clean_string($string)
//     {
//         $bad = array("content-type", "bcc:", "to:", "cc:", "href");
//         return str_replace($bad, "", $string);
//     }

//     $email_message .= "Name: " . clean_string($name) . "\n";
//     $email_message .= "Email: " . clean_string($email) . "\n";
//     $email_message .= "Message: " . clean_string($message) . "\n";

//     // create email headers
//     $headers = 'From: ' . $email . "\r\n" .
//         'Reply-To: ' . $email . "\r\n" .
//         'X-Mailer: PHP/' . phpversion();
//     @mail($email_to, $email_subject, $email_message, $headers);

require 'phpMailer/PHPMailerAutoload.php';
$result='';
$mail = new PHPMailer;

$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';
$mail->Username='aeljelladi@gmail.com';
$mail->Password='ayoub_1995';

$mail->setFrom($_POST['email'],$_POST['name']);
$mail->addAddress('ayoubetnizar@gmail.com');
$mail->addReplyTo($_POST['email'],$_POST['name']);

$mail->isHTML(true);
$mail->Subject='Form Submission: '.$_POST['subject'];
$mail->Body='<h1 align=center>Name: '.$_POST['name'].'<br>Email: '.$_POST['email'].'<br> Message: '.$_POST['message'].'</h1>';

if (!$mail->send()) {
    $result="something went wrong. Please try again";
}else{
    $result="Thanks ".$_POST['name']."for contacting. we'll get back to you soon";
}

//     $name = $_POST['name'];  
//     $email = $_POST['email']; 
//     $message = $_POST['message']; 

// $email_message = "Form details below.\n\n";

//     function clean_string($string)
//     {
//         $bad = array("content-type", "bcc:", "to:", "cc:", "href");
//         return str_replace($bad, "", $string);
//     }

//     $email_message .= "Name: " . clean_string($name) . "\n";
//     $email_message .= "Email: " . clean_string($email) . "\n";
//     $email_message .= "Message: " . clean_string($message) . "\n";

//     // create email headers
//     $headers = 'From: ' . $email . "\r\n" .
//         'Reply-To: ' . $email . "\r\n" .
//         'X-Mailer: PHP/' . phpversion();
//     @mail($email_to, $email_subject, $email_message, $headers); 

?>

  