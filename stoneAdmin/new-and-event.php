<?php 
$page = 'news&event';
require_once 'header.php'; 
require_once 'common_function.php';
$obj = new Ecommerce();
if(isset($_REQUEST['add_news'])){
  $data = array(
    'news'=>$_POST['news'],
  );
  $obj->NewandEvent($data);
}
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $obj->DeleteDataById($delete_id);
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
                    <textarea name="news" class="summernote news-and-event">
                    </textarea>
                  </div>
                  <button type="submit" class="btn btn-primary" name="add_news">Submit</button>
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
                    <th>News and Event</th>
                    <th class="text-center">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $obj_view = $obj->GetNewsandEvent();
                    $i=1;
                    if (!empty($obj_view)) {
                      foreach ($obj_view as $key => $obj_views) {
                        if ($obj_views['status'] != 0) {
                         ?>
                         <tr>
                           <td class="text-center"><?php echo $i; ?></td>
                           <td><?php echo $obj_views['news']; ?> </td>
                           <td class="text-center actions"><a href="news_edit.php?id=<?php echo $obj_views['id']; ?>" class="text-primary"><i class="fas fa-pen-square"></i></a><a href="?delete=<?php echo $obj_views['id']; ?>" class="text-danger"><i class="fas fa-trash-alt"></i></td>
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
                    <th>News and Event</th>
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