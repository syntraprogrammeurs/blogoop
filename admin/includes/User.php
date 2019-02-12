<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/02/2019
 * Time: 11:42
 */

class User extends Dbobject
{
    /**VARIABELEN**/
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;


    /***CONSTRUCT**/
    function __construct(){

    }

    /**METHODES**/


    public static function verify_user($username, $password){
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }




}