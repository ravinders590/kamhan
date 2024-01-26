<?php
ini_set('display_errors',0);
$page = 'view_products';
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
    'name' => $_POST['name'],
    'description' => $description,
    'productmaterial' => $productmaterial,
    'keywords' => $_POST['keywords'],
    'category' => $_POST['category'],
    'sub_category' => $_POST['sub_category'],
    'new_arrivals' => $_POST['new_arrivals'],
    'type' => $_POST['type'],
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
        <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">

                  <table class="datatable-set table table-bordered table-striped">
                    <thead>

                    <tr>

                      <th class="text-center">Actions</th>
                      <th>Name</th>
                      <th>Product Photo</th>
                      <th>Video</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $obj_view = $obj->GetProducts();
                      
                      if (!empty($obj_view)) {
                        foreach ($obj_view as $key => $obj_views) {
                          if ($obj_views['status'] != 0) {

                           ?>
                           <tr>
                              <td class="text-center actions"><a href="edit-products.php?id=<?php echo $obj_views['id']; ?>" class="text-primary"><i class="fas fa-pen-square"></i></a><a href="?delete=<?php echo $obj_views['id']; ?>" class="text-danger"><i class="fas fa-trash-alt"></i></td>
                              <td><?php echo $obj_views['name']; ?> </td>
                              <td><img src="upload/<?php echo !empty($obj_views['product_photo']) ? $obj_views['product_photo'] : 'placeholder.jpg' ;?>" alt=""></td>
                              <td>
                              <?php
                                $youtube_multi_url = explode(' ',$obj_views['youtube_video']);
                                $youtube_multi_url = array_unique($youtube_multi_url);
                                for ($j=0; $j <= count($youtube_multi_url) ; $j++) { 
                                  $new_youtube_url = str_replace('?rel=0',' ',$youtube_multi_url[$j]); 
                                  if(preg_match('/embed/',$new_youtube_url) === 1){
                                    $new_youtube_url = explode('/',$new_youtube_url);
                                    $new_youtube_url = trim(end($new_youtube_url));
                                    ?>
                                    <iframe width="100" height="100" src="https://www.youtube.com/embed/<?php echo $new_youtube_url; ?>?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                                    <?php
                                  }elseif(preg_match('/watch/',$new_youtube_url) === 1){
                                    $new_youtube_url = explode('?v=',$new_youtube_url);
                                    $new_youtube_url = trim(end($new_youtube_url));
                                    ?>
                                    <iframe width="100" height="100" src="https://www.youtube.com/embed/<?php echo $new_youtube_url; ?>?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                                    <?php
                                  }
                                  
                                }
                                
                                    ?>
                              </td>
                           </tr>
                           <?php 
                          
                          }
                         } 
                         
                      }
                       ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th class="text-center">Actions</th>
                      <th>Name</th>
                      <th>Product Photo</th>
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
<style>
  .pws_tabs_scale_hide.pws_tab_single.pws_tabs_scale_show[data-pws-tab="tab1"] {
    font-family: unset !important;
    position: unset !important;
}
</style>