<?php 

/**
 * home class
 */
class Contacts
{
	use Controller;

	public function index()
	{

		$this->view('contacts');
	}

}
