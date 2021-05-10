<?php

class controller_home {
    function list() {
        common::loadView('top_page_home.php', VIEW_PATH_HOME . 'home.html');
    }
    
    function listall() {
            $daoshop = new DAOShop();
            $json = common::loadModel(MODEL_PATH_HOME, "home_model", "read_all_videogames", $con);
            $rdo = $daoshop->read_all_videogames_BLL();
            echo json_encode($rdo);
    }
    
    function details() {
            $json = common::loadModel(MODEL_PATH_HOME, "home_model", "read_details",$con);
            echo json_encode($rdo);
    }

    function plataforms() {
        $json = common::loadModel(MODEL_PATH_HOME, "home_model", "plataforms", $con);
        echo json_encode($rdo);
    }

    function categories() {
        $json = common::loadModel(MODEL_PATH_HOME, "home_model", "read_details", $con);
        echo json_encode($rdo);
    }

    function rangeslider() {
        $json = common::loadModel(MODEL_PATH_HOME, "home_model", "read_details", $con);
        echo json_encode($rdo);
    }

    function showlike() {
        $json = common::loadModel(MODEL_PATH_HOME, "home_model", "read_details", $con);
        $rdo = $daoshop->read_details($_GET['id']);
        echo json_encode($rdo);
    }

    function like() {
        $json = common::loadModel(MODEL_PATH_HOME, "home_model", "read_details", $con);
        $rdo = $daoshop->read_details($_GET['id']);
        echo json_encode($rdo);
    }

}
        case 'details';
            try{
                $daoshop = new DAOShop();
            	$rdo = $daoshop->read_details($_GET['id']);
            }catch (Exception $e){
                // $callback = 'index.php?page=503';
			    // die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                echo json_encode($rdo);
                exit;
            }
            break;
        case 'plataforms';
            try{
                $daoshop = new DAOShop();
            	$rdo = $daoshop->select_all_plataforms();
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                echo json_encode($rdo);
                exit;
            }
            break;
        case 'categories';
            try{
                $daoshop = new DAOShop();
            	$rdo = $daoshop->select_all_categories();
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                echo json_encode($rdo);
                exit;
            }
            break;
        case 'rangeslider';
            try{
                $daoshop = new DAOShop();
            	$rdo = $daoshop->rangeslider();
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                echo json_encode($rdo);
                exit;
            }
            break;
        case 'showlike';
            try{
                $daoshop = new DAOShop();
            	$rdo = $daoshop->showlike();
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                echo json_encode($rdo);
                exit;
            }
            break;
        case 'like';
            try{
                $daoshop = new DAOShop();
            	$rdo = $daoshop->like();
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                echo json_encode($rdo);
                exit;
            }
            break;
        // case 'viewup';
        //     try{
        //         $daoshop = new DAOShop();
        //     	$rdo = $daoshop->viewup($_GET['id']);
        //     }catch (Exception $e){
        //         $callback = 'index.php?page=503';
		// 	    die('<script>window.location.href="'.$callback .'";</script>');
        //     }
            
        //     if(!$rdo){
        //         echo json_encode("error");
        //         exit;
        //     }
        //     break;
        // case 'read_modal':
        //     //echo $_GET["modal"]; 
        //     //exit;
        //     try{
        //         $daovideogame = new DAOVideogame();
        //         $rdo = $daovideogame->select_videogame($_GET['id']);
        //     }catch (Exception $e){
        //         echo json_encode("error");
        //         exit;
        //     }
            
        //     if(!$rdo){
        //         echo json_encode("error");
        //         exit;
        //     }else{
        //         $videogame=get_object_vars($rdo);
        //         echo json_encode($videogame);
        //         exit;
        //     }
        //     break;
        default;
            include("view/inc/404.html");
            break;
    }