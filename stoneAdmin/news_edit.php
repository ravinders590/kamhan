<?php require_once 'header.php'; 
require_once 'common_function.php';
$obj = new Ecommerce();
$id = $_GET['id'];
if(isset($_REQUEST['update'])){
  $data = array(
    'news'=>$_POST['news'],
    'id'=>$_GET['id'],
  );
  $obj->NewandEventUpdate($data);
}

?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>News and Event</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">News and Event</li>
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
                  <div class="form-group">
                    <?php 
                    $obj_data = $obj->GetDataById($id);
                    if (!empty($obj_data)) {
                      foreach ($obj_data as $key => $obj_datas){
                        ?>
                      <textarea name="news" class="summernote news-and-event">
                        <?php echo $obj_datas['news'] ?>
                      </textarea>
                      <?php
                      }  
                    }
                    ?>
                  </div>
                  <button type="submit" class="btn btn-primary" name="update">Submit</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </div>
  </div>
</section>


  
<?php require_once 'footer.php'; ?> 