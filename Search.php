<div class="container">
    <h1><u>Search Results.</u></h1>
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
		  				   	        $result = pg_query($conn, "SELECT * FROM product where product_id like '%".$data."%' or product_name like '%".$data."%'");
    			                if(pg_num_rows($result)==0)
                          {
                            echo  "<script>alert('No find data. Please Enter Again!')</script>";
                            echo '<meta http-equiv="refresh" content="0;URL=index.php">';
                          }
                          else {
                           if (!$result) { //add this check.
                                die('Invalid query: ' . pg_errormessage($conn));
                            }
                            else {
			                    while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
				                  ?>
    <!--Display product-->
    <div class="col-sm-3">
        <div class="card">
            <img src="img/<?php echo $row['pro_image']?>" style="width:100%">
            <h4 class="name"><a
                    href="?page=quanly_chitietsanpham&ma=<?php echo  $row['product_id']?>"><?php echo  $row['product_name']?></a>
            </h4>
            <div class="price"><ins>$ <?php echo  $row['price']?></ins> <del class="oldprice">
            
            <div class="single-product">
                                <div class="product-f-imagemu">
                                    <div class="product-hover">
                                        <a href="?page=1sanpham&&id=<?php echo  $row['product_id']?>" class="view-details-link"><i class="fa fa-link"></i> Add to cart</a>
                                    </div>
                                </div>
        </div>
    </div>
    <?php
				}
      }
    }
  }
}
?>
</div>