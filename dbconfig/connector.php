<?php
$url = basename($_SERVER['PHP_SELF']); 
if ($url == "connector.php")
{
	  //die ("Direct access not premitted");
	  echo "Direct access not premitted";
	 header("Refresh:1; url=../index.php");
}
// My database Class called myDBC
class Connector {

// our mysqli object instance
public $mysqli = null;

// Class constructor override
public function __construct() {
 
	include_once "dbconfig.php"; 
	       
		   
	$this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	if ($this->mysqli->connect_errno) {
		echo "Error MySQLi: ("&nbsp. $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
		exit();
	 }
	   $this->mysqli->set_charset("utf8"); 


}



// Class deconstructor override
public function __destruct() {
   $this->closeDB();
 }

// runs a sql query
    public function query($qry) {
        $result = $this->mysqli->query($qry);
        return $result;
    }

// runs multiple sql queres
    public function m_query($qry) {
        $result = $this->mysqli->multi_query($qry);
        return $result;
    }

// Close database connection
    public function closeDB() {
        $this->mysqli->close();
    }

// Escape the string get ready to insert or update
    public function esc($text) {
        $text = trim($text);
        return $this->mysqli->real_escape_string($text);
    }
//encrption and decryption
function encode ($stringArray) {
	$key = "aar may@key2411";
 $s = strtr(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), serialize($stringArray), MCRYPT_MODE_CBC, md5(md5($key)))), '+/=', '-_,');
 return $s;
}

function decode ($stringArray) {
	$key = "aar may@key2411";
 $s = unserialize(rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode(strtr($stringArray, '-_,', '+/=')), MCRYPT_MODE_CBC, md5(md5($key))), "\0"));
 return $s;
}

// Get the last insert id 
    public function lastInsertID() {
        return $this->mysqli->insert_id;
    }

	// Gets the total count and returns integer
	public function totalCount($fieldname, $tablename, $where = "") 
	{
		$q = "SELECT count(".$fieldname.") FROM " 
		. $tablename . " " . $where;
				
		$result = $this->mysqli->query($q);
		$count = 0;
		if ($result) {
			while ($row = mysqli_fetch_array($result)) {
			$count = $row[0];
		   }
		  }
		  return $count;
	}

}

?>