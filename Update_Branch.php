<?php
  if(isset($_SESSION['admin']) && $_SESSION['admin']==1){
?>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
   <?php
	include_once("connection.php");
    if(isset($_GET["name"]))
    {
		$name = $_GET["name"];
		$result = pg_query($conn, "SELECT * FROM branch WHERE bra_name='$name'");
		$row = pg_fetch_array($result,NULL, PGSQL_ASSOC);
		$bra_name = $row['bra_name'];
		$bra_des = $row['bra_des'];
	
	?>
<div class="container">
	<h2>Updating Company Branch</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Branch Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Branch Name" readonly value='<?php echo $bra_name; ?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php  echo $bra_des;?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update" onclick="window.location='index.php?page=branch_management'"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='index.php?page=branch_management'"/>
                              	
						</div>
					</div>
				</form>
	</div>
   
    <?php
    }
    else
	{
		echo '<meta http-equiv="refresh" content="0;URL=Branch_Management.php"/>'; 
	}
	?>


	<?php
   if(isset($_POST["btnUpdate"]))
   {
	   $name = $_POST["txtName"];
	   $des = $_POST["txtDes"];
	   $err="";
	   if($des==""){
		$err.="<li> Enter description, please</li>";
	   }
       if($err!=""){
		   echo "<ul>$err</ul>";
	   }
	   else
	   {
		$sq="SELECT * FROM branch WHERE bra_name !='$name' and bra_des = '$des'";
		$result = pg_query($conn,$sq);
		if(pg_num_rows($result)==0)
		{
			pg_query($conn, "UPDATE branch SET bra_des='$des' WHERE bra_name='$name'");
			echo '<meta http-equiv="refresh" content="0;URL=?page=branch_management"/>';
		}
		else
		{
			echo "<li> Duplicate branch Name</li>";
		}
	   }
   }
   ?>
   <?php
}
?>