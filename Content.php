 <?php
include_once("connection.php");
?>
<hr>
     <div class="slider-area">			
    </div> 
    <hr>
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">

                        <h2 class="section-title"><strong><a color="blue">New Toys</a></h2></strong>
                        <div class="product-carousel">
                           <?php
		  				   	$result = pg_query($conn, "SELECT * FROM product" );
			
			                if (!$result) { 
                                die('Invalid query: ' . pg_errormessage($conn));
                            }			            
			                while($row = pg_fetch_array($result,NULL, PGSQL_ASSOC)){
				            ?>				            
                            <div class="single-product">
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
                            </div>
                
                            <?php
				            }
				            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
  