<?php 

class ComentsController
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

        $comment = $_POST['comment'];
		$id_img = $_POST['id_img'];
        $timess =   date("d/m/Y");

        echo $comment;
        echo $id_img;

        $data = $connect->prepare("INSERT INTO comment (comment, id_img , timess) VALUES (?, ?, ?)");
        $data->execute([$comment,$id_img,$timess]);
        
        $myHome=GLOBAL_NAME_SERVER;
        $stringHome='http://'.$myHome.'/public/Home';
        header('Location: '.$stringHome);
	}

}