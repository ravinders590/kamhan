<?php

include 'db_connection.php';

class Ecommerce extends Databaseconfig{

	
	function common_sql($sql_query){
		return $sql_query;
	}
	public static function RemoveSpecialChar($str){
	    $res = preg_replace('/[0-9\@\.\;\/><:" "]+/',' ', $str);
	    return $res;
	}
    protected function delete_data($table_name,$file_name,$where,$by_slug){
    	$date = date('Y-m-d');
		$is_check_formate = 1;
		if ($is_check_formate == 1) {			
			$sql = "UPDATE `$table_name` SET `status`=0,`delete_date`= '$date' WHERE `$where` = '$by_slug'";
			$result = $this->connect()->query($sql);
	        if ($result) {
	            echo "<script>window.location.href='" . $file_name . "';</script>";
	        }

	        return $result;
		}
    }
    protected function restore_data($table_name,$by_slug,$file_name,$where){
        $date = date('Y-m-d');
        $is_check_formate = 1;
        if ($is_check_formate == 1) {           
            echo $sql = "UPDATE `$table_name` SET `status`=1,`delete_date`= '$date' WHERE `$where` = '$by_slug'";
            $result = $this->connect()->query($sql);
            if ($result) {
                echo "<script>window.location.href='" . $file_name . "';</script>";
            }

            return $result;
        }
    }

    

   
	protected function InsertData($tablename,$data,$file_name){

		$data_key = array_keys($data);	
		$data_key = implode("`,`", $data_key);

		$data_values = array_values($data);	
		$data_values = implode("','", $data_values);

		$insert_sql = $this->common_sql("INSERT INTO `". $tablename ."`(`". $data_key ."`) VALUES ('" . $data_values . "')");	
		$insert_result = $this->connect()->query($insert_sql);
		if ($insert_result) {
			echo "<script>window.location.href='". $file_name ."';</script>"; 				
		}
	}
	protected function UpdateData($tablename,$data=array(),$where = null){
		$args = array();
		foreach ($data as $key => $datas) {
			$args[] = "$key ='$datas'";
		}
		$data_args = implode(', ', $args); 
		$sql = "UPDATE `$tablename` SET " . $data_args;
		if ($where != null) {
			$sql.= " WHERE id = '".$where . "'";
		}
		return $result = $this->connect()->query($sql);
		
	}
	
	protected function InsertDataNew($tablename,$data){

		$data_key = array_keys($data);	
		$data_key = implode("`,`", $data_key);

		$data_values = array_values($data);	
		$data_values = implode("','", $data_values);

		$insert_sql = $this->common_sql("INSERT INTO `". $tablename ."`(`". $data_key ."`) VALUES ('" . $data_values . "')");	
		$insert_result = $this->connect()->query($insert_sql);
		
	}
    
	protected function select_data($table_name) {
        $sql = "SELECT * FROM `$table_name`";
        $result = $this->connect()->query($sql);
        $numrow = $result->num_rows;
        if ($numrow > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
                # code...
            }
            
            return $data;
        }
        
    }
    protected function select_data_by_field($table_name,$field,$field_name) {
        $sql = "SELECT * FROM `$table_name` WHERE `$field` = '$field_name'";
        $result = $this->connect()->query($sql);
        $numrow = $result->num_rows;
        if ($numrow > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
                # code...
            }
            
            return $data;
        }
    }
    protected function SelectDataWhere($table_name,$field_name,$fields) {
        $sql = "SELECT * FROM `$table_name` WHERE `$fields` = '$field_name'";
        $result = $this->connect()->query($sql);
        $numrow = $result->num_rows;
        if ($numrow > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
                # code...
            }
            
            return $data;
        }
    }	
    

	protected function create_slug($string,$table_name){
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
		$sql = $this->common_sql("SELECT `slug` FROM `$table_name` WHERE `slug` LIKE '$slug%'");	
		$result = $this->connect()->query($sql);
		
		$numrow = $result->num_rows;
		if($numrow>0){
			while ($row = $result->fetch_assoc()) {
				$data[]=$row['slug'];	
			}
			
			if(in_array($slug, $data))
		   	{
		   	    $count = 0;
			    while( in_array( ($slug . '-' . ++$count ), $data) );
			    $slug = $slug . '-' . $count;
		   	}
		}
		return $slug;
	}
	
	public function check_file_is_valid($files = array()){
		
		foreach($files as $key => $file) {
			$this->file_upload($file);
		}
		return true;
	}

	public function file_upload($file) {
		if(empty($file['name'])) {
			return false;
		}
		$allowed_ext = array('png','jpeg','jpg','webp','mkv','mp3', 'mp4', 'wma');
		// $name = $file['name'];
		$name = pathinfo($file['name'])['filename'] .'_'. time() .'.'. pathinfo($file['name'])['extension'];
		$ext = pathinfo($name, PATHINFO_EXTENSION);
		if(!empty($file['size']) && $file['error'] == 0 && ($file['size'] <= 26214400) && in_array($ext, $allowed_ext)) {
            if (move_uploaded_file($file['tmp_name'], "upload/" . $name)) {
            	move_uploaded_file($file['tmp_name'], "upload/" . $name);
            	echo "1";
            }else{
            	echo "0";
            }
		}
	}
	
	protected function check_user($table_name, $field_name, $email){
		$is_email_exist = $this->common_sql("SELECT `$field_name`FROM `$table_name` WHERE `$field_name` = '$email'");	
		$result = $this->connect()->query($is_email_exist);
		$numrow = $result->num_rows;
		if($numrow != 0){
			return 1;
		}else{
			return 0;
		}	
	}


	/*
	@param Insert Product
	@param Main Category
	@param Sub Category
	@param News And Event
	*/
	public function AddProduct($data){
		$is_check = $this->check_file_is_valid($_FILES);
		$slug = $this->create_slug($data['name'],'sub_category');
		$slug_data = array('slug'=>$slug);
		$data = array_merge($slug_data,$data);

		if ($is_check == 1) {
			$insert_data = $this->InsertDataNew('products',$data);
			if ($insert_data == NULL) {
				echo "<script>alert('Product Successfully add.')</script>"; 				
			}else{
				echo "<script>alert('Product Not Successfully add.')</script>"; 				
			}
		}
	}
	public function MainCategory($data){
		$is_check = $this->check_file_is_valid($_FILES);
		$slug = $this->create_slug($data['name'],'main_category');
		$slug_data = array('slug'=>$slug);
		$data = array_merge($slug_data,$data);
		if ($is_check == 1) {
			$insert_data = $this->InsertDataNew('main_category',$data);
			if ($insert_data == NULL) {
				echo "<script>alert('Category Successfully add.')</script>"; 				
			}else{
				echo "<script>alert('Category Not Successfully add.')</script>"; 				
			}	
		}
		
	}
	public function SliderData($data){
		$is_check = $this->check_file_is_valid($_FILES);
		if ($is_check == 1) {
			$insert_data = $this->InsertDataNew('slider',$data);
			if ($insert_data == NULL) {
				echo "<script>alert('Slider Successfully add.')</script>"; 				
			}else{
				echo "<script>alert('Slider Not Successfully add.')</script>"; 				
			}	
		}
		
	}
	public function SubCategory($data){
		$is_check = $this->check_file_is_valid($_FILES);
		$slug = $this->create_slug($data['name'],'sub_category');
		$slug_data = array('slug'=>$slug);
		$data = array_merge($slug_data,$data);
		
		if ($is_check == 1) {
			$insert_data = $this->InsertDataNew('sub_category',$data);
			if ($insert_data == NULL) {
				echo "<script>alert('Sub Category Successfully add.')</script>"; 				
			}else{
				echo "<script>alert('Sub Category Not Successfully add.')</script>"; 				
			}	
		}
		
	}
	public function NewandEvent($data){
		$insert_data = $this->InsertDataNew('news_and_event',$data);
		if ($insert_data == NULL) {
			echo "<script>alert('News and Event Successfully add.')</script>";
		}else{
			echo "<script>alert('News and Event Not Successfully add.')</script>";
		}
	}
	/*end*/

	
	public function NewandEventUpdate($data){
		$news = $data['news'];
		$id = $data['id'];
		$date = date('d/m/y');
		$sql = "UPDATE `news_and_event` SET `news`='$news',`update_date`='$date' WHERE `id` = '$id'";
		$result = $this->connect()->query($sql);
		if ($result == true) {
			echo "<script>window.location.href='new-and-event.php'</script>";
		}else{
			echo "<script>alert('News and Event Successfully not Update.')</script>";
		}
	}
	public function GetDataById($id){
		return $this->select_data_by_field('news_and_event','id',$id);
	}
	
	public function GetSubCategoryData($id){
    	return $this->SelectDataWhere('sub_category',$id,'cat_id');
    }

	public function GetMainCategoryName($p_id){
		$sql = "SELECT * FROM `main_category` WHERE id = '$p_id'";
		$result = $this->connect()->query($sql);
		return $result;
	}

	protected function GetDataIdBySlug($tableName,$slug){
		$sql ="SELECT `id` FROM `$tableName` WHERE `slug` = '$slug'";
		$result = $this->connect()->query($sql);
        $numrow = $result->num_rows;
        if ($numrow > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
                # code...
            }
            
            return $data;
        }

	}
	public function GetMainCategoryId($slug){
		return $this->GetDataIdBySlug('main_category',$slug);
	}
	public function GetSubCategoryId($slug){
		return $this->GetDataIdBySlug('sub_category',$slug);
	}

	public function GetMaintoSubCategory(){
		$sql ="SELECT * FROM `main_category` cat INNER JOIN `sub_category` scat ON cat.id = scat.cat_id";
		$result = $this->connect()->query($sql);
		$numrow = $result->num_rows;
        if ($numrow > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
                # code...
            }
            
            return $data;
        }
	}
	

	/*
	@param Get News and Event
	@param Get Products
	@param Get Sub Category
	@param Get Main Category
	@param Get Admin Details

	*/
	public function GetNewsandEvent(){
		return $this->select_data('news_and_event');
	}
	public function GetProducts(){
		return $this->select_data('products');
	}
	public function GetMainCategory(){
		return $this->select_data('main_category');
	}
	public function GetSubCategory(){
		return $this->select_data('sub_category');
	}
	public function GetAdminDetails(){
		return $this->select_data('dpr_machine_admin');
	}
	public function GetSlider(){
		return $this->select_data('slider');
	}

	/*
	@param Get Products Data By Id
	@param Get Main Category Data By Id
	@param Get Sub Category Data By Id
	@param Get Slider Data By Id

	*/
	public function GetProductsDataById($id){
		return $this->select_data_by_field('products','id',$id);
	}
	public function GetMainCategoryDataById($id){
		return $this->select_data_by_field('main_category','id',$id);
	}
	public function GetSubCategoryDataById($id){
		return $this->select_data_by_field('sub_category','id',$id);
	}
	public function GetSliderDataById($id){
		return $this->select_data_by_field('slider','id',$id);
	}

	/*
	@param Update Products
	@param Update Password
	@param Update Category

	*/

	public function update_data($data,$id){
		$is_check = $this->check_file_is_valid($_FILES);
		$slug = $this->create_slug($data['name'],'products');
		$slug_data = array('slug'=>$slug);
		$data = array_merge($slug_data,$data);
		$result = $this->UpdateData('products',$data,$id);
		if ($result == true) {
			echo "<script>window.location.href='add-products.php'</script>";
		}else{
			echo "<script>alert('Products Successfully not Update.')</script>";
		}
	}
	public function update_password($data,$userId){
		$result = $this->UpdateData('dpr_machine_admin',$data,$userId);
		if ($result == true) {
			echo "<script>window.location.href='manage-password.php'</script>";
		}else{
			echo "<script>alert('Password Successfully not Update.')</script>";
		}
	}

	public function update_category($data,$cat_id){
		$is_check = $this->check_file_is_valid($_FILES);
		$result = $this->UpdateData('main_category',$data,$cat_id);
		if ($is_check == 1) {
			if ($result == true) {
				echo "<script>window.location.href='main-category.php'</script>";
			}else{
				echo "<script>alert('Category Successfully not Update.')</script>";
			}	
		}else{
			echo "<script>alert('Category Photo Successfully not Update.')</script>";
		}
		
	}
	public function update_sub_category($data,$cat_id){

		$is_check = $this->check_file_is_valid($_FILES);
		$result = $this->UpdateData('sub_category',$data,$cat_id);
		if ($is_check == 1) {
			if ($result == true) {
				echo "<script>window.location.href='sub-category.php'</script>";
			}else{
				echo "<script>alert('Sub Category Successfully not Update.')</script>";
			}	
		}else{
			echo "<script>alert('Sub Category Photo Successfully not Update.')</script>";
		}
		
	}

	public function update_slider($data,$id){

		$is_check = $this->check_file_is_valid($_FILES);
		$result = $this->UpdateData('slider',$data,$id);
		if ($is_check == 1) {
			if ($result == true) {
				echo "<script>window.location.href='add-slider.php'</script>";
			}else{
				echo "<script>alert('Slider Successfully not Update.')</script>";
			}	
		}else{
			echo "<script>alert('Slider Photo Successfully not Update.')</script>";
		}
		
	}

	/*
	
	@param Delete News and Event Data
	@param Delete Product Data
	@param Delete Category Data
	@param Delete Sub Category Data
	@param Delete Slider Data

	*/

	public function DeleteDataById($id){
		return $this->delete_data('news_and_event','new-and-event.php','id',$id);
	}
	public function DeleteProductDataById($id){
		return $this->delete_data('products','add-products.php','id',$id);
	}
	public function DeleteCategoryDataById($id){
		return $this->delete_data('main_category','main-category.php','id',$id);
	}
	public function DeleteSubCategoryDataById($id){
		return $this->delete_data('sub_category','sub-category.php','id',$id);
	}
	public function DeleteSliderDataById($id){
		return $this->delete_data('slider','sub-category.php','id',$id);
	}

}