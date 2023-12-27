<?php 
$page = 'category';
require_once 'header.php'; 
require_once 'common_function.php';
$cat_id = $_GET['id'];
$obj = new Ecommerce();
if(isset($_REQUEST['main_category'])){
  $cat_photo = $_FILES['category_photo']['name'];
  if ((pathinfo($cat_photo, PATHINFO_EXTENSION) =="" ) && (pathinfo($cat_photo)['filename']) =="" ) {
    $temp = '';  
    $cat_photo = $_POST['category_hidden_photo'];
  }else{
    $temp = '_' . time() . '.';
    $cat_photo = pathinfo($cat_photo)['filename'] .'_'. time() .'.'. pathinfo($cat_photo)['extension'];
  }
  
  $data = array(
    'name' => $_POST['name'], 
    'keywords'=>$_POST['keywords'],
    'category_photo' => $cat_photo,
  );
  $obj->update_category($data,$cat_id);
}
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Main Category</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Main Category</li>
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
                  <?php 
                  $cat_set = $obj->GetMainCategoryDataById($cat_id);
                    if (!empty($cat_set)) {
                      foreach ($cat_set as $key => $category) {
                   ?>
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <input type="text" placeholder="Category Name" class="form-control" name="name" value="<?php echo $category['name']; ?>">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="SEO Category Keywords" class="form-control" name="keywords" value="<?php echo $category['keywords']; ?>">
                </div>
                <div class="form-group">
                  <label for="main">Category Image</label>
                  <input type="file" id="main" name="category_photo" class="form-control" <?php echo $category['category_photo']; ?>>
                  <input type="hidden" name="category_hidden_photo" value="<?php echo $category['category_photo'];?>">
                  <div class="show_image">
                      <img src="upload/<?php echo !empty($category['category_photo']) ? $category['category_photo'] : 'placeholder.jpg' ;?>" alt="">
                    </div>
                </div>
                <?php 
                  }
                }
                 ?>
                <button type="submit" class="btn btn-primary" name="main_category">Submit</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
      
    </div>
  </div>
</section>

  
<?php require_once 'footer.php'; ?>