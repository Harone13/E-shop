<?php
class database
{
    public static $con;

    public function __construct()
    {
        try{
            $string = DB_TYPE . ":host=" . DB_HOST .";dbname=" . DB_NAME;
            self::$con = new PDO($string, DB_USER, DB_PASS);
        }catch (PDOException$e){
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if(self::$con){
            
            return self::$con;
        }

        return $instance = new self();
    }
    
    public function read($query, $data = array()){
        $stmt = self::$con->prepare($query);
        $result = $stmt->execute($data);
        if($result){
            $returnData = $stmt->fetchAll(PDO::FETCH_OBJ);  // PDO::FETCH_OBJ I do not undertand it !?
            if(is_array($returnData) && count($returnData) > 0){
                return $returnData;
            }
        }

        return false;
    }

    public function write($query, $data = array()){
        $stmt = self::$con->prepare($query);
        $result = $stmt->execute($data);
        if($result){
                return true;
            }

        return false;
    }
}    

