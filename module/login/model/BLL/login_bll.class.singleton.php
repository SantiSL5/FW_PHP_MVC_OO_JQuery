<?php 

class login_bll {
    private $dao;
    // private $db;
    static $_instance;

    private function __construct() {
        $this->dao = login_dao::getInstance();
        //$this->db = db::getInstance();
    }


    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function register_BLL() {
        return $this->dao->register();
    }
    
    public function login_BLL() {
        return $this->dao->login();
    }

    public function menu_info_BLL() {
        return $this->dao->menu_info();
    }
}

?>