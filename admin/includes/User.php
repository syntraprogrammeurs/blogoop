<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/02/2019
 * Time: 11:42
 */

class User
{
    /**VARIABELEN**/


    /***CONSTRUCT**/
    function __construct(){

    }

    /**METHODES**/
    public static function find_all_users(){
        global $database;
        $result = $database->query("SELECT * FROM users");
        return $result;
    }

    public static function find_user($id){
        global $database;
        $result = $database->query("SELECT * FROM users WHERE id=$id");
        return $result;
    }

}