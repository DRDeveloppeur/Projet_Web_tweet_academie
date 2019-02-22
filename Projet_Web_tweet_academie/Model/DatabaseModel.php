<?php

class DatabaseModel
{
    private $pdo;
    static $db = null;

    public function __construct($login ='root', $password = '', $database_name = 'common-database', $host = 'localhost'){
        $this->pdo = new PDO("mysql:dbname=$database_name;host=$host", $login, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    static function getDatabase(){
        if(!self::$db){
            self::$db = new DatabaseModel('root', 'LostcreW0', 'common-database');
        }
        return self::$db;
    }

    /**
     * @param $query
     * @param bool|array $params
     * @return mixed
     */
    public function query($query, $params = false)
    {
        if($params)
        {
            $req = $this->pdo->prepare($query);
            $req->execute($params);
        }
        else
        {
        $req = $this->pdo->query($query);
        }
        return $req;
    }
}

class Databasev2Model
{
  public function base()
  {
    $db = new PDO ('mysql:host=localhost;dbname=common-database;charser=utf8',
    'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $db;
  }
}
