<?php
require_once 'core/init.php';

$user = new Student();
$user->logout();

Redirect::to('../index.php');