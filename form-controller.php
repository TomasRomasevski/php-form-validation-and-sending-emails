<?php
$errors = '';
$myEmail = 'no-reply@example.com';

//Checks if input fields are not empty. If at least one field is empty, puts value into $errors variable
if (empty($_POST['firstName'])  || 
    empty($_POST['lastName'])  || 
    empty($_POST['phone'])  || 
    empty($_POST['email']) || 
    empty($_POST['age'])  || 
    empty($_POST['socialMedia'])  || 
    empty($_POST['youtubeUrl'])  || 
    empty($_POST['aboutMe'])  || 
    !isset($_POST['acceptTerms']) ||
    (!isset($_POST['month8'])  && !isset($_POST['month9']))){
        $errors .= "\n Error: Please complete all fields";
}

//assigns html form inputs into php variables
$firstNameForm = $_POST['firstName']; 
$lastNameForm = $_POST['lastName']; 
$emailForm = $_POST['email']; 
$phoneForm = $_POST['phone']; 
$ageForm = $_POST['age'];
$socialMediaForm = $_POST['socialMedia'];
$youtubeUrlForm = $_POST['youtubeUrl'];
$aboutMeForm = $_POST['aboutMe'];
$month8Form = isset($_POST['month8']) ? "Yes" : "No";
$month9Form = isset($_POST['month9']) ? "Yes" : "No";
$acceptTermsForm = isset($_POST['acceptTerms']) ? "Yes" : "No";

//checks if an email address has all valid characters, if not, puts value into $error variable
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$emailForm))
{
    $errors .= "\n Error: invalid email";
}

//if there is no $errors sends 3 emails to different recipients. 
if( empty($errors)){
    $to = $myEmail;
    $email_subject = "Casting: $firstNameForm $lastNameForm";
    $email_body = 
        "<table><thead><tr>" . 
            "<th>8 month</th>".
            "<th>9 month</th>".
            "<th>first</th>".
            "<th>last</th>".
            "<th>age</th>".
            "<th>email</th>".
            "<th>phone</th>".
            "<th>youtube</th>".
            "<th>social</th>".
            "<th>about</th>".
            "<th>terms</th>".
        "</tr></thead><tbody><tr>" . 
            "<td>$month8Form</td>".
            "<td>$month9Form</td>".
            "<td>$firstNameForm</td>".
            "<td>$lastNameForm</td>".
            "<td>$ageForm</td>".
            "<td>$emailForm</td>".
            "<td>$phoneForm</td>".
            "<td>$youtubeUrlForm</td>".
            "<td>$socialMediaForm</td>".
            "<td>$aboutMeForm</td>".
            "<td>$acceptTermsForm</td>".
        "</tr></tbody></table>";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: ' . "no-reply@xample.com" ."\r\n";
    $headers .= 'Reply-To: ' . $emailForm . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
    mail($to,$email_subject,$email_body,$headers);
    
    $headers2 = 'MIME-Version: 1.0' . "\r\n";
    $headers2 .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers2 .= 'From: ' . "no-reply@example.com" ."\r\n";
    $headers2 .= 'Reply-To: ' . $emailForm . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
    mail("info@example2.com",$email_subject,$email_body,$headers);

    $to_client = $emailForm;
    $email_subject_for_client = "It's an automatic reply";
    $email_body_for_client = 
        "Thank you for your submission. We'll get back to you soon! \n\n
        Contact us if you have any questions: \n
        info@example.com";
    $headers_for_client = 'MIME-Version: 1.0' . "\r\n";
    $headers_for_client .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers_for_client .= 'From: ' . "no-reply@example.com" ."\r\n";
    $headers_for_client .= 'Reply-To: ' . "info@example3.com" . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
    mail($to_client,$email_subject_for_client,$email_body_for_client,$headers_for_client);


    //redirect to the 'thank you' page
    header('Location: thank-you.html');
}
?>
