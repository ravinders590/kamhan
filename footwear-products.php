<?php
 if(isset($_GET['page'])){
   $page = $_GET['page'];
}else{
   $page = 1;
}
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="profile" href="//gmpg.org/xfn/11">
      <title>Kamhan Industrial | Footwear | Manufacturing & Machinery</title>
      <meta name="robots" content="max-image-preview:large">
      <link rel="icon" type="image/png" href="images/favi.png">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
      <link rel="stylesheet" id="photoswipe-css" href="./css/photoswipe.min.css" media="all" />
      <link rel="stylesheet" id="photoswipe-default-skin-css" href="./css/default-skin.min.css" media="all" />
      <link rel="stylesheet" id="industroz-style-css" href="./css/style.css" media="all" />
      <link rel="stylesheet" id="woocommerce-general-css" href="./css/woocommerce-general.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="bootstrap-css" href="./css/bootstrap.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="industo-theme-css" href="./css/industo-theme.min.css" type="text/css" media="all">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
      <link rel="stylesheet" href="./css/tabs.css">
      <link rel="stylesheet" id="bootstrap-css" href="css/bootstrap.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="caseicon-css" href="css/caseicon.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="flaticon2-css" href="css/flaticon2.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="industo-theme-css" href="css/industo-theme.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="elementor-frontend-css" href="css/frontend-lite.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="elementor-post-6-css" href="css/post-6.css" type="text/css" media="all">
      <link rel="stylesheet" id="elementor-post-146-css" href="css/post-146.css" type="text/css" media="all">
      <link rel="stylesheet" id="elementor-post-2951-css" href="css/post-2951.css" type="text/css" media="all">
      <link rel="stylesheet" id="elementor-post-13732-css" href="css/post-13732.css" type="text/css" media="all">
      <link rel="stylesheet" href="./css/sider.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
      <style id="ct_theme_options-dynamic-css" title="dynamic-css" class="redux-options-output">body #ct-pagetitle{background-image:url('./images/pageimages/about.jpg');}a{color:#fe0000;}a:hover{color:#fe0000;}a:active{color:#fe0000;}</style>
   </head>
   <body class="product-template-default single single-product postid-285 theme-industroz woocommerce woocommerce-page woocommerce-js singular enable-search-modal has-post-thumbnail has-single-pagination showing-comments show-avatars footer-top-hidden elementor-default elementor-kit-22 crm_body_bg">
      <div id="page" class="site">
      <!-- <div id="ct-loadding" class="ct-loader style14">
         <div class="ct-gears">
         	<img class="big" src="images/favi.png" alt="Industry">
         </div>
         </div> -->
      <div class="ct-page-loading-bg active"></div>
      <?php require('inc/header.php'); ?> 
      <div id="ct-pagetitle" class="ct-pagetitle bg-image text-left">
         <div class="container style="opacity: 1;>
            <ul class="ct-breadcrumb">
               <li><a class="breadcrumb-entry" href="./index.php">Home</a></li>
               <li><span class="breadcrumb-entry">Product</span></li>
            </ul>
            <div class="ct-page-title-holder">
               <h1 class="ct-page-title">Footwear Product</h1>
            </div>
         </div>
      </div>
      <div id="content" class="site-content">
         <div class="container">
            <div class="row">
               <div class="col-sm-4 col-lg-3 nav-mob">
                  <?php require('inc/nav.php'); ?>
               </div>
               <div class="col-sm-8 col-lg-9 prod-mob">
                  <div class="products">
                  
                     
                     <ul class="products columns-3">
                        <?php

                           if(isset($_GET['id'])){
                              
                              $sql = "SELECT * FROM products WHERE category='". $_GET['id'] ."' AND `type` = '".$_GET['type']."';";
                           }elseif (isset($_GET['type'])) {
                              $limit = 12;
                              $offset = ($page - 1) * $limit;
                              $sql = "SELECT * FROM products WHERE new_arrivals='yes' AND `type` = '".$_GET['type']."' LIMIT $offset, $limit";                              
                           }
                           else{
                              $limit = 6;
                              $offset = ($page - 1) * $limit;
                              $sql = "SELECT * FROM products WHERE new_arrivals='yes' LIMIT $offset, $limit";
                           }
                           $result = mysqli_query($connection, $sql);
                           
                           if (!$result) {
                           die("Query failed: " . mysqli_error($connection));
                           }
                           if($result->num_rows > 0){
                              while ($row = mysqli_fetch_assoc($result)) {
                                 if($row['status'] != 0){
                                    ?>
                                 <li class="product type-product post-4302 status-publish first instock product_cat-compound product_tag-tools has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                    <div class="woocommerce-product-inner">
                                       <div class="woocommerce-product-header"> <a class="woocommerce-product-details" href="product-details.php?slug=<?php echo $row['id']; ?>"> <img width="300" height="300" src="footwearAdmin/upload/<?php echo $row['product_photo']; ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" decoding="async" sizes="(max-width: 300px) 100vw, 300px"> </a><div class="woocommerce-product-meta"><div class="woocommerce-quick-view"> <button class="woosq-btn woosq-btn-4235" onClick="window.location='product-details.php?slug=<?php echo $row['id']; ?>';" data-id="4235" data-effect="mfp-3d-unfold" data-context="default">Quick view</button></div></div></div>
                                       <div class="woocommerce-product-content">
                                          <h4 class="woocommerce-product--title"> <a href="product-details.php?slug=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h4>
                                       </div>
                                    </div>
                                 </li>
                                 <?php
                                 }
                              }   
                           }else{
                              ?>
                              <em class="no-products">No Products Available </em>
                              <?php
                           }
                           
                           
                           ?>
                     </ul>
                     <?php
                        if(!isset($_GET['type'])){
                           $items_per_page = 6;
                           
                           $product_count = "SELECT * FROM products";
                           $total_records = mysqli_query($connection, $product_count);
                           if($total_records->num_rows > 0){

                              $total_record = $total_records->num_rows;
                              $limit = 6;
                              $total_page = ceil($total_record/$limit); 

                              
                              ?>
                              <nav>
                                 <ul class="pagination">
                                    <li class="page-item <?php echo $page == 1 ? 'disabled': '' ;?> ">
                                       <a class="page-link" href="?page=<?php echo $page - 1;?>" tabindex="-1">Previous</a>
                                    </li>
                                       <?php
                                          for ($i=1; $i < $total_page; $i++) { 
                                          $minarea = ceil($total_page/2);
                                          if($i <= $minarea - 1 ){
                                             ?>
                                             <li class="page-item <?php echo $page == $i ? 'active' : ''  ?>">
                                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i;?></a>
                                             </li>
                                             <?php
                                          }
                                       
                                       }
                                       ?>
                                    <li class="page-item <?php echo $page ? 'active' : ''  ?>">
                                       <a class="page-link" href="?page=<?php echo $page + 1;?>">...</a>
                                    </li>  
                                    <li class="page-item <?php echo ($page == $total_page - 1) ? 'disabled': '' ;?>">
                                       <a class="page-link" href="?page=<?php echo $page + 1;?>">Next</a>
                                    </li>
                                 </ul>
                              </nav>
                              <?php

                           }
                        }
                        
                        ?>
                      <?php /* 
                        $sql = "SELECT * FROM products WHERE new_arrivals='yes'";
                        $result = mysqli_query($connection, $sql);
                        if (!$result) {
                        die("Query failed: " . mysqli_error($connection));
                        }	
                        while ($row = mysqli_fetch_assoc($result)) {
                           if($row['status'] != 0){
                              ?>
                              <div class="product-items">
                                 <div class="img">
                                    <a class="img_show" href="product-details.php?slug=<?php echo $row['id']; ?>" title="<?php echo $row['name']; ?>">
                                       <!--img src="footwearAdmin/upload/01_1701356433.png" alt="<?php echo $row['name']; ?>"-->
                                       <img decoding="async" class="no-lazyload" src="footwearAdmin/upload/<?php echo $row['product_photo']; ?>" width="450" height="500" alt="Energy" title="Energy" />
                                    </a>
                                 </div>
                                 <div class="txt">
                                    <a href="product-details.php?slug=<?php echo $row['id']; ?>" target="_blank" title="<?php echo $row['name']; ?>">
                                       <h3><?php echo $row['name']; ?></h3>
                                    </a>
                                    <a href="product-details.php?slug=<?php echo $row['id']; ?>" target="_blank" title="<?php echo $row['name']; ?>" class="link">view</a>
                                 </div>
                              </div>
                              <?php
                           }
                        } */            
                        ?>
                        
                        
                  </div>
               </div>
            </div>
         </div>
         <!-- #content -->
         <?php require('inc/footer.php'); ?>
         <a href="#" class="scroll-top">
         <span>
         <i class="caseicon-long-arrow-right-three"></i>
         </span>
         </a>
      </div>
      <script type="text/javascript" src="./js/bootstrap.min.js" id="bootstrap-js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
           //jquery for toggle sub menus
           $('.sub-btn').click(function(){
             $(this).next('.sub-menu').slideToggle();
             $(this).find('.dropdown').toggleClass('rotate');
           });
         
           //jquery for expand and collapse the sidebar
           $('.menu-btn').click(function(){
             $('.side-bar').addClass('active');
             $('.menu-btn').css("visibility", "hidden");
           });
         
           $('.close-btn').click(function(){
             $('.side-bar').removeClass('active');
             $('.menu-btn').css("visibility", "visible");
           });
         });
      </script>
      <script type="text/javascript" src="./js/jquery.min.js" id="jquery-core-js"></script>
      <script src="./js/jquery.zoom.min.js" id="zoom-js"></script>
      <script src="./js/jquery.flexslider.min.js" id="flexslider-js"></script>
      <script src="./js/photoswipe.min.js" id="photoswipe-js"></script>
      <script src="./js/photoswipe-ui-default.min.js" id="photoswipe-ui-default-js"></script>
      
      <script src="./js/single-product.min.js" id="wc-single-product-js"></script>
      <script type="text/javascript" src="./js/jquery.magnific-popup.min.js" id="magnific-popup-js"></script>
      <!-- <script type="text/javascript" src="./js/woosw-frontend.min.js" id="woosw-frontend-js"></script> -->
      <script type="text/javascript" src="js/jquery.min.js" id="jquery-core-js"></script>
      <script type="text/javascript" src="js/industo-main.min.js" id="industo-main-js"></script>
      <script type="text/javascript" src="js/ct-inline-css.js" id="ct-inline-css-js-js"></script>
      <script type="text/javascript" src="js/webpack.runtime.min.js" id="elementor-webpack-runtime-js"></script>
      <script type="text/javascript" src="js/frontend-modules.min.js" id="elementor-frontend-modules-js"></script>
      <!-- <script type="text/javascript" src="js/frontend.min.js" id="elementor-frontend-js"></script> -->
   </body>
</html>