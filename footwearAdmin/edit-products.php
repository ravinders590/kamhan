<?php require_once 'header.php'; 
require_once 'common_function.php';
$obj = new Ecommerce();
$products_id = $_GET['id'];
if(isset($_REQUEST['edit_products'])){
  

  $description = addslashes($_POST['description']);
  $productmaterial = addslashes($_POST['productmaterial']);
  $data = array(
    'name' => $_POST['name'],
    'description' => $description,
    'productmaterial' => $productmaterial,
    'keywords' => $_POST['keywords'],
    'category' => $_POST['category'],
    'sub_category' => $_POST['sub_category'],
    'new_arrivals' => $_POST['new_arrivals'],
    'type' => $_POST['type'],
    'product_photo' => $_FILES['product_photo'],
    'youtube_video' => $_POST['youtube_video'],
);
  $obj->update_data($data,$products_id);
}



?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Products</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-danger">
          <div class="card-body">
            <form action="" method="post"  enctype="multipart/form-data">
              <?php if ($_SESSION['userData']['type'] == 'Super Admin') {
                ?>
                <div class="form-group">
                    <fieldset class="fieldset">
                      <legend>Hide/Show</legend>
                      <div class="form-group">
                        <div class="custom-control custom-radio d-inline mr-2">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="hide_and_show" checked="" value="yes">
                          <label for="customRadio1" class="custom-control-label">Yes</label>
                        </div>
                        <div class="custom-control custom-radio d-inline">
                          <input class="custom-control-input" type="radio" id="customRadio2" name="hide_and_show" value="no">
                          <label for="customRadio2" class="custom-control-label">No</label>
                        </div>
                      </div>
                    </fieldset>
                </div>
                <?php  
              } ?>
              
              <!-- Date dd/mm/yyyy -->
              <?php 
                $product_data_set = $obj->GetProductsDataById($products_id);
                if (!empty($product_data_set)) {
                  foreach ($product_data_set as $key => $product_data) {
                    
                ?>

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Name" class="form-control" name="name" required="" value="<?php echo $product_data['name'];?> ">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="summernote description" required="" >
                  <?php echo $product_data['description'];?> 
                </textarea>
              </div>
			        <div class="form-group">
                <label for="">Product Material</label>
                <textarea name="productmaterial" class="summernote description" required="" >
                  <?php echo $product_data['productmaterial'];?> 
                </textarea>
              </div>
              <div class="form-group">
                <label for="keywords">SEO Keywords</label>
                <input type="text" id="keywords" placeholder="SEO Keywords" class="form-control" name="keywords" value="<?php echo $product_data['keywords'];?> ">
              </div>
              <div class="form-group">
                <fieldset class="fieldset">
                  <legend>Category</legend>
                  <div class="form-group">
                    <select name="category" id="category_data" class="form-control">
                      <option value="">Select Main Category</option>
                      <?php 
                        $obj_main_category_view = $obj->GetMainCategoryName($product_data['category']);
                        if (!empty($obj_main_category_view)) {
                          foreach ($obj_main_category_view as $key => $obj_main_category_views) {
                            ?>
                            <option value="<?php echo $obj_main_category_views['id']; ?>"><?php echo $obj_main_category_views['name']; ?></option>
                            <?php
                          }
                          
                        }
                       ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="sub_category" id="sub_category_data" class="form-control">
                      <option value="">Select Sub Category</option>
                    </select>
                  </div>
                </fieldset>
              </div>
              
              <div class="form-group">
                <fieldset class="fieldset">
                  <legend>New Arrivals</legend>
                  <div class="form-group">
                    <div class="custom-control custom-radio d-inline mr-2">
                      <input class="custom-control-input" type="radio" id="customRadio1" name="new_arrivals" checked="" value="yes">
                      <label for="customRadio1" class="custom-control-label">Yes</label>
                    </div>
                    <div class="custom-control custom-radio d-inline">
                      <input class="custom-control-input" type="radio" id="customRadio2" name="new_arrivals" value="no">
                      <label for="customRadio2" class="custom-control-label">No</label>
                    </div>
                  </div>
                </fieldset>
              </div>
              <div class="form-group">
                <fieldset class="fieldset">
                  <legend>Type</legend>
                  <div class="form-group">
                    <div class="custom-control custom-radio d-inline mr-2">
                      <input class="custom-control-input" type="radio" id="customRadio3" name="type" checked="" value="footwear machine">
                      <label for="customRadio3" class="custom-control-label">Footwear machine</label>
                    </div>
                    <div class="custom-control custom-radio d-inline">
                      <input class="custom-control-input" type="radio" id="customRadio4" name="type" value="footwear moulds">
                      <label for="customRadio4" class="custom-control-label">Footwear moulds</label>
                    </div>
                    
                  </div>
                </fieldset>
              </div>	
			  
              <div class="form-group">
                <label for="main">Product Photo</label>
                <input type="file" id="main" name="product_photo[]" class="form-control" value="" multiple>
                <div class="show_image">
                <?php
                    $product_photo = unserialize($product_data['product_photo']);
                    for ($i=0; $i < count($product_photo); $i++) { 
                      ?>
                    
                      <img src="upload/<?php echo $product_photo[$i];?>" alt="">
                    
                      <?php 
                    }
                    ?>
                  </div>
              </div>
              <?php /*
              <div class="form-group">
                <fieldset class="fieldset">
                  <legend>Product Thumbnail Photo</legend>
                  <div class="form-group">
                    <input type="file" name="product_photo_th_01" class="form-control" value="<?php echo $product_data['product_photo_th_01'];?>">
                    <input type="hidden" name="product_hidden_file_1" value="<?php echo $product_data['product_photo_th_01'];?>">
                    <div class="show_image">
                      <img src="upload/<?php echo !empty($product_data['product_photo_th_01']) ? $product_data['product_photo_th_01'] : 'placeholder.jpg' ;?>" alt="">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="file" name="product_photo_th_02" class="form-control" value="<?php echo $product_data['product_photo_th_02'];?>">
                    <input type="hidden" name="product_hidden_file_2" value="<?php echo $product_data['product_photo_th_02'];?>">
                    <div class="show_image">
                      <img src="upload/<?php echo !empty($product_data['product_photo_th_02']) ? $product_data['product_photo_th_02'] : 'placeholder.jpg' ;?>" alt="">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="file" name="product_photo_th_03" class="form-control" value="<?php echo $product_data['product_photo_th_03'];?>">
                    <input type="hidden" name="product_hidden_file_3" value="<?php echo $product_data['product_photo_th_03'];?>">
                    <div class="show_image">
                      <img src="upload/<?php echo !empty($product_data['product_photo_th_03']) ? $product_data['product_photo_th_03'] : 'placeholder.jpg' ;?>" alt="">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="file" name="product_photo_th_04" class="form-control" value="<?php echo $product_data['product_photo_th_04'];?>">
                    <input type="hidden" name="product_hidden_file_4" value="<?php echo $product_data['product_photo_th_04'];?>">
                    <div class="show_image">
                      <img src="upload/<?php echo !empty($product_data['product_photo_th_04']) ? $product_data['product_photo_th_04'] : 'placeholder.jpg' ;?>" alt="">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="file" name="product_photo_th_05" class="form-control" value="<?php echo $product_data['product_photo_th_05'];?>">
                    <input type="hidden" name="product_hidden_file_5" value="<?php echo $product_data['product_photo_th_05'];?>">
                    <div class="show_image">
                      <img src="upload/<?php echo !empty($product_data['product_photo_th_05']) ? $product_data['product_photo_th_05'] : 'placeholder.jpg' ;?>" alt="">
                    </div>
                  </div>
                </fieldset>
              </div>
              */?>
              <div class="form-group">
                <label for="main">Product Youtube Url</label>
                <input type="url" name="youtube_video[]" class="form-control" value="">
                <div class="show_image">
                <?php
                  $youtube_videos = unserialize($product_data['youtube_video']);
                  $youtube_videos = explode(',',$youtube_videos[0]);
                    for ($i=0; $i < count($youtube_videos) ; $i++) { 
                      if (preg_match('/embed/',$youtube_videos[$i]) === 1 || preg_match('/youtu.be/',$youtube_videos[$i]) === 1) {
                        $youtube_video = $youtube_videos[$i];
                        $youtube_video = explode('/',$youtube_video);
                        $youtube_video = end($youtube_video);
                        
                        ?>
                        <iframe width="100" height="100" src="https://www.youtube.com/embed/<?php echo $youtube_video; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                        <?php
                        
                      }
                    }
                    ?>
                  </div>
              </div>
              <?php    
                  }

                }
               ?>
              <button type="submit" class="btn btn-primary" name="edit_products">Submit</button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once 'footer.php'; ?>
<script type="text/javascript">
  $(function(){
    $('#category_data').on('change',function(){
      var form_data = new FormData();
      form_data.append('category_id', $(this).val());
      form_data.append('action', 'category');
      $.ajax({
        method: 'POST',
        url: 'admin_ajax.php',
        cache: false,
        processData: false,
        contentType: false,
        data:form_data,
      })
      .done(function(response) {
        $('#sub_category_data').html(response);
      });
      
    });
  });
</script>