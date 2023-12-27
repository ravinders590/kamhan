<?php 
session_start();
if (isset($_POST['login_user'])) {
   include 'common_function.php';
   $user_login_name = $_POST['user_login_name'];
   $password = md5($_POST['password']);
   
   $view = new Ecommerce();
   $data = $view->GetAdminDetails();
   
   if (empty($data)) {
      echo "<script>alert('Data Not Available!')</script>";
   }else{
      foreach ($data as $key => $datas) {
         if (($user_login_name === $datas['super_admin']) && ($password === $datas['super_password']) && ($datas['type'] === "admin")) {
            $_SESSION['userData'] = $datas;
            echo "<script>window.location.href='dashboard.php';</script>";
         }else if (($user_login_name === $datas['super_admin']) && ($password === $datas['super_password']) && ($datas['type'] === "Super Admin")) {
            $_SESSION['userData'] = $datas;
            echo "<script>window.location.href='dashboard.php';</script>";
         }
      }   
   }

   echo "<script>window.location.href='index.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
</head>
<body>
   <section class="login-section" style="background-image: url('dist/img/login-bg.jpg');">
   	<div class="container">
   		<div class="row">
   			<div class="col-md-5 m-auto">
   				<form action="" class="form-wrapper" method="post">
   					<div class="outer-logo"><div class="logo">Kamhan</div></div>
   					<div class="form-group">
	   					<input type="text" placeholder="Username" name="user_login_name" class="form-control">   					
   					</div>
   					<div class="form-group">
	   					<input type="password" placeholder="Password" name="password" class="form-control">   	
   					</div>
                  
   					<button type="submit" name="login_user" class="btn btn-primary d-block login-btn">Login</button>
                  
   				</form>
   			</div>
   		</div>
   	</div>
   </section>
</body>
</html>