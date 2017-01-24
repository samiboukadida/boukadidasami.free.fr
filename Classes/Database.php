<?php
namespace MVC;


/**
 * Created by PhpStorm.
 * User: DELL-XPS
 * Date: 2017-01-21
 * Time: 16:35
 * @property \PDO db
 */

class Database extends \PDO{

    public $db;
    private static $instance = NULL;

    public function __construct() {

        $pdo_options[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
        $this->db = new \PDO('mysql:host=localhost;dbname=php_mvc_blog', 'root', '', $pdo_options);
    }

    private function __clone() {}


    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}