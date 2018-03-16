<?php
use PHPMailer\PHPMailer\PHPMailer;
function sendMail($name,$username,$password,$email){
	try {
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		//Server settings                                 // Enable verbose debug output 
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'briggite_coronel@hotmail.com';                 // SMTP username
		$mail->Password = '25Briicoronel';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		//Recipients
		$mail->setFrom('briggite_coronel@hotmail.com');
		$mail->addAddress($email);
		$mail->AddReplyTo($email);               // Name is optional
		//Attachments
		//Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Contact Message For '.$name;
		$mail->Body    = "<html>
						  <head>
						<title>HTML email</title>
						</head>
						<body>
							<h2> Message information </h2>
							<p> Your account has been created, you can use the credentials listed below to login</p><br><br>
							<table>
							<tr>
								<td>Username: </td>
								<td>".$username."</td>
							</tr>
							<tr>
								<td>Password: </td>
								<td>".$password."
							</table>
							<h3> Url to Login </h3>
							<br>".
							"<a href='"."http://".$_SERVER['HTTP_HOST']."/multimedia_research/admin/admin_login.php"."'>". //$_SERVER ENVIRONMENT VARIABLE IS USED TO EXTRACT BASE URL
							$_SERVER['HTTP_HOST']."/multimedia_research/admin/admin_login.php"."<a/>
						</body>
						</html>
		";
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->send();
		return "Message sent successful!";
	} catch (Exception $e) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		return "Mailer error: ".$mail->ErrorInfo;
	}

}
?> 