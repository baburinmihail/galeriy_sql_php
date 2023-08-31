<?php 


class Exitt
{
	use Controller;

	public function index()
	{
		session_start();
		unset($_SESSION['user']);
		unset($_SESSION['pasword']);

		$myHome=GLOBAL_NAME_SERVER;
        $stringHome='http://'.$myHome.'/public/Home2';
        header('Location: '.$stringHome);
	}

}