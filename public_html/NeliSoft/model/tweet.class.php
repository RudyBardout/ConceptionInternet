<?php

class tweet extends basemodel
{

	public static function getPost(){
		return $this->data['post'];
	}

	public static function getParent(){
		return $this->data['parent'];
	} 

	public static function getLikes(){
		return $this->$data['nbvotes'];
	}

}


?>