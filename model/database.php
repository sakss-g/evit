<?php
class Database{

    public $conn;

    public function __construct(){
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "evit";
    
        if($connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
            $this->conn = $connection;
        }else{
            die("failed to connect!");
        }
    }

    public function insert( $table, $fields = false ){
        // INSERT INTO	friend SET name = 'Kim', relation= 'good';

        if( $fields ){
            $sql = 'INSERT INTO ' . $table. ' SET ';

            foreach( $fields as $key => $field ){
                $sql .= $key . '="' . $field . '",';
            }

            $sql = rtrim( $sql, ',' );
            $query = mysqli_query( $this->conn, $sql);

            if( $query ){
                return true;
            }
        } 
        return false;
    }

    public function update(){

    }
    
    public function delete(){

    }

    public function select( $table, $fields = false ){
        $data = [];
        //query = "select * from user where email = '$email';";
        if( $fields ){
            $sql = 'SELECT * FROM ' . $table. ' WHERE ';

            foreach( $fields as $key => $field ){
                $sql .= $key . '="' . $field . '" and ';
            }
        }
        $sql = rtrim( $sql, ' and ' );
        // echo $sql; die;
        $query = mysqli_query( $this->conn, $sql);
        
        if( $query -> num_rows > 0 ){
            while($row = $query->fetch_assoc()){
                $data[] = $row;
            }
        }
        return $data;
    }

}