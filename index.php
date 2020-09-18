<?php 
session_start();
include('connection.php'); 
include('header.php');?>


   



    <div class="view intro-2 parent">
        <div class="full-bg-img">
            <div class="mask rgba-black-light flex-center">
                <div class="container text-center white-text">
                    <div class="white-text text-center wow fadeInUp ">
                        <h2 class = "brand"><strong>LENSON</strong></h2>
                        <h5 class="child">Show the world, how you see the world</h5>
                        <br>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--Main Navigation-->
<body>
<div class="section__title--2 text-center">
    <br>
                            <h2 class="title__line  text-center">Best Seller</h2>
                                <hr>
                                    <?php

                                            $query = "SELECT * FROM products where 1";
                                            $result = mysqli_query($db,$query);
                                            if(!$result)
                                            echo mysqli_error($db);

                                            $rows = $result->num_rows;    // Find total rows returned by database

                                            if($rows > 0) {
                                                $cols = 4;    // Define number of columns
                                                $counter = 1;     // Counter used to identify if we need to start or end a row
                                                $nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns

                                            while ($item = mysqli_fetch_array($result))
                                            {
                                                    if(($counter % $cols) == 1) { 
                                                        echo '<div style="margin-top: 25px; margin-right: 15px;
                                                        margin-left: 15px;" class="row">';}
                                                                echo '
                                                                        <div class="col-sm-3"><div class="card mb-3">
                                                                                <div class=" view1 view-first">  
                                                
                                                                                        <img style="height: 18rem;"class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($item['pimage']).'" alt=""></a>
                                                                                        <div class="mask1">  
                                                                                                <h2>'.$item['pname'].'</h2>  
                                                                                                <p>'.$item['pdescription'].'</p>  
                                                                                                <a href="#" class="info">Read More</a>  
                                                                                        </div>  
                                                                                 </div> 
                                                                             <h5 class="card-title">&#8377;'.$item['pprice'].'</h5>
                                                                        </div>
                                                                </div>';
                                            if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
                                                echo '</div>';	 //  Close the row
                                            }
                                            $counter++;    // Increase the counter
                                            }

                                            }
                                            $result->free();	

                                            ?>
                        
                                        </div>                                   

     </body>
     <br >
     <?php include('footer.php');?>