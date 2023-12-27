<?php include('stone-dbconnection.php');?>
<div class="sidebar-sticky">
      <section id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
         <div class="widget-content">
            <h2 class="widget-title sidebar-headings"><span>Stone categories</span> <i class="fas fa-caret-down"></i></h2>
            <ul class="product-categories">
              <?php
              $catId='';
              /*
              $sqlMainCat    = "SELECT mc.id as cat_id, mc.name as main_category,GROUP_CONCAT(mc.status) as main_status, GROUP_CONCAT(sc.id) as sub_ids,GROUP_CONCAT(sc.status) as sub_status, GROUP_CONCAT(sc.name) as subnames 
                                FROM main_category mc 
                                LEFT JOIN sub_category sc ON mc.id = sc.cat_id 
                                GROUP BY mc.id, mc.name ORDER BY 
    mc.id asc;  -- Order by main_category name";*/
              $sqlMainCat ="SELECT * FROM `main_category`";
              $resultMainCat = mysqli_query($connection, $sqlMainCat);
              if (!$resultMainCat) {
                  die("Query failed: " . mysqli_error($connection));
              }
              while ($fetchMainCat = mysqli_fetch_assoc($resultMainCat)) {
                
              ?>
              <?php
              // Check if there are subcategories
              /*
              if (!empty($fetchMainCat['sub_ids'])) {
              ?>
            <li class="cat-item cat-item-35"><a class="sub-btn" href="javascript:void(0);"><?php
              echo $fetchMainCat['main_category'];
              ?><i class="fas fa-angle-right dropdown"></i></a>
            <div class="sub-menu">
              <?php
                  
                  foreach ($subIds as $key => $subId) {
                  ?>
              <a href="footwear-products.php?catId=<?php
                  echo $fetchMainCat['cat_id'];
                  ?>&subcatId=<?php
                  echo $subId;
                  ?>" class="sub-items"><?php echo $subNames[$key];?></a>
              <?php
                  }
                  ?>
            </div>
            </li>
            <?php
              } else {*/
                if($fetchMainCat['status'] != 0){
              ?>
            <li class="cat-item cat-item-35 <?php echo $fetchMainCat['id'] === $_GET['id'] ? 'active' : ''?>"><a class="sub-btn" href="stone-products.php?id=<?php
              echo $fetchMainCat['id'];
              ?>"><?php
              echo $fetchMainCat['name'];
              ?></a>
              </li>
            <?php
              }
              /*}*/
              ?>
              <?php }?>
               
            </ul>
         </div>
      </section>
   </div>
<?php /*
<div class="left-sidebar">
  <div class="sidebar-heading">
    <div class="img-and-heading-content">
        <img src="./images/sidebar/product-icon.svg" alt="" class="ïmage-filter">
        <h2>Features Category</h2>
      </div>
      <i class="fas fa-caret-down"></i>
  </div>
  <div class="product-cat side-bar">
      <div class="menu">
        <?php
            $catId='';
            $sqlMainCat = "SELECT mc.id as cat_id, mc.name as main_category, GROUP_CONCAT(mc.status) as main_status, GROUP_CONCAT(sc.status) as sub_status, GROUP_CONCAT(sc.id) as sub_ids, GROUP_CONCAT(sc.name) as subnames 
                           FROM main_category mc 
                           LEFT JOIN sub_category sc ON mc.id = sc.cat_id 
                           GROUP BY mc.id, mc.name";
            $resultMainCat = mysqli_query($connection, $sqlMainCat);
            if (!$resultMainCat) {
                die("Query failed: " . mysqli_error($connection));
            }
            while ($fetchMainCat = mysqli_fetch_array($resultMainCat)) {
            ?>
            <div class="items">
            <?php
              // Check if there are subcategories
              
              if (!empty($fetchMainCat['sub_ids'])) {
              ?>
            <a class="sub-btn" href="javascript:void(0);"><?php
              echo $fetchMainCat['main_category'];
              ?><i class="fas fa-angle-right dropdown"></i></a>
            <div class="sub-menu">
              <?php
                  
                  foreach ($subIds as $key => $subId) {
                  ?>
              <a href="stone-products.php?catId=<?php
                  echo $fetchMainCat['cat_id'];
                  ?>&subcatId=<?php
                  echo $subId;
                  ?>" class="sub-items">
                  <i class="fas fa-angle-right"></i> <?php echo $subNames[$key];?></a>
              <?php
                  }
                  ?>
            </div>
            <?php
              } else {
                if($fetchMainCat['main_status'] != 0){
              ?>
            <a class="sub-btn" href="stone-products.php?catId=<?php
              echo $fetchMainCat['cat_id'];
              ?>"><?php
              echo $fetchMainCat['main_category'];
              ?></a>
            <?php
              }
              }
              ?>
        </div>
        
        <?php
            }
            ?>
      </div>
    </div>
</div>
*/?>