<?php
 
 // USE ONLY GET USER BY EMAIL AND PASSWORD METHOD
class DB_Functions {
 
    private $db;
 	
    //put your code here
    // constructor
    function __construct() {

        require_once("DB_Connect.php");
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
 
    }
 
    /**
     * Storing new user
     * returns user details                         // YOGEV - Adding changes
     */
    public function storeUser($name, $email, $password) {             
        $uuid = uniqid('', true);
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
        $result = mysql_query("INSERT INTO users(unique_id, name, email, encrypted_password, salt, created_at) VALUES('$uuid', '$name', '$email', '$encrypted_password', '$salt', NOW())");
        // check for successful store
        if ($result) {
            // get user details
            $uid = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM users WHERE uid = $uid");
            // return user details
            return mysql_fetch_array($result);
        } else {
            return false;
        }
    }
 
    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {
        $result = mysql_query("SELECT * FROM users WHERE Email = '$email'") or die(mysql_error());
        // check for result
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            if($password == $result["Password"])
                return $result;
        }
        return false;
    }
	
	public function checkIn($email, $location)
	{
		$query = mysql_query("UPDATE users SET Location = '$location' WHERE Email = '$email'") or die(mysql_error());
		$query = mysql_query("SELECT * FROM users WHERE Email = '$email'") or die(mysql_error());
		$no_of_rows = mysql_num_rows($query);
		if ($no_of_rows > 0) {
            $res = mysql_fetch_array($query);
            if($location == $res["Location"])
                return true;
        }
        return false;
	}
	
	
	public function getReList()
	{
		$query = mysql_query("SELECT * FROM re") or die(mysql_error());
		$no_of_rows = mysql_num_rows($query);
		if($no_of_rows > 0)
		{
			$index = 1;              // change from index =1
			$result = array();
			$result["rows"] = $no_of_rows;
			while($row= mysql_fetch_array($query))
			{
				$result[$index]["id"] = $row["ID"];
				$result[$index]["name"] = $row["Business_Name"];
				$result[$index]["adress"] = $row["Business_Adress"];
				$result[$index]["logo"] = $row["LOGO"];
			    $result[$index]["email"] = $row["Email"];
				$index = $index + 1;
			}
			
			return $result;
		}
		return false;
	}
 
    /**
     * Check user is existed or not
     */
    public function isUserExisted($email, $password) {
        $result = mysql_query("SELECT email from users WHERE Email = '$email'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
			if($password == $result['Password'])
            	return true;
			return false;
        } else {
            // user not existed
            return false;
        }
    }
 
    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {
 
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }
 
    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {
 
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
 
        return $hash;
    }
 
}
 
?>