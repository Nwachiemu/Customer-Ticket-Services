<?php
include "dbconfig/connector.php";

 $con = new Connector();
    

class ControllerUI{

function ControllerUI(){

}


	
public function IsUserValid($user,$pwd){
	
	
	global $con;
	
	
		$sql =" select * from users where  user ='$user' and pwd ='$pwd' ";	
		$r =  $con->query($sql);	
			if(mysqli_num_rows($r)==1){
				
				return false;
			}
			else{
				
				return true;
			}	
	}
public function  getRFID($user,$pwd){
	global $con;
	      
	 $sql ="select * from users where user = '$user' and pwd = '$pwd' ";
	    $result= $con->query($sql);				
		while ($row = mysqli_fetch_array($result)){
			$c = $row ['uid'];						
		} 		
	return $c;
}


public function saveTicket($name,$phone,$amount,$date_now){	
	
	global $con;	
	

	$sql ="insert into ticket_table SET 
	  
	   name = '$name'		   
	  ,phone = '$phone'	  	  
	  ,amount = '$amount'  
	  ,date_now = '$date_now'  
	
	   
	
	";
	$err= $con->query($sql);
   if(!($err)){
	   $events  = " <div class='alert alert-danger'> <i class=' bi  bi-exclamation-circle'></i> Server Busy </div> ";
   }
   else{
	   $events = " <div class='alert alert-success'> <i class=' bi bi-check-circle'></i> Record Saved </div>";
	  
   }
   return $events;	
}
public function deleteF2($tbl,$f,$idn) {
	     
    global $con;
     $sql ="delete  from ".$tbl." where  ".$f." = '$idn' ";
         $err= $con->query($sql);
    if(!($err)){
        $events  = "can not connect to database";
    }
    else{
        $events = " Delete was Successful..".'';
        //echo "<a href='index.html'>Back to Main Menu</a>";
    }
    return $events;	
} 	


public function viewTicket(){
	global $con;
	 $sql="SELECT * FROM ticket_table order by id desc limit 50  ";
	$result= $con->query($sql); 	 
	
	 
	 return $result;
 }


}


?>