<?php
namespace app\config;
require_once('../app/core/config.php');
class DB
{
    private static $instance = NULl;
    public static function getInstance() {
      if (!isset(self::$instance)) {
        try {
          self::$instance = new \PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
          self::$instance->exec("SET NAMES 'utf8'");
        } catch (\PDOException $ex) {
          die($ex->getMessage());
        }
      }
      return self::$instance;
    }
}