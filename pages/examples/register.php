<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);
require_once 'functions.php';
require_once 'connects.php';


if(!empty($_FILES)){
	/*Array ( [avatar] => Array ( [name] => ava.jpg [type] => image/jpeg [tmp_name] => E:\openServer\OSPanel\userdata\temp\php5A0.tmp [error] => 0 [size] => 234040 ) )*/
	$folderFile = $_POST['regName'];
	$upload_filename = iconv( 'utf-8','cp1251', $folderFile);
	move_uploaded_file($_FILES['avatar']['tmp_name'], "avatar/".$upload_filename.".jpg");
}
if(!empty($_POST)){
	save_mass();
	header("Location: login.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../plugins/mine-css/main.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>JIZPI</b>mail</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Зарегестрировать нового пользователя:</p>

      <form action="" method="POST" enctype="multipart/form-data">
	    <div class="input-group mb-3">
			<div class="avatar">
				<i class="fas fa-user-plus"></i><input type="file" name="avatar">
			</div>
			</div><!----avatar---end--->
        <div class="input-group mb-3">
          <input type="text" name="regName" class="form-control" placeholder="Имя">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
		  
        </div>
		<p><?php 
		  if(isset($_POST['regName'])){
				if(mb_strlen($_POST['regName']) <= 2 || mb_strlen($_POST['regName']) > 50){
					return "Имя должен быть не менше  2 и не больше 50 символов.";
				}
		  }else{
			  echo "Форма имя не отправлена!";
		  }
		  ?></p>
		 <div class="input-group mb-3">
          <input type="text" name="regSecondName" class="form-control" placeholder="Фамилия">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
		  
        </div>
		
		<div class="input-group mb-3">
		<select class='form-control'name="regDay">
          <?php 
			for($i = 1;$i <= 31; $i++){
					echo "<option>$i</option>";
			}
		  ?>
		  </select>
		  <select class='form-control' name="regMonth">
          <?php 
			$month = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь','Июль', 'Август', 'Сентябрь','Октябрь', 'Ноябрь', 'Декабрь'];
			foreach($month as $months){
				echo "<option>$months</option>";
			}
		  ?>
		  </select>
		  <select class='form-control' name="regYear">
          <?php 
			for($i = 1900;$i <= 2020; $i++){
					echo "<option>$i</option>";
			}
		  ?>
		  </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-birthday-cake"></span>
            </div>
          </div>
        </div>
		 <div class="input-group mb-3 style4">
          <div class="radio ">
			  <label class="style1">
				<input type="radio" name="gender" id="optionsRadios1" value="male" checked>
				Мужской
			  </label>
			</div>
			<div class="radio">
			  <label class="style2">
				<input type="radio" name="gender" id="optionsRadios2" value="female">
				Женский
			  </label>
			</div>
          <div class="input-group-append ">
            <div class="input-group-text style3">
              <span class="fas fa-venus-mars"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" name="regEmail" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span>@jizpi-mail.uz</span>
            </div>
          </div></br>
		 
        </div>
		 <p><?php
			if(isset($_POST['regEmail'])){
					if(mb_strlen($_POST['regEmail']) < 8 || mb_strlen($_POST['regEmail']) > 20){
						echo "Пароль должен быть не менше  8 и не больше 20 символов.";
					}
			}else{
				echo "Форма Email не отправлена!";
			}	
			?></p>
        <div class="input-group mb-3">
          <input type="password" name="regPass" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
		  
        </div>
		<p><?php
			
			if(!empty($_POST['regPass'])){
				if(mb_strlen($_POST['regPass']) < 5 || mb_strlen($_POST['regPass']) > 90){
					echo "Email должен быть не менее 5 и не больше 90 символов.";
				} 
			}else{
				echo "Форма пароль не отправлена!";
			}	
			?></p>
        <div class="input-group mb-3">
          <input type="password" name="retypeRegPass" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
				Я согласен <a href="#" id="myBtn">условиями</a>
              </label>
			  
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" name="regBtn" class="btn btn-primary btn-block">Регистрация</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="login.php" class="text-center">Я уже зарегистрирован.</a>
    </div>
    <!-- /.form-box -->
	<div id="mypopup" class="popup">
					<div class="popup-content">
						<div class="popup-header">
							<h2>Джизакский Политехнический институт</h2>
							<span class="popup-close">&times;</span>
						</div><!----popup-header---end-->
						<div class="popup-body">
							<b>Об утверждении Правил оказания услуг почтовой связи.</b></br>
							<b>Вступает в силу с 28 апреля 2011 года</b>
							<p>
							
							В соответствии с Законом Республики Узбекистан "О почтовой связи" (Собрание законодательства Республики Узбекистан, 2009 г., N 17, ст. 209), ПРИКАЗЫВАЮ:

1. Утвердить Правила оказания услуг почтовой связи согласно приложению.

2. Признать утратившими силу:

приказ генерального директора Узбекского агентства связи и информатизации от 3 июня 2003 года N 151 "Об утверждении Правил оказания услуг почтовой связи" (рег. N 1256 от 16 июля 2003 года) (Бюллетень нормативных актов министерств, государственных комитетов и ведомств Республики Узбекистан, 2003 г., N 13-14);

приказ генерального директора Узбекского агентства связи и информатизации от 22 мая 2006 года N 151 "О внесении изменений и дополнений в Правила оказания услуг почтовой связи" (рег. N 1256-1 от 23 июня 2006 года) (Собрание законодательства Республики Узбекистан, 2006 г., N 25-26, ст. 242);

приказ генерального директора Узбекского агентства связи и информатизации от 17 июля 2008 года N 210 "О внесении изменений и дополнений в Правила оказания услуг почтовой связи" (рег. N 1256-2 от 16 августа 2008 года) (Собрание законодательства Республики Узбекистан, 2008 г., N 34, ст. 340).

3. Настоящий приказ вступает в силу по истечении десяти дней со дня его государственной регистрации в Министерстве юстиции Республики Узбекистан.
							
							</p>
						</div><!----popup-body---end-->
						<div class="popup-footer">
							<p>Центр Информационных Технологий 1963 - <?php echo date('Y');?></p>
						</div><!----popup-footer---end-->
					</div><!---popup-content--end--->
			   </div><!----#mypopup---.popup--end--->
  </div><!-- /.card -->
  
</div>

<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/mine-js/main.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
