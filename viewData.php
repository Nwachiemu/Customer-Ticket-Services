<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);



      session_start();
		 if (!isset($_SESSION['uid'])){
		 	header("Location: index.php");
		
	}
		 

include "dbconfig/Controller.php";
$instance = new ControllerUI();
$remove  = $_GET['remove'];

if ($remove !=""){
	
	$save = $instance->deleteF2("ticket_table","id",$remove);
    
}

$resultRec = $instance->viewTicket();





$i = 1;

 
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
			
			
			
			
			 <h2>&nbsp; Ticket Record </h2>
			<div class="form-group">  

            <div class="table-responsive">
                <?php echo $save ?>
        <table class="table table-striped table-sm ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">Phone</th>
              <th scope="col">amount</th>             
              <th scope="col">Date</th> 
              <th scope="col">#</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
            	$err = mysqli_num_rows($resultRec);
                if(!($err)){
                        
                        $emptyErr= " <tr><td colspan='10'><strong>No Record Available....</strong></td></tr>";
                }else{
            
                          while($rows=mysqli_fetch_array($resultRec)){
            ?>
            <tr>
            <th ><?php echo $i; ?></th>
            <td><?php echo $rows['name']; ?></td>
            <td><?php echo $rows['phone']; ?></td>
            <td><?php echo $rows['amount']; ?></td>
            <td><?php echo $rows['date_now']; ?></td>
            
            <td>	 
							  
			  <a class=" btn btn-sm "  href="viewData.php?remove=<?php echo $del = $rows['id']; ?>" >
			 Remove
			</a>
    
            </td>
           
             
            </tr>
            <?php $i++; } }?>
											<?php   
											
											if ($err == 0){
											  echo $emptyErr;
											}  
											
											?>
           </tbody>
           </table>
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
