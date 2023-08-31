<?php 

class RegistrMove
{
	use Controller;

	public function index()
	{

		$LocalUser = DBUSER;
		$LocalPassword = DBPASS;
        $LocalName = DBNAME;
        $connect = mysqli_connect('localhost', $LocalUser, $LocalPassword, $LocalName);
        if (!$connect){
            die('Ошибка подключения к БД');
        }

        $username = $_POST['username'];
		$pawwrord = $_POST['pawwrord'];
		$text = 'password';

		$_SESSION['user'] = $username;
		$_SESSION['pasword'] = $pawwrord;
        

        $data = $connect->prepare("INSERT INTO user2 (username, $text) VALUES (?, ?)");
        $data->execute([$username,$pawwrord]);

        $myHome=GLOBAL_NAME_SERVER;
        $stringHome='http://'.$myHome.'/public/Home';
        header('Location: '.$stringHome);
	}

}