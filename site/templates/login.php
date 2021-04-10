<?php

function generateRandomString($length = 10) {
    $characters = '123456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sendMail($to, $name, $body){
    /*	Send Email */
	$mail = wireMail();
	$mail->to($to, $name);
	$mail->subject("Standard Chartered Sales Portal Temporary Password");
	$mail->bodyHTML("<p>Hi,<br/>Your Standard Chartered Sales Portal temporary password is <strong>{$body}</strong>.</p><br/><p></p>");
	$numSent = $mail->send();
	/*	End of Email code  */
}

$tpl = $config->urls->templates;
$root = $config->urls->root;
$liveRoot = "//test-retail.sc.com/in/onlineleads/";

if ($input->post->email && $input->post->password) {
	$output = "";
	$e = $sanitizer->email($input->post->email);
	$p = $sanitizer->text($input->post->password);

	$u = $users->get("name|email=$e");
	if ($u != "") {
		if ($session->login($u->name,$p)) {
			//after successful login, check user's product and accordingly redirect
			switch ($u->product) {
				case '1':
					//pl
					$session->redirect($root."sales-portal/personal-loan/");
					break;
				case '2':
					//cc
					$session->redirect($root."sales-portal/credit-card/");
					break;
				case '3':
					//nr
					$session->redirect($root."sales-portal/nri/");
					break;
				case '4':
					//bb
					$session->redirect($root."sales-portal/business-banking/");
					break;
				default:
					//if no case matches
					$session->redirect($root."sales-portal/");
					break;
			}
			
		}else{
			$output = "Login failed, please try again.";
		}
	}else{
		$output = "Login failed, please try again.";
	}
}

if ($input->post->resetForm) {
	$output = "";
	$e = $sanitizer->email($input->post->email);

	$u = $users->get("email=$e");

	//generate random password
	$passwd = generateRandomString();

	if ($u != "") {
		//reset password
		$u->of(false);
		$u->password = $passwd;
		$u->save();
		
		//mail user the random password
		sendMail($u->email,$u->title,$passwd);
	}else{
		$output = "Unable to find user linked with this email address. Please check and try again.";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sales Portal - Credit Card</title>
	<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/uikit.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/style.css">
</head>
<body class="uk-flex uk-flex-center uk-flex-middle uk-background-muted uk-height-viewport" data-uk-height-viewport>
	<div class="uk-position-bottom-center uk-position-small uk-visible@m uk-position-z-index">
		<span class="uk-text-small uk-text-muted">© 2021 Standard Chartered Bank.</span>
	</div>
	<div class="uk-width-medium uk-padding-small">
		<!-- login -->
		<div class="uk-text-center uk-margin">
			<img src="<?=$tpl?>assets/images/sc_logo.png" style="width: 150px; height: auto;"/>	
		</div>
		
		<form class="toggle-class" action="./" name="loginForm" method="post">
			<fieldset class="uk-fieldset">
				<div class="uk-margin-small">
					<div class="uk-inline uk-width-1-1">
						<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: mail"></span>
						<input class="uk-input uk-border-pill" required placeholder="Email" type="email" name="email" tabindex="1" />
					</div>
				</div>
				<div class="uk-margin-small">
					<div class="uk-inline uk-width-1-1">
						<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: lock"></span>
						<input class="uk-input uk-border-pill" required placeholder="Password" type="password" name="password" tabindex="2" />
					</div>
				</div>
				<!-- <div class="uk-margin-small">
					<label><input class="uk-checkbox" type="checkbox"> Keep me logged in</label>
				</div> -->
				<div class="uk-margin-bottom">
					<button type="submit" class="uk-button uk-button-primary uk-border-pill uk-width-1-1" tabindex="3">LOG IN</button>
				</div>
			</fieldset>
		</form>

		<?php if ($output): ?>
			<div class="uk-alert uk-alert-primary uk-text-center uk-margin">
				<?=$output?>
			</div>
		<?php endif ?>
		<!-- /login -->

		<!-- recover password -->
		<form class="toggle-class" method="post" action="./" hidden>
			<input type="hidden" name="resetForm" value="1" />
			<div class="uk-margin-small">
				<div class="uk-inline uk-width-1-1">
					<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: mail"></span>
					<input class="uk-input uk-border-pill" placeholder="E-mail" required type="email" name="email" />
				</div>
			</div>
			<div class="uk-margin-bottom">
				<button type="submit" class="uk-button uk-button-primary uk-border-pill uk-width-1-1">Reset Password</button>
			</div>
		</form>
		<!-- /recover password -->
		
		<!-- action buttons -->
		<div>
			<div class="uk-text-center">
				<a class="uk-link-reset uk-text-small toggle-class" data-uk-toggle="target: .toggle-class ;animation: uk-animation-fade">Forgot your password?</a>
				<a class="uk-link-reset uk-text-small toggle-class" data-uk-toggle="target: .toggle-class ;animation: uk-animation-fade" hidden><span data-uk-icon="arrow-left"></span> Back to Login</a>
			</div>
		</div>
		<!-- action buttons -->
	</div>
	

<!-- JS FILES -->
<script src="<?=$tpl?>assets/js/uikit.min.js"></script>
<script src="<?=$tpl?>assets/js/uikit-icons.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="<?=$tpl?>assets/js/chartScripts.js"></script> -->
</body>
</html>