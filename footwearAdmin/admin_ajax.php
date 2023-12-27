<?php 

$action = $_POST['action'];
switch ($action) {
	case 'category':
		$id = $_POST['category_id'];
		require_once 'common_function.php';
		$obj = new Ecommerce();
		$option = $obj->GetSubCategoryData($id);
		if(is_array($option) || is_object($option)){
			$html = '<option value="">Select Sub Category</option>';
			foreach ($option as $key => $options) {
				$html.='<option value="' . $options['id'] . '">' . $options['name'] . '</option>';
			}
			echo $html;
		}
		
		break;
	
	default:
		// code...
		break;
}

?>