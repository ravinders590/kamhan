<?php 
$page = 'sub_category';
require_once 'header.php'; 
require_once 'common_function.php';
$obj = new Ecommerce();
if(isset($_REQUEST['sub_category'])){
  $sub_category_photo = $_FILES['sub_category_photo']['name'];
  $sub_category_photo = pathinfo($sub_category_photo)['filename'] .'_'. time() .'.'. pathinfo($sub_category_photo)['extension'];
  
  $data = array(
    'name' => $_POST['name'], 
    'keywords'=>$_POST['keywords'],
    'cat_id' => $_POST['cat_id'], 
    'sub_category_photo' => $sub_category_photo,
  );

  $obj->SubCategory($data);
}
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $obj->DeleteSubCategoryDataById($delete_id);
}
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sub Category</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Sub Category</li>
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
                  <input type="text" placeholder="Category Name" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <select name="cat_id" id="category_data" class="form-control" required="">
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
                  <input type="text" placeholder="SEO Category Keywords" class="form-control" name="keywords">
                </div>
                <div class="form-group">
                  <label for="main">Sub Category Image</label>
                  <input type="file" id="main" name="sub_category_photo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="sub_category">Submit</button>
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
                    $obj_view = $obj->GetSubCategory();
                    $i=1;
                    if (!empty($obj_view)) {
                      foreach ($obj_view as $key => $obj_views) {
                        if ($obj_views['status'] != 0) {
                         ?>
                         <tr>
                           <td class="text-center"><?php echo $i; ?></td>
                           <td><?php echo $obj_views['name']; ?> </td>
                           <td><?php echo $obj_views['keywords']; ?> </td>
                           <td><img src="upload/<?php echo $obj_views['sub_category_photo']; ?> " alt=""></td>
                           <td class="text-center actions"><a href="edit-sub-category.php?id=<?php echo $obj_views['id']; ?>" class="text-primary"><i class="fas fa-pen-square"></i></a><a href="?delete=<?php echo $obj_views['id']; ?>" class="text-danger"><i class="fas fa-trash-alt"></i></td>
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