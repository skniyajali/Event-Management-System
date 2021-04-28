<?php
require_once 'core/init.php';

$user = new Faculty();
$user->logout();

Redirect::to('../index.php');