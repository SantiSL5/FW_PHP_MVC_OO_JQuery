<?php

class controller_login {
    function list() {
        common::loadView('top_page_login.php', VIEW_PATH_LOGIN . 'login.html');
    }

    function listregister() {
        common::loadView('top_page_register.php', VIEW_PATH_LOGIN . 'register.html');
    }
    
    function register() {
        $json = common::loadModel(MODEL_PATH_LOGIN, "login_model", "register", $con);
        echo json_encode($json);
    }
    
    function login() {
        $json = common::loadModel(MODEL_PATH_LOGIN, "login_model", "login",$con);
        echo json_encode($json);
    }

    function menu_info() {
        $json = common::loadModel(MODEL_PATH_LOGIN, "login_model", "menu_info", $con);
        echo json_encode($json);
    }

}


    // $path = $_SERVER['DOCUMENT_ROOT'];
    // include ($path . "/module/login/model/DAOLogin.php");

    // switch($_GET['op']){
    //     case 'register';
    //         include($path . "/module/login/model/validate.php");
    //         try{
    //             $check=validate($_POST['username'],$_POST['email']);
    //             if ($check['username'] && $check['email']) {
    //                 $daologin = new DAOLogin();
    //                 $rdo = $daologin->register();
    //                 $check[0]=true;
    //             }else{
    //                 $check[0]=false;
    //             }
    //         }catch (Exception $e){
    //             // $callback = 'index.php?page=503';
	// 		    // die('<script>window.location.href="'.$callback .'";</script>');
    //         }
            
    //         if(!$rdo){
    //             echo json_encode($check);
    //             exit;
    //         }else{
    //             // echo json_encode($_POST['username']." ".$_POST['email']);
    //             echo json_encode($check);
    //             exit;
    //         }
    //         break;
    //     case 'login';
    //         try{
    //             $daologin = new DAOLogin();
    //             $rdo = $daologin->login();
    //         }catch (Exception $e){
    //             $callback = 'index.php?page=503';
	// 		    die('<script>window.location.href="'.$callback .'";</script>');
    //         }
            
    //         if(!$rdo){
    //             echo json_encode("error");
    //             exit;
    //         }else{
    //             echo json_encode($rdo);
    //             exit;
    //         }
    //         break;

    //     case 'menu_info';
    //         try{
    //             $daologin = new DAOLogin();
    //             $rdo = $daologin->menuinfo($_POST['token']);
    //         }catch (Exception $e){
    //             $callback = 'index.php?page=503';
    //             die('<script>window.location.href="'.$callback .'";</script>');
    //         }
            
    //         if(!$rdo){
    //             echo json_encode("error");
    //             exit;
    //         }else{
    //             echo json_encode($rdo);
    //             exit;
    //         }
    //         break;

    //     default;
    //         include("view/inc/404.html");
    //         break;
    // }