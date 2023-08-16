<?php
	$to = "talharasheedhadooksoft@gmail.com"; // Recipient Email Address
	
	$errors = array();
	
	if ($_SERVER['REQUEST_METHOD'] != "POST")
	{
		$errors[] = "No data was sent!";
	}
	
	if (empty($_POST['captcha-solution']))
	{
		$errors[] = "No captcha solution was provided!";
	}
	
	if (empty($_POST['captcha-response']))
	{
		$errors[] = "No captcha response was provided!";
	}
	
	if (!$errors && $_POST['captcha-solution'] != $_POST['captcha-response'])
	{
		$errors[] = "Captcha response is incorrect!";
	}
	
	if (!$errors)
	{
		$email = "You have a new form submission...\n\n";
		foreach ($_POST as $name => $value)
		{
			if ($name != "captcha-solution" && $name != "captcha-response")
			{
				$email .= "$name: $value\n";
			}
		}
		if (mail($to, "Form Submission", $email))
		{
			echo "Form submitted successfully!";
		}
		else
		{
			$errors[] = "Form failed to send!";
		}
	}
	
	if ($errors)
	{
		echo "Sorry, something went wrong:";
		echo "<ul>";
		foreach ($errors as $error)
		{
			echo "<li>$error</li>";
		}
		echo "</ul>";
	}
?>