<?php 

/**
 * home class
 */

class Home
{
	use Controller;
	

	public function index()
	{

		if (!isset($_SESSION['user']) and !isset($_SESSION['pasword'])) {
			return $this->view('home2');  
		  } else {
			return $this->view('home');  
		  }
		    
	}


}
