<?php
ini_set('display_errors',0);
$page = 'products';
require 'header.php'; 
require_once 'common_function.php';
$obj = new Ecommerce();
$temp = '';
if(isset($_REQUEST['add_products'])){
  $name = Ecommerce::RemoveSpecialChar($_POST['name']);
  $product_photo = $_FILES['product_photo']['name'];

  $product_photo_th_01 = $_FILES['product_photo_th_01']['name'];

  $product_photo_th_02 = $_FILES['product_photo_th_02']['name'];

  $product_photo_th_03 = $_FILES['product_photo_th_03']['name'];

  $product_photo_th_04 = $_FILES['product_photo_th_04']['name'];

  $product_photo_th_05 = $_FILES['product_photo_th_05']['name'];

  $product_photo = pathinfo($product_photo)['filename'] . '_' . time() . '.' . strtolower(pathinfo($product_photo, PATHINFO_EXTENSION));
  if ((pathinfo($product_photo_th_01, PATHINFO_EXTENSION) =="" ) && (pathinfo($product_photo_th_01)['filename']) =="" ) {
    $temp = '';  
  }else{
    $temp = '_' . time() . '.';
  }
  $product_photo_th_01 = pathinfo($product_photo_th_01)['filename'] . $temp . strtolower(pathinfo($product_photo_th_01, PATHINFO_EXTENSION));

  if ((pathinfo($product_photo_th_02, PATHINFO_EXTENSION) =="" ) && (pathinfo($product_photo_th_02)['filename']) =="" ) {
    $temp = '';  
  }else{
    $temp = '_' . time() . '.';
  }
  
  $product_photo_th_02 = pathinfo($product_photo_th_02)['filename'] . $temp . strtolower(pathinfo($product_photo_th_02, PATHINFO_EXTENSION));

  if ((pathinfo($product_photo_th_03, PATHINFO_EXTENSION) =="" ) && (pathinfo($product_photo_th_03)['filename']) =="" ) {
    $temp = '';  
  }else{
    $temp = '_' . time() . '.';
  }
  
  $product_photo_th_03 = pathinfo($product_photo_th_03)['filename'] . $temp . strtolower(pathinfo($product_photo_th_03, PATHINFO_EXTENSION));

  if ((pathinfo($product_photo_th_04, PATHINFO_EXTENSION) =="" ) && (pathinfo($product_photo_th_04)['filename']) =="" ) {
    $temp = '';  
  }else{
    $temp = '_' . time() . '.';
  }
  
  $product_photo_th_04 = pathinfo($product_photo_th_04)['filename'] . $temp . strtolower(pathinfo($product_photo_th_04, PATHINFO_EXTENSION));

  if ((pathinfo($product_photo_th_05, PATHINFO_EXTENSION) =="" ) && (pathinfo($product_photo_th_05)['filename']) =="" ) {
    $temp = '';  
  }else{
    $temp = '_' . time() . '.';
  }
  
  $product_photo_th_05 = pathinfo($product_photo_th_05)['filename'] . $temp . strtolower(pathinfo($product_photo_th_05, PATHINFO_EXTENSION));

  
  $description = addslashes($_POST['description']);
$productmaterial = addslashes($_POST['productmaterial']);

$data = array(
    'name' => $name,
    'description' => $description,
    'productmaterial' => $productmaterial,
    'keywords' => $_POST['keywords'],
    'category' => $_POST['category'],
    'sub_category' => $_POST['sub_category'],
    'new_arrivals' => $_POST['new_arrivals'],
    'product_photo' => $product_photo,
    'product_photo_th_01' => $product_photo_th_01,
    'product_photo_th_02' => $product_photo_th_02,
    'product_photo_th_03' => $product_photo_th_03,
    'product_photo_th_04' => $product_photo_th_04,
    'product_photo_th_05' => $product_photo_th_05,
    'youtube_video' => $_POST['youtube_video'],
);

  
  $obj->AddProduct($data);
}

if (isset($_GET['delete']) && !empty($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $obj->DeleteProductDataById($delete_id);
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
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Name" class="form-control" name="name" required="">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="summernote description" required="">
                </textarea>
              </div>
			  
			  <div class="form-group">
                <label for="">Product Material</label>
                <textarea name="productmaterial" class="summernote description" required="">
                </textarea>
              </div>
			  
              <div class="form-group">
                <label for="keywords">SEO Keywords</label>
                <input type="text" id="keywords" placeholder="SEO Keywords" class="form-control" name="keywords" required="">
              </div>
              <div class="form-group">
                <fieldset class="fieldset">
                  <legend>Category</legend>
                  <div class="form-group">
                    <select name="category" id="category_data" class="form-control" required="">
                      <option value="">Select Main Category</option>
                      <?php 
                        $obj_main_category_view = $obj->GetMainCategory();
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
                <label for="main">Product Photo</label>
                <input type="file" id="main" name="product_photo" class="form-control" required="">
              </div>
              <div class="form-group">
                <fieldset class="fieldset">
                  <legend>Product Thumbnail Photo</legend>
                  <div class="form-group">
                    <input type="file" name="product_photo_th_01" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="file" name="product_photo_th_02" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="file" name="product_photo_th_03" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="file" name="product_photo_th_04" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="file" name="product_photo_th_05" class="form-control">
                  </div>
                </fieldset>
              </div>
              <div class="form-group">
                <label for="main">Product Youtube Url</label>
                <input type="url" name="youtube_video" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary" name="add_products">Submit</button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">

                  <table class="datatable-set table table-bordered table-striped">
                    <thead>

                    <tr>
                      <th class="text-center">Actions</th>
                      <th class="text-center">S.no.</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Keywords</th>
                      <th>Product Photo</th>
                      <th>Thumbnail Photo 01</th>
                      <th>Thumbnail Photo 02</th>
                      <th>Thumbnail Photo 03</th>
                      <th>Thumbnail Photo 04</th>
                      <th>Thumbnail Photo 05</th>
                      <th>Video</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $obj_view = $obj->GetProducts();
                      $i=1;
                      if (!empty($obj_view)) {
                        foreach ($obj_view as $key => $obj_views) {
                          if ($obj_views['status'] != 0) {
                           ?>
                           <tr>
                              <td class="text-center actions"><a href="edit-products.php?id=<?php echo $obj_views['id']; ?>" class="text-primary"><i class="fas fa-pen-square"></i></a><a href="?delete=<?php echo $obj_views['id']; ?>" class="text-danger"><i class="fas fa-trash-alt"></i></td>
                              <td class="text-center"><?php echo $i; ?></td>
                              <td><?php echo $obj_views['name']; ?> </td>
                              <td><?php echo $obj_views['description']; ?></td>
                              <td><?php echo $obj_views['keywords']; ?> </td>
                              <td><img src="upload/<?php echo !empty($obj_views['product_photo']) ? $obj_views['product_photo'] : 'placeholder.jpg' ;?>" alt=""></td>

                              <td><img src="upload/<?php echo !empty($obj_views['product_photo_th_01']) ? $obj_views['product_photo_th_01'] : 'placeholder.jpg' ;?>" alt=""></td>

                              <td><img src="upload/<?php echo !empty($obj_views['product_photo_th_02']) ? $obj_views['product_photo_th_02'] : 'placeholder.jpg' ;?>" alt=""></td>
                              <td><img src="upload/<?php echo !empty($obj_views['product_photo_th_03']) ? $obj_views['product_photo_th_03'] : 'placeholder.jpg' ;?>" alt=""></td>
                              <td><img src="upload/<?php echo !empty($obj_views['product_photo_th_04']) ? $obj_views['product_photo_th_04'] : 'placeholder.jpg' ;?>" alt=""></td>
                              <td><img src="upload/<?php echo !empty($obj_views['product_photo_th_05']) ? $obj_views['product_photo_th_05'] : 'placeholder.jpg' ;?>" alt=""></td>
                              <?php
                                $youtube_video = str_replace('watch?v=','embed/',$$obj_views['youtube_video']);
                                 if (preg_match('/embed/',$$obj_views['youtube_video']) === 1) {
                                   $youtube_video = $$obj_views['youtube_video'];
                                 }
                                ?>
                              <td><iframe width="100" height="100" src="<?php echo $youtube_video; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe></td>
                           </tr>
                           <?php 
                          $i++;
                          }
                           
                         } 

                      }
                       ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th class="text-center">Actions</th>
                      <th class="text-center">S.no.</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Keywords</th>
                      <th>Product Photo</th>
                      <th>Thumbnail Photo 01</th>
                      <th>Thumbnail Photo 02</th>
                      <th>Thumbnail Photo 03</th>
                      <th>Thumbnail Photo 04</th>
                      <th>Thumbnail Photo 05</th>
                      <th>Video</th>
                    </tr>
                    </tfoot>
                  </table>  
                </div>
                
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
      var $this = $(this);
      var html = '';
      var form_data = new FormData();
      form_data.append('category_id', $this.val());
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
        if ($('#category_data').val() == '') {
          html+='<option value="">Select Sub Category</option>';
          $('#sub_category_data').html(html);
        }else{
          $('#sub_category_data').html(response);          
        }
      });
      
    });
  });
</script>