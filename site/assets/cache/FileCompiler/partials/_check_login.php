<?php
//check if user is logged in
if ($user->isLoggedin()) {
	//do nothing
}else{
	//redirect to login
	$session->redirect($root."login/");
}
