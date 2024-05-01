<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);



      session_start();
		 if (!isset($_SESSION['uid'])){
		 	header("Location: index.php");
		
	}
		 

include "dbconfig/Controller.php";
$instance = new ControllerUI();

$name = $_GET['name'];
$phone = $_GET['phone'];    
$amount = $_GET['amount'];
$date_now = $_GET['date_now'];



if ( $name !=""){

    $save = $instance->saveTicket($name,$phone,$amount,$date_now);
    $redirect = "viewData.php";
    header("Refresh:2; url=$redirect");
	
}


 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Customer Ticket Services</title>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet"  href="css/bootstrap.min.css">
<link rel="stylesheet"  href="css/mine.css">

<!-- jQuery library -->
<script   src="js/jquery-3.1.1.min.js"></script>
<!-- Latest compiled JavaScript -->
<script  src="js/bootstrap.min.js"></script>



 
</head>

<body >






	

<div class="container">
<h2 class="text-center top-space">&nbsp;</h2>
	<div class="row">
		  <div class="col-sm-6 col-md-2">
		  
			
		  </div>
		  
		  
		  <div class="col-sm-6 col-md-8">
            <h2>Welcome To Customer Ticket Services</h2>
		  <form name="urlform"  action="#" enctype="multipart/form-data"  method="get" >
			<div class="thumbnail">
			<a href="viewData.php">Dashboard</a>
			
			&nbsp;&nbsp;
			<a href="addRecord.php">Add Record</a>
			
            &nbsp;&nbsp;
			<a href="index.php">[Logout]</a>
			
			
			
			
			 <h2>&nbsp;New Ticket </h2>
			<div class="form-group">  
            <div class="text-center"><?php echo $save ;?></div>
			   <div class="input-group input-group-lg">
			  
				  <span class="input-group-addon" id="sizing-addon1">
				 Name
							  
				  </span>
				  
				   <input type="text" name="name" class="form-control" required />
				</div>
				
				
				<div class="input-group input-group-lg" style="margin-top:10px;">
			  
				  <span class="input-group-addon" id="sizing-addon1">
					Phone	  
				  </span>
				 
				 
				 <input type="text" name="phone" class="form-control" required />
				</div>
				

                <div class="input-group input-group-lg" style="margin-top:10px;">
			  
				  <span class="input-group-addon" id="sizing-addon1">
					Amount	  
				  </span>
				 
				 
				 <input type="text" name="amount" class="form-control" required />
				</div>

            
                <div class="input-group input-group-lg" style="margin-top:10px;">
			  
				  <span class="input-group-addon" id="sizing-addon1">
					Date	  
				  </span>
				 
				 
				 <input type="date" name="date_now" class="form-control" required />
				</div>
				
				
				
				
				
				
				
			  
			  <div class="btn-groupl" style="margin-top:10px;">
  <button type="submit" class="btn btn-success btn-lg btn-block"> Save </button>
             </div>
			 
			</div>
			  
				  
			</div>		
			
			</form>
		  </div>
		  
		  <div class="col-sm-6 col-md-2">
		  
			
			
		  </div>
		  
		  
	</div>

</div>

<div class="container" style="height:100px;">
<h2 class="text-center top-space">&nbsp;</h2>

</div>



</body>
</html>
