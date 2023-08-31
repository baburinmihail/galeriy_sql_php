<?php 

class User2
{
	
	public function index2(){
	
	$LocalUser = DBUSER;
	
    $LocalPassword = DBPASS;
    
    $LocalName = DBNAME;
	//$connect = mysqli_connect('localhost', 'adm_pt', '1qaz!QAZ', 'u119149_larabazadb2');
	$connect = mysqli_connect('localhost', $LocalUser, $LocalPassword, $LocalName);
	if (!$connect){
		die('Ошибка подключения к БД');
	}
	//sql запрос на получения данных из таблицы с автомобилями
	//$sql_avto = mysqli_query($connect, "SELECT * FROM `user2`");
	//$avto_array = mysqli_fetch_assoc($sql_avto);
	
	return $connect;

	}

	



}