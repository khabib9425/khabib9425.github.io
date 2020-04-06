<?php
	$my_mail = @mysqli_connect('mail.loc', 'root', '', 'mymail') or die('Ошибка в базе данных - '. mysqli_connect_error());
	mysqli_set_charset($my_mail, "utf8") or die('Кодировка не устанавливается!');
?>