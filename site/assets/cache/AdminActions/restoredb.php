<?php
if(file_exists('/var/www/html/in/onlineleads/site/assets/cache/AdminActions/AdminActionsBackup.sql')) {
	$db = new PDO('mysql:host=localhost;dbname=lms', 'root', 'asdf@1234');
	$sql = file_get_contents('/var/www/html/in/onlineleads/site/assets/cache/AdminActions/AdminActionsBackup.sql');
	$qr = $db->query($sql);
}
if(isset($qr) && $qr) {
	echo 'The database was successfully restored.';
}
else {
	echo 'Sorry, there was a problem and the database could not be restored.';
}