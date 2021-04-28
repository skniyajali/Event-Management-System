<?php
require_once 'core/init.php';
if(Input::exists('get')){
    if(Input::get('username') == 'department'){
        $user = new Department();
        $user->logout();
        Redirect::to('index.php');
    }elseif(Input::get('username') == 'faculty'){
        $user = new Faculty();
        $user->logout();
        Redirect::to('index.php');
    }else{
        $user = new Student();
        $user->logout();
        Redirect::to('index.php');
    }    
}


