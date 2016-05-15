<?php

/*
 * Author: Louie Zhu
 * Date: 1/29/2016
 * Name: capitals.class.php
 * Description: this class defines parameters for connecting to the database.
 * The only public interface is the method that determines whether a state and capital
 * match. If they match, 1 is returned; 0 is returned otherwise.
 */

class Capital {

    //define database parameters; you may need to midift these for your MySQL server.
    
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'statecapitals'
    );
    
    //define the database connection object
    private $objDBConnection;
	
	//the constructor. It connects to the MySQL server and select the database for use.
    public function __construct() {
        $this->objDBConnection = @new mysqli(
                        $this->param['host'],
                        $this->param['login'],
                        $this->param['password'],
                        $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $errno = mysqli_connect_errno();
            $errmsg = mysqli_connect_error();
            die("Connecting database failed: ($errno) $errmsg <br/>\n");
        }
    }

	// This method verifies state and capital against the database records. If the Capital is correct
	//for the State, it returns 1; otherwise, 0 is returned.
    public function verify_capital($state, $capital) {
        //select statement
        $query_str = "SELECT * FROM capitals WHERE state='$state' AND capital='$capital'";

        //execute the query
        $result = $this->objDBConnection->query($query_str);
        
        //1 is returned if the satate and capital match; 0 otherwise.
        return $result->num_rows;
    }
}