<?php 

class SiginMove
{
	use Controller;

	public function index()
	{

    $arrayUser = new User2;

		$connect = $arrayUser->index2();

		$userName = $_POST['username'];
		$pawwRord = $_POST['pawwrord'];
		

		$sql_zapros = mysqli_query($connect, "SELECT * FROM `user2` WHERE `username`= '$userName' AND `password`= '$pawwRord'");
		//$this->view('home',['$users2' => $users2]);
		$sql_zapros1 = mysqli_fetch_assoc($sql_zapros);

		//Проверка на null данных
        if ( $sql_zapros1 == null ){
			    return $this->view('signin');
		    }else{
          $_SESSION['user'] = $userName;
          $_SESSION['pasword'] = $pawwRord;
			    return $this->view('home');
		}	
	}

}