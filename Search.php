<div class="container">
    <h1><u>All Product</u></h1>
</div>
<div class="container">
    <?php
			 include_once("connection.php");
          if (isset($_POST["txtSearch"])) {
              $data = $_POST['txtSearch'];
                if($data=="")
                  {
                  echo "<script>alert('Please Enter Data!')</script>";
                  echo '<meta http-equiv="refresh" content="0;URL=index.php">';
                  }
                else {
		  				   	$result = pg_query($conn, "SELECT * FROM product where product_id like '%$data%' or product_name like '%$data%'");
    			          if(pg_num_rows($result)==0)
                      {
                        echo  "<script>alert('No find data. Please Enter Again!')</script>";
                        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
                      }
                    else {
                      if (!$result) {
                          die('Invalid query: ' . pg_errormessage($conn));
                          }
                        else {
			                  while($row = pg_fetch_array($result,NULL, PGSQL_ASSOC)){
				                  ?>
    <!--Display product-->

                                <div class="product-f-imagemu">
                                   <img src="images/<?php echo $row['pro_image']?>" width="550" height="450">
                                    <div class="product-hover">
                                        <a href="?page=product_management&&id=<?php echo  $row['pro_image']?>" class="view-details-link"><i class="fa fa-link"></i> View Details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="?page=quanly_chitietsanpham&&ma=<?php echo  $row['product_id']?>"><?php echo  $row['product_name' ]?></a>
                                </h2>
                                    
                                <div class="product-carousel-price">
                                    <ins><?php echo  $row['price']?>,0$</ins> 
                              </div>
    <?php
				}
      }
    }
  }
}
?>
</div>