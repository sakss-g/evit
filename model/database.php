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

    public function select( $table, $fields = false, $conditions = false ){
        $data = [];
        $sql = 'SELECT ';
        if( $fields ){
            foreach( $fields as $field ){
                $sql .= $field . ',';
            }

            $sql = rtrim( $sql, ',' );
        }
        $sql .= ' FROM ' . $table;

        if( $conditions ){
            $sql .= ' WHERE ';
            foreach( $conditions as $key => $condition ){
                $sql .= $key . '="' . $condition . '" and ';
            }
        }
        
        $sql = rtrim( $sql, ' and ' );
        $query = mysqli_query( $this->conn, $sql);
        
        if( $query -> num_rows > 0 ){
            while($row = $query->fetch_assoc()){
                $data[] = $row;
            }
        }
        if( !empty( $data ) ){
            return $data;
        }else{
            return false;
        }
    }
    
    public function delete( $table, $fields = false ){
        $sql = ' DELETE  FROM ' . $table;

        if( $fields ){
            $sql .= ' WHERE ';
            foreach( $fields as $key => $field ){
                $sql .= $key . '=' . $field;
            }
        }
        $query = mysqli_query( $this->conn, $sql);
        header("location: ../view/dashboard.php");
    }

    public function update( $table, $fields, $id ){
        $sql = ' UPDATE ' .$table .' SET ';

        foreach( $fields as $key => $field ){
            $sql .= $key .'="' .$field .'",';
        }

        $sql = rtrim( $sql, ',' );
        $sql .= ' WHERE id= '.$id;

        $query = mysqli_query( $this->conn, $sql);

        return $query;
    }

    public function db_get_user_ajax( $table, $offset, $limit ){
        //select * from student limit {$offset}, {$limit}";
        $sql = 'SELECT * FROM ' . $table . ' LIMIT ' . $offset . ',' . $limit;
        $query = mysqli_query( $this->conn, $sql);
        
        if( $query ->num_rows > 0 ){
            while($row = $query->fetch_assoc()){
                $data[] = $row;
            }
        }
        if( !empty( $data ) ){
            return $data;
        }else{
            return false;
        }
    }
}