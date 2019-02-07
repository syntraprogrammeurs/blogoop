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
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    /***CONSTRUCT**/
    function __construct(){

    }

    /**METHODES**/
    public static function find_this_query($sql){
        global $database;
        $result = $database->query($sql);
        $the_object_array = array();
        while($row = mysqli_fetch_array($result)){
            $the_object_array[] = self::instantie($row);
        }
        return $the_object_array;
    }

    public static function find_all_users(){
       return self::find_this_query("SELECT * FROM users");
    }

    public static function find_user($id){
        /*global $database;*/
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id=$id");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
}

    public static function instantie($found_user){
        $the_object = new self();
        foreach($found_user as $the_attribute => $value){
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }

    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

}