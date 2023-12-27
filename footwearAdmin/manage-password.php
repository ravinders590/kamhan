<?php 
$page = 'manage_password';
require_once 'header.php'; 
require_once 'common_function.php';
$obj = new Ecommerce();
$error = '';
if (isset($_POST['manage_password'])) {
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  if (empty($password) || empty($confirm_password)) {
    $error = '<span class="alert-danger p-1 rounded d-block mt-2 w-50">Please All Fields are required!!</span>' ;
  }else{
    if ($password === $confirm_password) {
      $userId = $_SESSION['userData']['id'];
      $data = array(
        'super_password' => md5($_POST['password'])
      );
      $obj->update_password($data,$userId);  
    }else{
      $error = '<span class="alert-danger p-1 rounded d-block mt-2 w-50">Password not match!! Please Try Again!</span>' ;
    }  
  }
  
  
}
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Manage Password</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Manage Password</li>
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
                <form action="" method="post">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <input type="password" placeholder="Password" class="form-control" name="password">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Confirm Password" class="form-control" name="confirm_password">
                </div>
                <button type="submit" name="manage_password" class="btn btn-primary">Submit</button>
                <?php echo $error; ?>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
      <?php 
      if ($_SESSION['userData']['type'] == 'Super Admin') {
        ?>
        <div class="col-md-12">
        <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table class="datatable-set table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">S.no.</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th class="text-center">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $obj_view = $obj->GetAdminDetails();
                    $i=1;
                    if (!empty($obj_view)) {
                      foreach ($obj_view as $key => $obj_views) {
                        if ($obj_views['status'] != 0) {
                         ?>
                         <tr>
                           <td class="text-center"><?php echo $i; ?></td>
                           <td><?php echo $obj_views['super_admin']; ?> </td>
                           <td><?php echo $obj_views['super_password']; ?> </td>
                           <td class="text-center actions"><a href="edit-manage-password.php?id=<?php echo $obj_views['id']; ?>" class="text-primary"><i class="fas fa-pen-square"></i></a><a href="?delete=<?php echo $obj_views['id']; ?>" class="text-danger"><i class="fas fa-trash-alt"></i></td>
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
                    <th>Username</th>
                    <th>Password</th>
                    <th class="text-center">Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
        </div>
      </div>
        <?php  
      }
       ?>
      
    </div>
  </div>
</section>

  
<?php require_once 'footer.php'; ?>