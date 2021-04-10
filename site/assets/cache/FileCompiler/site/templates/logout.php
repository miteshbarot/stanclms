<?php namespace ProcessWire;

$root = $config->urls->root;

$session->logout();
$session->redirect($root."login/");
