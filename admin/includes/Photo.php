<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/02/2019
 * Time: 9:15
 */

class Photo extends Dbobject
{
    protected static $db_table = "photos";
    protected static $db_table_fields = array('title','description', 'filename','type','size');

    /**(LEGE) VARIABELEN binnen de code zullen opvullen**/
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;




}