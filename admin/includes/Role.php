<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/03/2019
 * Time: 13:44
 */

class Role extends Dbobject
{
    /*variabelen van de tabel ZELF met de TABELNAAM*/
    protected static $db_table = "roles";
    protected static $db_table_fields = array('role');

    /**variabelen*/
    public $id;
    public $role;

    /*constructor*/

    /*methodes**/
    public static function find_all_roles(){
        return static::find_this_query("SELECT * FROM " . static::$db_table . " ORDER BY role asc");
    }

}