<?php
   include('dbconnection.php');
   ?>
<div class="sidebar-sticky">
   <section id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
   <div class="widget-content">
        
         
          <?php
          if(isset($_GET['type']) && ($_GET['type'] === 'footwear machine')){
            ?>
             <h2 class="widget-title sidebar-headings"><span>Top categories</span> <i class="fas fa-caret-down"></i></h2>
            <ul class="product-categories top-categories">
            <?php
              $sqlMainCat ="SELECT * FROM `main_category` WHERE `type` = '". $_GET['type'] ."' AND `id` IN (3,10,7,1,5,4,11,39,29) ORDER BY `id` ASC;";            
                         
               $resultMainCat = mysqli_query($connection, $sqlMainCat);
               if (!$resultMainCat) {
                   die("Query failed: " . mysqli_error($connection));
               }
               while ($fetchMainCat = mysqli_fetch_assoc($resultMainCat)) {
                  if($fetchMainCat['status'] != 0){
                 
                     ?>
                  <li class="cat-item cat-item-35 <?php echo $fetchMainCat['id'] === $_GET['id']  ? 'active' : ''?>"><a class="sub-btn" href="footwear-products.php?type=<?php echo $_GET['type'];?>&id=<?php echo $fetchMainCat['id'];?>"><?php
                     echo $fetchMainCat['name'];
                     ?></a>
                  </li>
                  <?php
                  }
               }

          ?>
          </ul>
          <?php
            }

          ?>
      </div>
      <div class="widget-content">
         <h2 class="widget-title sidebar-headings"><span>Features categories</span> <i class="fas fa-caret-down"></i></h2>
         <ul class="product-categories">
          <?php
          if(isset($_GET['type']) && ($_GET['type'] === 'footwear machine')){
              $sqlMainCat ="SELECT * FROM `main_category` WHERE `type` = '". $_GET['type'] ."' AND `id` NOT IN (3,10,7,1,5,4,11,39,29) ORDER BY `id` ASC";            
               $resultMainCat = mysqli_query($connection, $sqlMainCat);
               if (!$resultMainCat) {
                   die("Query failed: " . mysqli_error($connection));
               }
               while ($fetchMainCat = mysqli_fetch_assoc($resultMainCat)) {
                if($fetchMainCat['status'] != 0){
                 
                  ?>
               <li class="cat-item cat-item-35 <?php echo $fetchMainCat['id'] === $_GET['id'] ? 'active' : ''?>"><a class="sub-btn" href="footwear-products.php?type=<?php echo $_GET['type'];?>&id=<?php echo $fetchMainCat['id'];?>"><?php
                  echo $fetchMainCat['name'];
                  ?></a>
               </li>
               <?php
                  }
               }

          }elseif (isset($_GET['type']) && ($_GET['type'] === 'footwear moulds')) {
            $sqlMainCat ="SELECT * FROM `main_category` WHERE `type` = '". $_GET['type'] ."' ORDER BY `name` ASC";            
               $resultMainCat = mysqli_query($connection, $sqlMainCat);
               if (!$resultMainCat) {
                   die("Query failed: " . mysqli_error($connection));
               }
               while ($fetchMainCat = mysqli_fetch_assoc($resultMainCat)) {
                if($fetchMainCat['status'] != 0){
                 
                  ?>
               <li class="cat-item cat-item-35 <?php echo $fetchMainCat['id'] === $_GET['id'] ? 'active' : ''?>"><a class="sub-btn" href="footwear-products.php?type=<?php echo $_GET['type'];?>&id=<?php echo $fetchMainCat['id'];?>"><?php
                  echo $fetchMainCat['name'];
                  ?></a>
               </li>
               <?php
                  }
               }
          }else{
            ?>
            <li class="cat-item cat-item-35"><a class="sub-btn" href="footwear-products.php?type=footwear machine&id=3">Footwear Machines</a></li>
            <li class="cat-item cat-item-35"><a class="sub-btn" href="footwear-products.php?type=footwear moulds">Footwear Moulds</a></li>
            <?php
          }
          ?>
            
         </ul>
      </div>
   </section>
</div>