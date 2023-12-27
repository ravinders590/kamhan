<?php 
$page = 'slider';
require_once 'header.php'; 
require_once 'common_function.php';
$obj = new Ecommerce();
$cat_id = $_GET['id'];
if(isset($_REQUEST['slider'])){
  $slider_photo = $_FILES['slider_photo']['name'];
  $slider_photo = pathinfo($slider_photo)['filename'] .'_'. time() .'.'. pathinfo($slider_photo)['extension'];
  $data = array(
    'name' => $_POST['name'], 
    'keywords'=>$_POST['keywords'],
    'slider_photo' => $slider_photo,
  );
  $obj->update_slider($data,$cat_id);
}
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Slider</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Slider</li>
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
                <?php 
                  $cat_set = $obj->GetSliderDataById($cat_id);
                    if (!empty($cat_set)) {
                      foreach ($cat_set as $key => $slider) {
                   ?>
                <div class="form-group">
                  <input type="text" placeholder="Category Name" class="form-control" name="name" value="<?php echo $slider['name']; ?>">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="SEO Category Keywords" class="form-control" name="keywords" value="<?php echo $slider['keywords']; ?>">
                </div>
                <div class="form-group">
                  <label for="main">Category Image</label>
                  <input type="file" id="main" name="slider_photo" class="form-control" value="<?php echo $slider['slider_photo']; ?>">
                </div>
                <?php }
                } ?>
                <button type="submit" class="btn btn-primary" name="slider">Submit</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
      
    </div>
  </div>
</section>

  
<?php require_once 'footer.php'; ?>