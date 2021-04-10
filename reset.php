<?php

/*require "index.php";
$admin = $users->get('webadmin'); // or whatever your username is
$admin->setAndSave('pass', 'India@2021');
*/
require "index.php";
// $admin = wire('users')->get('admin');
// $admin->setOutputFormatting(false);
// $admin->set('pass', 'India@2021');
// $admin->save('pass');
$u = wire('users')->get('id=40'); // or whatever your username is
$u->off(false);
$u->pass ="Indi@#2021";
$u->save();

?>