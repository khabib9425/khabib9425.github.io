<?php
error_reporting(-1);

//Registration
function clear(){
	global $my_mail;
	foreach($_POST as $key => $value){
		$_POST[$key] = htmlspecialchars(mysqli_real_escape_string($my_mail,$value));
	}
}
function save_mass(){
	global $my_mail;
	clear();
	extract($_POST);
	$regEmail = $regEmail."@jizpi-mail.uz";
	$regPass = md5($regPass."fdkjsdkfjlks5555454548");
	$retypeRegPass = md5($retypeRegPass."fdkjsdkfjlks5555454548");
	$query = "INSERT INTO `registration` (name, secname, day, month, year, gender, email, password, repassword, terms) VALUES('$regName', '$regSecondName','$regDay','$regMonth','$regYear','$gender','$regEmail','$regPass','$retypeRegPass','$terms')";
	mysqli_query($my_mail,$query);
}
//Login

function save_mass2(){
	global $my_mail;
	clear();
	extract($_POST);
	$logPass = md5($logPass."fdkjsdkfjlks5555454548");
	$result =  mysqli_query($my_mail ,"SELECT `email`, `password` FROM `registration` WHERE `email` = '$login' AND `password` = '$logPass' ORDER BY id DESC");
	$user = mysqli_fetch_assoc($result);
	if(count($user) == 0){
		return "Такой пользователь не найден!";
		exit;
	}else{
		setcookie('user', $user['email'], time() + 3600, "/");
		header("Location: /");
	}
}

//sendMail
function save_mass3(){
	global $my_mail;
	clear();
	extract($_POST);
	$query2 = "INSERT INTO `sendmail` (`sender`,`theme`,`sendText`) VALUES('$senderComp','$themeComp','$textComp')";
	mysqli_query($my_mail,$query2);
}
?>