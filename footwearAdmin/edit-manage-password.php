<?php 
$page = 'manage_password';
require_once 'header.php'; 
require_once 'common_function.php';
$obj = new Ecommerce();
$error = '';
$password_id = $_GET['id'];
if (isset($_POST['manage_password'])) {
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  if (empty($password) || empty($confirm_password)) {
    $error = '<span class="alert-danger p-1 rounded d-block mt-2 w-50">Please All Fields are required!!</span>' ;
  }else{
    if ($password === $confirm_password) {
      $data = array(
        'super_password' => md5($_POST['password'])
      );
      $obj->update_password($data,$password_id);  
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
    </div>
  </div>
</section>

  
<?php require_once 'footer.php'; ?>