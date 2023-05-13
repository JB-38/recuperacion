<?php
class Database
{
    protected $connection = null;

    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    	
            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");   
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());   
        }			
    }

    public function select($query = "" , $params = [])
    {
        try {
            $stmt = $this->selectQuery( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
            $stmt->close();

            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    public function insert($query = "", $params = [])
    {
        try {
            $stmt = $this->insertQuery( $query , $params );		
            return $stmt;
        } catch (Exception $e){
            throw New Exception( $e->getMessage() );
        }

        return false;
    }

    public function update($query = "", $params = [])
    {
        try {
            $stmt = $this->updateQuery($query , $params );		
            return $stmt;
        } catch (Exception $e){
            throw New Exception( $e->getMessage() );
        }

        return false;
    }

    public function delete($query = "", $params = [])
    {
        try {
            $stmt = $this->deleteQuery( $query , $params );		
            return $stmt;
        } catch (Exception $e){
            throw New Exception( $e->getMessage() );
        }

        return false;
    }

    private function selectQuery($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query );

            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }

            if( $params ) {
                $stmt->bind_param($params[0], $params[1]);
            }

            $stmt->execute();

            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }	
    }

    private function insertQuery($query, $params = [])
    {
        try {

            $result = $this->connection->query($query);
            $response = [];
            
            if ($result === TRUE) {
                $response = ["response" => "New record created successfully", "insert" => TRUE];
            } else {
                $response = ["response" => mysqli_error($this->connection), "insert" => FALSE];
            }

            return $response;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }	
    }

    private function updateQuery($query, $params = [])
    {
        try {
            
            $result = $this->connection->query($query);
            $response = [];
            
            if ($result === TRUE) {
                $response = ["response" => "Record updated successfully", "update" => TRUE];
            } else {
                $response = ["response" => mysqli_error($this->connection), "update" => FALSE];
            }

            return $response;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }	
    }

    private function deleteQuery($query)
    {
        try {

            $result = $this->connection->query($query);
            $response = [];
            
            if ($result === TRUE) {
                $response = ["response" => "Delete record created successfully", "delete" => TRUE];
            } else {
                $response = ["response" => "Algo anda mal", "delete" => FALSE];
            }

            return $response;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }	
    }
}