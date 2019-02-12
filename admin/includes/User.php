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
       return self::find_this_query("SELECT * FROM " . self::$db_table);
    }

    public static function find_user($id){
        /*global $database;*/
        $the_result_array = self::find_this_query("SELECT * FROM " . self::$db_table . " WHERE id=$id");
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

    public function create(){
        global $database;
        $properties = $this->properties();

        $sql = "INSERT INTO " . self::$db_table . " (" . implode(",",array_keys($properties)) . ") ";
        $sql .= "VALUES ('" . implode("','",array_values($properties)) . "')";


        if($database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;
        }else{
            return false;
        }

        $database->query($sql);

    }

    public function update(){
        global $database;

        $sql = "UPDATE " . self::$db_table . " SET ";
        $sql .= "username= '" . $database->escape_string($this->username) . "', " ;
        $sql .= "password= '" . $database->escape_string($this->password) . "', ";
        $sql .= "first_name= '" . $database->escape_string($this->first_name) . "', ";
        $sql .= "last_name= '" . $database->escape_string($this->last_name) . "' ";
        $sql .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($sql);
        return (mysqli_affected_rows($database->connection)== 1) ? true : false;
    }

    public function delete(){
        global $database;

        $sql = "DELETE FROM " . self::$db_table . " ";
        $sql .= "WHERE id= " . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return (mysqli_affected_rows($database->connection)== 1) ? true : false;
    }

    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function properties(){
        //return get_object_vars($this);//alle variabelen van een classe worden door deze functie automatisch ingelezen
        $properties = array();
        foreach(self::$db_table_fields as $db_field){
            if(property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;


    }
}