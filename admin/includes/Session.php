<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/02/2019
 * Time: 14:37
 */

class Session
{
    private $signed_in;
    public $user_id;

    /**automatisch starten van een sessie**/
    function __construct(){
        session_start();
        $this->check_the_login();
    }

    public function is_signed_in(){
        return $this->signed_in;
    }
    public function login($user){
        if($user){
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
    }
    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }


    /**METHODES**/
    /*** login user check ***/
    /**isset kijkt of er IETS aanwezig is EN DUS GEEN NULL*/
    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        }else{
            unset($this->user_id);
            $this->signed_in = false;
        }
    }

    public function message($msg =""){
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
        }else{
            return $this->message;
        }
    }

    private function check_message(){
        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }else{
            $this->message = "";
        }
    }

}
$session = new Session();