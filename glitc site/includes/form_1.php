<?php	
	if (empty($_POST['name']) && strlen($_POST['name']) == 0 || empty($_POST['email']) && strlen($_POST['email']) == 0 || empty($_POST['message']) && strlen($_POST['message']) == 0)
	{
		return false;
	}
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$optin = $_POST['optin'];
	
	$to = 'tishka3112@gmail.com'; // Email submissions are sent to this email

	// Capture
	$secretKey = '6LcB91YaAAAAAOxRoY7EU2PYYthG6ypDq14k-hfu';
    $captcha = $_POST['g-recaptcha-response'];

    if (!$captcha)
    {
    	echo 'capture-error';
    	exit;
    }

	// Capture
	$ip = $_SERVER['REMOTE_ADDR'];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);

    if (intval($responseKeys["success"]) !== 1)
    {
    	echo 'capture-connection-error';
    	exit;
    }
    else
    {   
    	// Create email	
		$email_subject = "Сообщение с сайта BПдшеср.";
		$email_body = "Вы получили новое сообщение. \n\n".
		"Name: $name \nEmail: $email \nMessage: $message \nOptin: $optin \n";
		$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
		$headers .= "From: contact@glitch-site.pp.ua\n";
		$headers .= "Reply-To: $email";	
	
		mail($to,$email_subject,$email_body,$headers); // Post message
    }			
?>
