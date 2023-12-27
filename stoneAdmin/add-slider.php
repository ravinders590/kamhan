<?php 
$page = 'slider';
require_once 'header.php'; 
require_once 'common_function.php';
$obj = new Ecommerce();
if(isset($_REQUEST['slider'])){
  $slider_photo = $_FILES['slider_photo']['name'];
  $slider_photo = pathinfo($slider_photo)['filename'] .'_'. time() .'.'. pathinfo($slider_photo)['extension'];
  $data = array(
    'name' => $_POST['name'], 
    'keywords'=>$_POST['keywords'],
    'slider_photo' => $slider_photo,
  );
  $obj->SliderData($data);
}
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $obj->DeleteSliderDataById($delete_id);
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
                <div class="form-group">
                  <input type="text" placeholder="Slider Name" class="form-control" name="name">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="SEO Slider Keywords" class="form-control" name="keywords">
                </div>
                <div class="form-group">
                  <label for="main">Category Image</label>
                  <input type="file" id="main" name="slider_photo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="slider">Submit</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
      <div class="col-md-12">
        <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table class="datatable-set table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">S.no.</th>
                    <th>Name</th>
                    <th>Keywords</th>
                    <th>Photo</th>
                    <th class="text-center">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $obj_view = $obj->GetSlider();
                    $i=1;
                    if (!empty($obj_view)) {
                      foreach ($obj_view as $key => $obj_views) {
                        if ($obj_views['status'] != 0) {
                         ?>
                         <tr>
                           <td class="text-center"><?php echo $i; ?></td>
                           <td><?php echo $obj_views['name']; ?> </td>
                           <td><?php echo $obj_views['keywords']; ?> </td>
                           <td><img src="upload/<?php echo $obj_views['slider_photo']; ?> " alt=""></td>
                           <td class="text-center actions"><a href="edit-slider.php?id=<?php echo $obj_views['id']; ?>" class="text-primary"><i class="fas fa-pen-square"></i></a><a href="?delete=<?php echo $obj_views['id']; ?>" class="text-danger"><i class="fas fa-trash-alt"></i></td>
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
                    <th class="text-center">S.no.</th>
                    <th>Name</th>
                    <th>Keywords</th>
                    <th>Photo</th>
                    <th class="text-center">Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>

  
<?php require_once 'footer.php'; ?>