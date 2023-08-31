<?php 

class Photos
{
	
	public function index(){
    
    $LocalUser = DBUSER;
	
    $LocalPassword = DBPASS;
    
    $LocalName = DBNAME;
	$connect = mysqli_connect('localhost', $LocalUser, $LocalPassword, $LocalName);
	if (!$connect){
		die('Ошибка подключения к БД');
	}
	
    //return $data = $connect->prepare("INSERT INTO `photos` (`path`) VALUES (?)");
    return $connect;
	}

	



}