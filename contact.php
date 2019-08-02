<?php

/*
FORM HTML
<!--<form class="col s12" action="contact.php" method="post">
    <div class="row">
        <div class="input-field col s6">
            <i class="mdi-action-account-circle prefix white-text"></i>
            <input id="icon_prefix" name="name" type="text" class="validate white-text">
            <label for="icon_prefix" class="white-text">Name</label>
        </div>
        <div class="input-field col s6">
            <i class="mdi-communication-email prefix white-text"></i>
            <input id="icon_email" name="email" type="email" class="validate white-text">
            <label for="icon_email" class="white-text">Email</label>
        </div>
        <div class="input-field col s12">
            <i class="mdi-editor-mode-edit prefix white-text"></i>
            <textarea id="icon_prefix2" name="message" class="materialize-textarea white-text"></textarea>
            <label for="icon_prefix2" class="white-text">Message</label>
        </div>
        <div class="col offset-s7 s5">
            <button class="btn waves-effect waves-light red darken-1" type="submit">Submit
                <i class="mdi-content-send right white-text"></i>
            </button>
        </div>
    </div>
</form>-->
*/

if(isset($_POST['email'])) {

    $email_to = "jason@heardtechnology.com";
 
    $email_subject = "Website Contact";

 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['message'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
 
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";

 
	// create email headers
	 
	$headers = 'From: '.$email."\r\n".
	 
	'Reply-To: '.$email."\r\n" .
	 
	'X-Mailer: PHP/' . phpversion();
	 
	@mail($email_to, $email_subject, $email_message, $headers);  


?>
 
 
 
<!-- include your own success html here -->
 
 
 
Thank you for contacting me. Will be in touch with you very soon.
 
 
 
<?php
 
}
 
?>
