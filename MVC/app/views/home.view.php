<?php  

      $LocalUser = DBUSER;
      $LocalPassword = DBPASS;
      $LocalName = DBNAME;
      $connect = new PDO("mysql:host=localhost;dbname=".$LocalName,$LocalUser,$LocalPassword);
	    if (!$connect){
		    die('Ошибка подключения к БД');
	    }
      $data =$connect->query("SELECT * FROM `photos`");
      $result =$data->fetchAll(PDO::FETCH_ASSOC);
      $number_card = 1; 
      
      $commentArraySQL =$connect->query("SELECT * FROM `comment`");
      $commentArray =$commentArraySQL->fetchAll(PDO::FETCH_ASSOC);

      $myHome=GLOBAL_NAME_SERVER;
      $stringHome='http://'.$myHome.'/public/Home';
      
      echo 'логин: '.$_SESSION['user'];
      echo 'pasword: '.$_SESSION['pasword'];
 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Jumbotron example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/jumbotron/">

    

    <!-- Bootstrap core CSS -->
    <link href="/public/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body> 
<main>
  


  <div class="container py-4">
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul  class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li style="display:none"><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li style="display:none"><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li style="display:none"><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li style="display:none"><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li style="display:none"><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input style="display:none" type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-warning" onclick="window.location.href = 'Home2';">Выход</button>
        </div>
      </div>
    </div>
  </header>
    <div class="row align-items-md-stretch">
      <div class="col-md-12">
        <div class="h-100 p-5  rounded-3">
          <form action="Imgcont" method="POST" enctype="multipart/form-data">
            <h2>Загрузка фото</h2>
            <input type="file" name="file" multiple accept="image/*,image/jpeg" >>
            <input type="submit" value="загрузить">
          </form>
        </div>
      </div>
      <!--мой foreach-->
      <?php foreach ($result as $value):?> 
      
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h2><?php echo "Card ".$number_card?></h2>
          <!--картинка с базы-->
          <img src="<?php echo '../../public/imgs/'.$value['path'] ?>" alt="ups">
          <h4>Coments</h4>
          <?php $count = $value['id']?>
          <?php foreach ($commentArray as $value2):
          if ($value2['id_img'] == $count){
            echo '<h5>'.$value2['timess'].'</h5>';
            echo '<p>'.$value2['comment'].'</p>';?>
            <!--удаление комента-->
          <?php  echo '<a href=http://'.GLOBAL_NAME_SERVER.'/public/DelitComent?id='.$value2['id'].'&comment='.$value2['comment']?>>удалить комент</a>
          <?php
          }else{
            //false
          }  
          ?> 

          <?php endforeach; ?>
          <!--Форма для комента-->
          <form action="ComentsController" method="POST">
          <input  type="text" class="form-control" name="comment" id="comment" placeholder="text" required >
          <input  type="text" class="form-control" name="id_img" id="id_img" placeholder="id_img" value="<?php echo $value['id'] ?>" style="display:none">  
          <button class="btn btn-outline-light" type="submit">Оставить комент</button>
          </form>
          <!--удаление всего файла-->
          <a href="<?php echo 'http://'.GLOBAL_NAME_SERVER.'/public/DelitFile?id='.$value['id'] ?>"> удалить картачку</a>
        </div>
      </div>
      <?php $number_card = $number_card + 1; ?> 
      <?php endforeach; ?>
    </div>
    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2021
    </footer>
  </div>
</main>

  </body>
</html>
