<?php 

class Imgcont
{
	use Controller;

	public function index()
	{
        $myHome=GLOBAL_NAME_SERVER;
        $stringHome='http://'.$myHome.'/public/Home';
        $LocalUser = DBUSER;
		$LocalPassword = DBPASS;
        $LocalName = DBNAME;

        $connect = mysqli_connect('localhost', $LocalUser, $LocalPassword, $LocalName);
        if (!$connect){
            die('Ошибка подключения к БД');
        }

        $data = $connect->prepare("INSERT INTO `photos` (`path`) VALUES (?)");

        if (!empty($_FILES['file'])){
            $file = $_FILES['file'];

            $name = $file['name'];

            $rest = substr($name, -3);

            $fileSizeServe = MYFILESUZE;

            $myfileSize = $_FILES['file']['size'];

            //$pathFile = __DIR__.'/img/'.$name;
            $pathFile3 = THIS_ITS_A_WAY.$name;
            //echo $file;
            $TypeFile = THIS_TYPE_FiLE;

            //проверка на тип
            if ($rest !== $TypeFile){
                header('Location: '.$stringHome);
            }else{
                //false
            }
            //проверка на размер
            if ($fileSizeServe < $myfileSize){
                header('Location: '.$stringHome);
            }else{
                //false
            }

            if(!move_uploaded_file($file['tmp_name'], $pathFile3)){
                echo 'Файл не смог загрузиться';
            }else{
                
            }
            $data->execute([$name]);

            //echo 'Размер файла ' . $file . ': ' . filesize($file) . ' байтов';

        }else{
            echo 'все не очень';
        }

        header('Location: '.$stringHome);
	}

}