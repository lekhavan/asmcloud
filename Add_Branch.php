<?php
  if(isset($_SESSION['admin']) && $_SESSION['admin']==1){
	?> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<?php
		  include_once("connection.php");
		  if(isset($_POST["btnAdd"]))
		  {
			  $name = $_POST["txtName"];
			  $des = $_POST["txtDes"];
			  $err="";
			  if($name==""){
				  $err.="<li>Enter Branch Name, please</li>";
			  }
			  if($err=""){
				  echo "<ul>$err</ul>";
			  }
			  else{
				  $sq="SELECT * FROM branch WHERE bra_name='$name'";
				  $result = pg_query($conn,$sq);
				  if(pg_num_rows($result)==0)
				  {
					  pg_query($conn,"INSERT INTO branch (bra_name, bra_des) VALUES ('$name', '$des')");
					  echo '<meta http-equiv="Refesh" content="0;URL=?page=branch_management"/>';
				  }
				  else
				  {
					  echo "<li>Duplicate  category Name</li>";
				  }
			  }
		  }
	?>

<div class="container">
	<h2>Adding Branch</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Branch Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Branch Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php echo isset($_POST["txtDes"])?($_POST["txtDes"]):"";?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" onclick="window.location='?page=branch_management'" />
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=branch_management'" />
                              	
						</div>
					</div>
				</form>
	</div>
 <?php
  }
?>