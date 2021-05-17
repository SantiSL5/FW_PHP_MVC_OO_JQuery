<?php
    class login_dao{
        private $middleware;
        static $_instance;

        private function __construct() {
            $this->$middleware = middleware::getInstance();
        }

        public static function getInstance() {
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        function register(){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $pass=$_POST['password'];
            $type="client";
            $check=$this->validate($username,$email);
            if ($check['username'] && $check['email']) {
                $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
                $hashavatar= md5( strtolower( trim( $email ) ) );
                $avatar="https://www.gravatar.com/avatar/$hashavatar?s=40&d=identicon";
                $sql ="INSERT INTO users (username, email,password,type,avatar) VALUES ('$username','$email','$hashed_pass','$type', '$avatar')";
                $conexion = connect::con();
                $res = mysqli_query($conexion, $sql);
                connect::close($conexion);
                $check[0]=true;
            }else{
                $check[0]=false;
            }
            return $check;
        }

        function login(){
            $username_check=$_POST['username_login'];
            $pass_check=$_POST['password_login'];

            $sql = "SELECT * FROM users WHERE username='$username_check'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            $row = $res->fetch_assoc();
            $userid=$row['id'];
            $username=$row['username'];
            $password=$row['password'];
            if ($username==$username_check) {
                if (password_verify($pass_check, $password)) {
                    $result['token'] = $this->$middleware->encode($userid);
                    $result['correct_password']=true;
                    $result['username_created']=true;
                }else{
                    $result['correct_password']=false;
                    $result['username_created']=true;
                }
            } else {
                $result['username_created']=false;
                $result['correct_password']=false;
            }
            connect::close($conexion);
            return $result;
        }

        function menu_info(){
            $token=$_POST['token'];
            $token=$this->$middleware->decode($token);
            if ($token['invalid_token'] == true) {
                $result['invalid_token']=true;
            }else{
                $userid=$token['userid'];
                $sql = "SELECT * FROM users WHERE id='$userid'";
                $conexion = connect::con();
                $res = mysqli_query($conexion, $sql);
                $row = $res->fetch_assoc();
                $result['invalid_token']=false;
                $result['username']=$row['username'];
                $result['avatar']=$row['avatar'];
                $result['token']=$this->$middleware->encode($userid);
                connect::close($conexion);
            }
            return $result;
        }

        function valida_user($user) {
            $sql = "SELECT * FROM users WHERE username='$user'";
    
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            $row = $res->fetch_assoc();
            $result=$row['username'];
            
            if ($result==$user) {
                return false;
            } else {
                return true;
            }
        }
    
        function valida_email($email) {
            $sql = "SELECT * FROM users WHERE email='$email'";
    
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            $row = $res->fetch_assoc();
            $result=$row['email'];
            
            if ($result==$email) {
                return false;
            } else {
                return true;
            }
        }
    
        function validate($user,$email){
            $check['username'] = $this->valida_user($user);
            $check['email'] = $this->valida_email($email);
    
            return $check;
        }
    }