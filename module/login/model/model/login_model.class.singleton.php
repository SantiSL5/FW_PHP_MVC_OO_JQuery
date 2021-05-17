<?php 

class login_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = login_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function register() {
        return $this->bll->register_BLL();
    }

    public function login() {
        return $this->bll->login_BLL();
    }

    public function menu_info() {
        return $this->bll->menu_info_BLL();
    }
}

?>