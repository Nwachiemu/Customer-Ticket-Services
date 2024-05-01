<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

include "dbconfig/Controller.php";
$instance = new ControllerUI();

		 	
			$user = strip_tags($_POST['user']);
			 $pwd = strip_tags($_POST['pwd']);
			
			
			if ($instance->IsUserValid($user,$pwd)==false){
							
							
							
						    
					   // $uid = $instance->getRFID($user,$pwd);
      
							 
						
							//start session
						  session_start();
					      $_SESSION['uid'] = $user;						 
               $redirect = "viewData.php";
							
						
						
					}else{
					
							
				            $redirect = "index.php";
							
								 
						}
			
			
			




    header("Refresh:1; url=$redirect");
	//exit();
	//echo $redirect;








 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Loading.................</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet"  href="css/bootstrap.css">
<link rel="stylesheet"  href="css/theme.css">

<!-- jQuery library -->
 <script   src="js/jquery-3.1.1.min.js"></script>
<!-- Latest compiled JavaScript -->
<script  src="js/bootstrap.min.js"></script>

<script  src="js/request.js"></script>

</head>

<body>

<div class="container mt-5" style="margin-top:100px;">


<div class="text-center">

                        

								
								
								<span style="font-size:24px;" class="text-success mt-4">
								Please Wait <br>
								<em class=" m-2">Redirecting to Main Page</em> 
								
								</span>
								</p>                   
						
						</div>




</div>  


</body>

</html>


