<?php
require_once 'config.php';

class MyPDO{
    public $pdoConnect = NULL;
    
    function __construct() {
        //singleton 要去研究一下~~~~~
        $cf = new Config();
        //PDO 物件實作
        try
        { 
        $pdo = new PDO("mysql:host=".$cf->getdbhost().";
                dbname=".$cf->getdbname(), $cf->getdbuser(), $cf->getdbpass(),
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }
        catch(PDOException $e)
        { 
            echo "Connection Failed ! " . $e->getMessage();
        }
        $this->pdoConnect = $pdo;
        $pdo = NULL;
    }
    
    public function select($sql)
    {
        $statement = $this->pdoConnect->query($sql, PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    /**
     * Execute update query
     *
     * @param   string  SQL update query
     * @return  int     number of affected rows
     */
    public function update($sql)
    {
        return $this->exec($sql);
    }
    /**
     * Execute insert query
     *
     * @param   string  SQL insert query
     * @return  bool
     */
    public function insert($sql)
    {
        $rowEffect = $this->exec($sql);
        if ($rowEffect > 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Execute delete query
     *
     * @param   string  SQL delete query
     * @return  int     number of affected rows
     */
    public function delete($sql)
    {
        return $this->exec($sql);
    }
    /**
     * Last insert id
     *
     * @return  int
     */
    public function lastInsertId()
    {
        return (int)$this->pdoConnect->lastInsertId();
    }
    /**
     * Execute any SQL query
     *
     * @param   string  SQL query
     * @return  int     number of affected rows
     */
    public function exec($sql)
    {
        return $this->pdoConnect->exec($sql);
    }
}
    
?>