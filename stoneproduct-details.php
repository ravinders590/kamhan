<?php include('inc/stone-dbconnection.php'); 
 
 $productId = $_GET['slug'];
 $sql = "SELECT * FROM products WHERE id = $productId";
 $result = mysqli_query($connection, $sql);
 if (!$result) {
 die("Query failed: " . mysqli_error($connection));
 }
 $row = mysqli_fetch_assoc($result);
//  $youtube_video = str_replace('https://www.youtube.com/watch?v=','https://www.youtube.com/embed/',$row['youtube_video']);
 $site_path = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 $product_url = $_SERVER['HTTP_HOST'] .  '/kamhan-new/stoneAdmin/upload/' . $row['product_photo'];
 $meta_title = $row['name'];
 $meta_dec = 'Although, Kam Han Industrial Ltd. Was incorporated in Hong Kong in 1989, but it commenced the said business 35 years ago. The company was established with the profile of general trading, but due to the progressive success accomplished, the company had today established itself as a leader in the diverse categories of products and value added services. The most recent achievements in the last few years are in the domain of Footwear Manufacturing and Machinery, Turnkey solutions for Footwear industry and Umbrella components.
 We are leading provider of Footwear machines of various types. Our expertise in this area is further augmented by our technical support team and complete insight into it. Not to mention, our experience and strategic contacts with the related business partners makes us the most competitive and reliable source for all kinds of footwear machines. Select from Footwear machines below.';
 $meta_url = $site_path;
 $meta_image = $product_url;
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
      <link rel="stylesheet" id="photoswipe-css" href="./css/photoswipe.min.css" media="all" />
      <link rel="stylesheet" id="photoswipe-default-skin-css" href="./css/default-skin.min.css" media="all" />
      <link rel="stylesheet" id="industroz-style-css" href="./css/style.css" media="all" />
      <link rel="stylesheet" id="woocommerce-general-css" href="./css/woocommerce-general.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="bootstrap-css" href="./css/bootstrap.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="industo-theme-css" href="./css/industo-theme.min.css" type="text/css" media="all">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
      <link rel="stylesheet" href="./css/tabs.css">
      <link rel="stylesheet" id="bootstrap-css" href="css/bootstrap.min.css" type="text/css" media="all">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
      <link rel="stylesheet" id="flaticon2-css" href="css/flaticon2.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="caseicon-css" href="css/caseicon.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="elementor-frontend-css" href="css/frontend-lite.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="elementor-post-146-css" href="css/post-146.css" type="text/css" media="all">
      <link rel="stylesheet" id="elementor-post-2951-css" href="css/post-2951.css" type="text/css" media="all">
      <link rel="stylesheet" id="elementor-post-13732-css" href="css/post-13732.css" type="text/css" media="all">
      <style id="ct_theme_options-dynamic-css" title="dynamic-css" class="redux-options-output">body #ct-pagetitle{background-image:url('./images/pageimages/about.jpg');}a{color:#fe0000;}a:hover{color:#fe0000;}a:active{color:#fe0000;}</style>
      <link rel="stylesheet" id="elementor-post-6-css" href="css/post-6.css" type="text/css" media="all">
      <link rel="stylesheet" href="./css/sider.css">
   </head>
   <body class="product-template-default single single-product postid-285 theme-industroz woocommerce woocommerce-page woocommerce-js singular enable-search-modal has-post-thumbnail has-single-pagination showing-comments show-avatars footer-top-hidden elementor-default elementor-kit-22 crm_body_bg">
      <?php require('inc/header.php'); ?> 
      <div id="ct-pagetitle" class="ct-pagetitle bg-image text-left">
         <div class="container">
            <ul class="ct-breadcrumb">
               <li><a class="breadcrumb-entry" href="./index.php">Home</a></li>
               <li><span class="breadcrumb-entry">Footwear Products</span></li>
            </ul>
            <div class="ct-page-title-holder">
               <h1 class="ct-page-title"><?php echo $row['name']; 	?></h1>
            </div>
         </div>
      </div>
      <div class="container-fluid">
         <div class="rightbar" id="rightbar01">
            <div id="primary" class="content-area">
               <main id="main" class="site-main" role="main">
                  <div class="section-full">
                     <!-- PRODUCT DETAILS -->
                     <div class="container woo-entry">
                        <!-- SECTION CONTENT START -->               
                        <div id="primary" class="content-area">
                           <main id="main" class="site-main" role="main">
                              <div class="section-full">
                                 <!-- PRODUCT DETAILS -->
                                 <div class="container woo-entry p-0">
                                    <div id="product-285" class="product type-product post-285 status-publish first instock product_cat-mechanical-products has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                       <div class="row">
                                          <div class="col-lg-6 col-md-6 left-product-panel">
                                             <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 0; transition: opacity 0.25s ease-in-out;">
                                                <div class="woocommerce-product-gallery__wrapper">
                                                   <div data-thumb="stoneAdmin/upload/<?php echo $row['product_photo']; ?>" data-thumb-alt="" class="woocommerce-product-gallery__image">
                                                      <a href="stoneAdmin/upload/<?php echo $row['product_photo']; ?>">
                                                      <img
                                                         width="280"
                                                         height="280"
                                                         src="stoneAdmin/upload/<?php echo $row['product_photo']; ?>"
                                                         class=""
                                                         alt=""
                                                         decoding="async"
                                                         loading="lazy"
                                                         title="pic-4"
                                                         data-caption=""
                                                         data-src="stoneAdmin/upload/<?php echo $row['product_photo']; ?>"
                                                         data-large_image="stoneAdmin/upload/<?php echo $row['product_photo']; ?>"
                                                         data-large_image_width="280"
                                                         data-large_image_height="280"
                                                         srcset="stoneAdmin/upload/<?php echo $row['product_photo']; ?>"
                                                         sizes="(max-width: 280px) 100vw, 280px"
                                                         />
                                                      </a>
                                                   </div>
                                                   <?php 
                                                      if(!empty($row['product_photo_th_01'])){
                                                      ?>
                                                   <div data-thumb="stoneAdmin/upload/<?php echo $row['product_photo_th_01']; ?>" data-thumb-alt="" class="woocommerce-product-gallery__image">
                                                      <a href="stoneAdmin/upload/<?php echo $row['product_photo_th_01']; ?>">
                                                      <img
                                                         width="280"
                                                         height="280"
                                                         src="stoneAdmin/upload/<?php echo $row['product_photo_th_01']; ?>"
                                                         class=""
                                                         alt=""
                                                         decoding="async"
                                                         loading="lazy"
                                                         title="pic-4"
                                                         data-caption=""
                                                         data-src="stoneAdmin/upload/<?php echo $row['product_photo_th_01']; ?>"
                                                         data-large_image="stoneAdmin/upload/<?php echo $row['product_photo_th_01']; ?>"
                                                         data-large_image_width="280"
                                                         data-large_image_height="280"
                                                         srcset="stoneAdmin/upload/<?php echo $row['product_photo_th_01']; ?>"
                                                         sizes="(max-width: 280px) 100vw, 280px"
                                                         />
                                                      </a>
                                                   </div>
                                                   <?php }
                                                      if(!empty($row['product_photo_th_02'])){
                                                      ?>
                                                   <div data-thumb="stoneAdmin/upload/<?php echo $row['product_photo_th_02']; ?>" data-thumb-alt="" class="woocommerce-product-gallery__image">
                                                      <a href="stoneAdmin/upload/<?php echo $row['product_photo_th_02']; ?>">
                                                      <img
                                                         width="280"
                                                         height="280"
                                                         src="stoneAdmin/upload/<?php echo $row['product_photo_th_02']; ?>"
                                                         class=""
                                                         alt=""
                                                         decoding="async"
                                                         loading="lazy"
                                                         title="pic-4"
                                                         data-caption=""
                                                         data-src="stoneAdmin/upload/<?php echo $row['product_photo_th_02']; ?>"
                                                         data-large_image="stoneAdmin/upload/<?php echo $row['product_photo_th_02']; ?>"
                                                         data-large_image_width="280"
                                                         data-large_image_height="280"
                                                         srcset="stoneAdmin/upload/<?php echo $row['product_photo_th_02']; ?>"
                                                         sizes="(max-width: 280px) 100vw, 280px"
                                                         />
                                                      </a>
                                                   </div>
                                                   <?php }
                                                      if(!empty($row['product_photo_th_03'])){
                                                      ?>
                                                   <div data-thumb="stoneAdmin/upload/<?php echo $row['product_photo_th_03']; ?>" data-thumb-alt="" class="woocommerce-product-gallery__image">
                                                      <a href="stoneAdmin/upload/<?php echo $row['product_photo_th_03']; ?>">
                                                      <img
                                                         width="280"
                                                         height="280"
                                                         src="stoneAdmin/upload/<?php echo $row['product_photo_th_03']; ?>"
                                                         class=""
                                                         alt=""
                                                         decoding="async"
                                                         loading="lazy"
                                                         title="pic-4"
                                                         data-caption=""
                                                         data-src="stoneAdmin/upload/<?php echo $row['product_photo_th_03']; ?>"
                                                         data-large_image="stoneAdmin/upload/<?php echo $row['product_photo_th_03']; ?>"
                                                         data-large_image_width="280"
                                                         data-large_image_height="280"
                                                         srcset="stoneAdmin/upload/<?php echo $row['product_photo_th_03']; ?>"
                                                         sizes="(max-width: 280px) 100vw, 280px"
                                                         />
                                                      </a>
                                                   </div>
                                                   <?php }
                                                      if(!empty($row['product_photo_th_04'])){
                                                      ?>
                                                   <div data-thumb="stoneAdmin/upload/<?php echo $row['product_photo_th_04']; ?>" data-thumb-alt="" class="woocommerce-product-gallery__image">
                                                      <a href="stoneAdmin/upload/<?php echo $row['product_photo_th_04']; ?>">
                                                      <img
                                                         width="280"
                                                         height="280"
                                                         src="stoneAdmin/upload/<?php echo $row['product_photo_th_04']; ?>"
                                                         class=""
                                                         alt=""
                                                         decoding="async"
                                                         loading="lazy"
                                                         title="pic-4"
                                                         data-caption=""
                                                         data-src="stoneAdmin/upload/<?php echo $row['product_photo_th_04']; ?>"
                                                         data-large_image="stoneAdmin/upload/<?php echo $row['product_photo_th_03']; ?>"
                                                         data-large_image_width="280"
                                                         data-large_image_height="280"
                                                         srcset="stoneAdmin/upload/<?php echo $row['product_photo_th_04']; ?>"
                                                         sizes="(max-width: 280px) 100vw, 280px"
                                                         />
                                                      </a>
                                                   </div>
                                                   <?php   
                                                      }
                                                      ?>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-lg-6 col-md-6 right-product-panel">
                                             <div class="summary entry-summary">
                                                <div class="woocommerce-sg-product-rating">
                                                   <div class="woocommerce-product-rating">
                                                      <div class="star-rating-wrap">
                                                         <div class="star-rating"><span style="width:90%"></span></div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="woocommerce-sg-product-price">
                                                   <p class="price"><span class="woocommerce-Price-amount amount"><bdi><?php echo $row['name']; 	?></bdi></span></p>
                                                </div>
                                                <div class="woocommerce-sg-product-excerpt">
                                                   <div class="woocommerce-product-details__short-description">
                                                      <?php echo !empty($row['description']) ? $row['description'] : '' ; ?>
                                                   </div>
                                                </div>
                                                
                                                <div class="woocommerce-social-share"> <label>Share:</label> 
                                                <a class="fb-social" title="Facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $site_path;?>"><i class="caseicon-facebook"></i></a> <a class="tw-social" title="Twitter" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $site_path;?>&amp;text=<?php echo $row['name']; 	?>"><i class="caseicon-twitter"></i></a> <a class="pin-social" title="Pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $site_path;?>&amp;media=<?php echo $product_url; ?>&amp;description=<?php echo $row['name']; 	?>"><i class="caseicon-pinterest"></i></a></div>
                                             </div>
                                             <?php /*
                                             <div class="product-summary">
                                                <h1 class="product_title"><?php echo $row['name']; 	?></h1>
                                                <div class="product-details_short-description">
                                                   <?php echo !empty($row['description']) ? $row['description'] : '' ; ?>
                                                </div>
                                             </div>
                                             */?>
                                             
                                          </div>
                                       </div>
                                       <div class="wt-tabs border bg-tabs">
                                          <ul class="nav nav-tabs" role="tablist">
                                             <li><a data-toggle="tab" href="#features" class="description_tab active">Product Features</a></li>
                                             <li><a data-toggle="tab" href="#localDisplay" class="reviews_tab">Product Display</a></li>
                                             <li><a data-toggle="tab" href="#videos" class="reviews_tab">Videos</a></li>
                                          </ul>
                                          <div class="tab-content">
                                             <div id="features" class="tab-pane active">
                                                <div class="tab-content-inner">
                                                   <?php
                                                   if(!empty($row['productmaterial'])){
                                                      echo $row['productmaterial'];
                                                   }else{
                                                      ?>
                                                      <em class="comments-title m-t0 no-data-notes">No Data Available</span></em>
                                                      <?php
                                                   }
                                                   ?>
                                                </div>
                                             </div>
                                             
                                             <div id="localDisplay" class="tab-pane">
                                                <div class="tab-content-inner">
                                                   <div class="clear" id="comment-list">
                                                      <h2 class="comments-title m-t0">Product Display</span></h2>
                                                      <div id="reviews" class="woocommerce-Reviews comments-area product-display-areas">
                                                         <?php
                                                            if(!empty($row['product_photo'])){
                                                            ?>
                                                         <div data-thumb="stoneAdmin/upload/<?php echo $row['product_photo']; ?>" data-thumb-alt="" class="woocommerce-product-gallery__image">
                                                            <img
                                                               width="300"
                                                               height="300"
                                                               src="stoneAdmin/upload/<?php echo $row['product_photo']; ?>"
                                                               class=""
                                                               alt=""
                                                               decoding="async"
                                                               loading="lazy"
                                                               title="pic-4"
                                                               data-caption=""
                                                               data-src="stoneAdmin/upload/<?php echo $row['product_photo']; ?>"
                                                               data-large_image="stoneAdmin/upload/<?php echo $row['product_photo']; ?>"
                                                               data-large_image_width="500"
                                                               data-large_image_height="500"
                                                               srcset="stoneAdmin/upload/<?php echo $row['product_photo']; ?>"
                                                               sizes="(max-width: 280px) 100vw, 280px"
                                                               />
                                                         </div>
                                                         <?php
                                                            }
                                                            if(!empty($row['product_photo_th_01'])){
                                                            ?>
                                                         <div data-thumb="stoneAdmin/upload/<?php echo $row['product_photo_th_01']; ?>" data-thumb-alt="" class="woocommerce-product-gallery__image">
                                                            <img
                                                               width="300"
                                                               height="300"
                                                               src="stoneAdmin/upload/<?php echo $row['product_photo_th_01']; ?>"
                                                               class=""
                                                               alt=""
                                                               decoding="async"
                                                               loading="lazy"
                                                               title="pic-4"
                                                               data-caption=""
                                                               data-src="stoneAdmin/upload/<?php echo $row['product_photo_th_01']; ?>"
                                                               data-large_image="stoneAdmin/upload/<?php echo $row['product_photo_th_02']; ?>"
                                                               data-large_image_width="500"
                                                               data-large_image_height="500"
                                                               srcset="stoneAdmin/upload/<?php echo $row['product_photo_th_01']; ?>"
                                                               sizes="(max-width: 280px) 100vw, 280px"
                                                               />
                                                         </div>
                                                         <?php
                                                            }
                                                            if(!empty($row['product_photo_th_02'])){
                                                            ?>
                                                         <div data-thumb="stoneAdmin/upload/<?php echo $row['product_photo_th_02']; ?>" data-thumb-alt="" class="woocommerce-product-gallery__image">
                                                            <img
                                                               width="300"
                                                               height="300"
                                                               src="stoneAdmin/upload/<?php echo $row['product_photo_th_02']; ?>"
                                                               class=""
                                                               alt=""
                                                               decoding="async"
                                                               loading="lazy"
                                                               title="pic-4"
                                                               data-caption=""
                                                               data-src="stoneAdmin/upload/<?php echo $row['product_photo_th_02']; ?>"
                                                               data-large_image="stoneAdmin/upload/<?php echo $row['product_photo_th_02']; ?>"
                                                               data-large_image_width="280"
                                                               data-large_image_height="280"
                                                               srcset="stoneAdmin/upload/<?php echo $row['product_photo_th_02']; ?>"
                                                               sizes="(max-width: 280px) 100vw, 280px"
                                                               />
                                                         </div>
                                                         <?php
                                                            }
                                                            if(!empty($row['product_photo_th_03'])){
                                                            ?>
                                                         <div data-thumb="stoneAdmin/upload/<?php echo $row['product_photo_th_03']; ?>" data-thumb-alt="" class="woocommerce-product-gallery__image">
                                                            <img
                                                               width="300"
                                                               height="300"
                                                               src="stoneAdmin/upload/<?php echo $row['product_photo_th_03']; ?>"
                                                               class=""
                                                               alt=""
                                                               decoding="async"
                                                               loading="lazy"
                                                               title="pic-4"
                                                               data-caption=""
                                                               data-src="stoneAdmin/upload/<?php echo $row['product_photo_th_03']; ?>"
                                                               data-large_image="stoneAdmin/upload/<?php echo $row['product_photo_th_03']; ?>"
                                                               data-large_image_width="280"
                                                               data-large_image_height="280"
                                                               srcset="stoneAdmin/upload/<?php echo $row['product_photo_th_03']; ?>"
                                                               sizes="(max-width: 280px) 100vw, 280px"
                                                               />
                                                         </div>
                                                         <?php
                                                            }
                                                            ?>
                                                         <div class="clear"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             
                                             <div id="videos" class="tab-pane">
                                                <div class="tab-content-inner">
                                                   <div class="clear" id="comment-list">
                                                      <?php 
                                                         if(!empty($row['youtube_video'])){
                                                            ?>
                                                      <h2 class="comments-title m-t0">Videos</span></h2>
                                                      <div id="reviews" class="woocommerce-Reviews comments-area product-video-display-areas">
                                                         <div class="woocommerce-product-gallery__image">
                                                         <?php
                                                            $youtube_multi_url = explode(' ',$row['youtube_video']);
                                                            $youtube_multi_url = array_unique($youtube_multi_url);
                                                            for ($j=0; $j <= count($youtube_multi_url) ; $j++) { 
                                                               $new_youtube_url = str_replace('?rel=0',' ',$youtube_multi_url[$j]); 
                                                               if(preg_match('/embed/',$new_youtube_url) === 1){
                                                                  $new_youtube_url = explode('/',$new_youtube_url);
                                                                  $new_youtube_url = trim(end($new_youtube_url));
                                                                  ?>
                                                                  <iframe width="100" height="200" src="https://www.youtube.com/embed/<?php echo $new_youtube_url; ?>?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                                                                  <?php
                                                               }elseif(preg_match('/watch/',$new_youtube_url) === 1){
                                                                  $new_youtube_url = explode('?v=',$new_youtube_url);
                                                                  $new_youtube_url = trim(end($new_youtube_url));
                                                                  ?>
                                                                  <iframe width="100" height="200" src="https://www.youtube.com/embed/<?php echo $new_youtube_url; ?>?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                                                                  <?php
                                                               }
                                                               
                                                            }
                                                            
                                                            ?>
                                                         </div>
                                                         <div class="clear"></div>
                                                      </div>
                                                      <?php
                                                         }else{
                                                            ?>
                                                      <em class="comments-title m-t0 no-data-notes">No Data Available</span></em>
                                                      <?php
                                                         }
                                                         ?>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </main>
                        </div>
                        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                           <div class="pswp__bg"></div>
                           <div class="pswp__scroll-wrap">
                              <div class="pswp__container">
                                 <div class="pswp__item"></div>
                                 <div class="pswp__item"></div>
                                 <div class="pswp__item"></div>
                              </div>
                              <div class="pswp__ui pswp__ui--hidden">
                                 <div class="pswp__top-bar">
                                    <div class="pswp__counter"></div>
                                    <button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button>
                                    <button class="pswp__button pswp__button--share" aria-label="Share"></button>
                                    <button class="pswp__button pswp__button--fs" aria-label="Toggle fullscreen"></button>
                                    <button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button>
                                    <div class="pswp__preloader">
                                       <div class="pswp__preloader__icn">
                                          <div class="pswp__preloader__cut">
                                             <div class="pswp__preloader__donut"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                    <div class="pswp__share-tooltip"></div>
                                 </div>
                                 <button class="pswp__button pswp__button--arrow--left" aria-label="Previous (arrow left)"><i class="fa-solid fa-arrow-left"></i></button>
                                 <button class="pswp__button pswp__button--arrow--right" aria-label="Next (arrow right)"><i class="fa-solid fa-arrow-right"></i></button>
                                 <div class="pswp__caption">
                                    <div class="pswp__caption__center"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </main>
            </div>
         </div>
      </div>
      <?php require('inc/footer.php'); ?>
      <a href="#" class="scroll-top">
      <span>
      <i class="caseicon-long-arrow-right-three"></i>
      </span>
      </a>
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
         
         $('.open-menu').click(function(){
             $('.menu-btn').css("visibility", "hidden");
         
             });
         
         $('.open-menu').click(function() {
         if ($(this).hasClass('opened')) {
         // If the clicked element has both classes 'open-menu' and 'opened'
         //alert("asas");
         $('.menu-btn').css("visibility", "visible");
         }
         
         });
         });
      </script>
      <script type="text/javascript" src="./js/bootstrap.min.js" id="bootstrap-js"></script>
      <script type="text/javascript" src="./js/jquery.min.js" id="jquery-core-js"></script>
      <script src="./js/jquery.zoom.min.js" id="zoom-js"></script>
      <script src="./js/jquery.flexslider.min.js" id="flexslider-js"></script>
      <script src="./js/photoswipe.min.js" id="photoswipe-js"></script>
      <script src="./js/photoswipe-ui-default.min.js" id="photoswipe-ui-default-js"></script>
      <script id="wc-single-product-js-extra">
         var wc_single_product_params = {
             i18n_required_rating_text: "Please select a rating",
             review_rating_required: "yes",
             flexslider: { rtl: false, animation: "slide", smoothHeight: true, directionNav: false, controlNav: "thumbnails", slideshow: false, animationSpeed: 500, animationLoop: false, allowOneSlide: false },
             zoom_enabled: "1",
             zoom_options: [],
             photoswipe_enabled: "1",
             photoswipe_options: { shareEl: false, closeOnScroll: false, history: false, hideAnimationDuration: 0, showAnimationDuration: 0 },
             flexslider_enabled: "1",
         };
      </script>
      <script src="./js/single-product.min.js" id="wc-single-product-js"></script>
      <script type="text/javascript" src="./js/jquery.magnific-popup.min.js" id="magnific-popup-js"></script>
      <script type="text/javascript" src="./js/woosw-frontend.min.js" id="woosw-frontend-js"></script>
      <script type="text/javascript" src="js/jquery.min.js" id="jquery-core-js"></script>
      <script type="text/javascript" src="js/industo-main.min.js" id="industo-main-js"></script>
      <script type="text/javascript" src="js/ct-inline-css.js" id="ct-inline-css-js-js"></script>
      <script type="text/javascript" src="js/webpack.runtime.min.js" id="elementor-webpack-runtime-js"></script>
      <script type="text/javascript" src="js/frontend-modules.min.js" id="elementor-frontend-modules-js"></script>
      <script id="elementor-frontend-js-before" type="text/javascript"> var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile Portrait","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}}},"version":"3.12.2","is_static":false,"experimentalFeatures":{"e_dom_optimization":true,"e_optimized_assets_loading":true,"e_optimized_css_loading":true,"a11y_improvements":true,"additional_custom_breakpoints":true,"landing-pages":true},"urls":{"assets":"https:\/\/demo.casethemes.net\/industo\/wp-content\/plugins\/elementor\/assets\/"},"swiperClass":"swiper-container","settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":6,"title":"Industo%20%E2%80%93%20Industry%20%26%20Factory%20WordPress","excerpt":"","featuredImage":false}}; </script>
      <script type="text/javascript" src="js/frontend.min.js" id="elementor-frontend-js"></script>
   </body>
</html>