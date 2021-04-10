<?php
if ($_GET) {
	echo "GET Request : ID =". $_GET['id'];
}
echo "<pre>";
print_r($_POST);
echo "</pre>";