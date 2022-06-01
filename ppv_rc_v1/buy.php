<?php
require_once('szopchat_api.php');
$id = admin::$id;
$code = admin::$code;

if (!empty($_POST))
{  

  


 	
if ( empty($_POST['pass']) or empty($_POST['pass2']) or empty($_POST['email']) )
{die('Uzupełnij wszystkie pola.'); }
	
	
	$pass = md5($_POST['pass']);
	$pass2 = md5($_POST['pass2']);
	$email = $_POST['email'];
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$nazwa = szopchat::polskie_znaki($imie).' '.szopchat::polskie_znaki($nazwisko);
	$id_trans = $_POST['id_trans'];
	 $query_event = mysqli_query($GLOBALS['consql'],"SELECT * FROM ".sql::$event." WHERE id ='".$id_trans."'");
  $output_event = mysqli_fetch_assoc($query_event);
	$status = '0';
	$crc = szopchat::encode($output_event['link'],$pass);
	$kwota = $output_event['kwota'];
$md5sum = md5($id . $kwota . base64_encode($crc) . $code);
$opis = $email;

$spremail1 = "SELECT email, id_trans, paylink FROM ". sql::$trans ." WHERE email = '".$email."' AND id_trans = '".$id_trans."'";
$spremail = mysqli_query($GLOBALS['consql'],$spremail1);
$spremailsql = mysqli_fetch_assoc($spremail);
	if($spremailsql['email'] == $email)
	{echo 'Ten email został już zarejestrowany<p><a href="'.$spremailsql['paylink'].'">Zapłać za dostęp</a><br><a href="login.php?login='.$spremailsql['id_trans'].'">Zaloguj do transmisji</a>'; exit;


		}
	if($pass != $pass2 and $email != $email2){
	echo 'Hasło lub email są różne.'; panel::buy();exit;}
		if (strlen($_POST['pass'])<= 5){
		echo 'Hasło musi składać się z minimum 6 znaków.    '; panel::buy();exit;}

$paylink = "https://secure.tpay.com?id=30149&kwota=".$kwota."&opis=".$opis."&md5sum=".$md5sum."&online=1&email=".$email."&nazwisko=".$nazwa."&crc=".base64_encode($crc)."&pow_url=".connect::$url."/index.php?login=".$id_trans."";
$query = "INSERT INTO ". sql::$trans ." (id , id_trans , email , pass , status , kwota , crc, paylink ) VALUES ('', '".$id_trans."', '".$email."', '".$pass."', '".$status."', '".$kwota."', '".$crc."', '".$paylink."')";
	
	
	if(mysqli_query($GLOBALS['consql'],$query))
		{
	
 header("Refresh: 0; URL=".$paylink."");}	
 	



  }else
   
   
   {
	  
	panel::buy();
}

?>