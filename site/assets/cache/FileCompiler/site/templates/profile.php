<?php namespace ProcessWire;

include 'partials/_sales_header.php'; 
include 'partials/_check_login.php'; 

if ($input->post->curr_passwd && $input->post->new_passwd && $input->post->confirm_passwd) {
	$curr_passwd = $sanitizer->text($input->post->curr_passwd);
	$new_passwd = $sanitizer->text($input->post->new_passwd);
	$confirm_passwd = $sanitizer->text($input->post->confirm_passwd);

	$output = "";
	$u = $user;

	if ($session->login($u->name,$curr_passwd)) {
		//correct password
		if ($new_passwd == $confirm_passwd) {
			$u->of(false);
			$u->pass = $confirm_passwd;
			$u->save();

			$output = "Password changed successfully.";
		}else{
			$output = "New passwords not matching, please try again.";
		}
		
	}else{
		//wrong password
		$output = "Wrong current password, please try again.";
	}

}

?>
<div class="uk-container uk-flex uk-flex-center uk-flex-middle uk-container-large" data-uk-height-viewport="expand: true">

<div class="uk-card uk-card-default uk-width-large">
	<?php if ($output != ""): ?>
		<div class="uk-alert-primary" uk-alert>
		    <a class="uk-alert-close" uk-close></a>
		    <p><?=$output?></p>
		</div>
	<?php endif ?>
	<div class="uk-card-header">
		<h3 class="uk-h4 uk-margin-remove">Change Password</h3>
	</div>
	<div class="uk-card-body">
		<form action="<?=$page->url?>" method="POST">
			<div class="uk-margin">
				<label><!-- <div class="uk-margin-small-bottom">Current Password</div> -->
					<input type="password" class="uk-input" name="curr_passwd" placeholder="Current Password" tabindex="1" required minlength="8" />
				</label>
			</div>
			<hr class="uk-hr" />
			<div class="uk-margin">
				<label><!-- <div class="uk-margin-small-bottom">New Password</div> -->
					<input type="password" class="uk-input" name="new_passwd" placeholder="New Password" tabindex="2" required minlength="8" />
				</label>
			</div>
			<div class="uk-margin">
				<label><!-- <div class="uk-margin-small-bottom">Confirm Password</div> -->
					<input type="password" class="uk-input" name="confirm_passwd" placeholder="Confirm Password" tabindex="3" required minlength="8" />
				</label>
			</div>
			<div class="uk-margin">
				<button type="submit" class="uk-button uk-button-large uk-button-primary">Change Password</button>
			</div>
		</form>
	</div>
</div>

</div><!-- uk-container -->
<?php include 'partials/_sales_footer.php'; ?>