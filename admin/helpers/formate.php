<?php 

/**
 * formate class
 */
class formate{
	
	public function formateDate($post_date){
		return date('F j, Y, g:i a',strtotime($post_date));
	}

	public function makeShorter($text, $limit = 250){

		$text= $text." ";
		$text= substr($text, 0,$limit);
		$text= substr($text, 0,strrpos($text, ' '));
		$text= $text."...";
		return $text;

	}

	public function validation($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	public function title(){
		$path = $_SERVER['SCRIPT_FILENAME'];
		$title = basename($path,'.php');
		if ($title=='index') {
			$title = '';
		}else if($title == 'contact'){
			$title = 'contact - ';
		}else if($title == 'category_posts'){
			$title = 'category_posts - ';
		}else{
			$title = '';
		}
		$title = str_replace('_', ' ', $title);
		return $title= ucwords($title);
	}

	public function pageName(){
		$path = $_SERVER['SCRIPT_FILENAME'];
		$title = basename($path,'.php');

		return $title;

	}

}


 ?>

 