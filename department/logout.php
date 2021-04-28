<?php
require_once 'core/init.php';

$user = new Department();
$user->logout();

Redirect::to('../index.php');