<?php
namespace Core\Component\DataBase;


use App\Config\DataBaseConfig;
use Core\Component\Helper;
use Core\Traits\Singleton;
use PDO;


class DataBase{
    use Singleton;

    /**
     * @var PDO
     */
    private $connect=false;

    private function connection(){
        $config=DataBaseConfig::getConfig();
        if($this->connect==false){
            $this->connect = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['username'], $config['password']);
        }
    }

    /**
     * @param $table
     * @param $data
     * @return void
     */
    public function insert($table, $data){
        $this->connection();
        $columns='';
        $columnsValues='';
        foreach ($data as $key=>$value){
            $columns.=$key.',';
            $columnsValues.=':'.$key.', ';
        }
        $columns = substr($columns,0,-1);
        $columnsValues = substr($columnsValues,0,-2);
        $stmt = $this->connect->prepare("INSERT INTO ".$table." (".$columns.") VALUES (".$columnsValues.")");
        $values=[];
        foreach ($data as $key=>$value){
            $stmt->bindParam(':'.$key, $values[$key]);
            $values[$key]=$value;
        }
        $stmt->execute();
    }

    /**
     * @param $statement
     * @return false|\PDOStatement
     */
    public function query($statement){
        $this->connection();
        return $this->connect->query($statement);
    }


}