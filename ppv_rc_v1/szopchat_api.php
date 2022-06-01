
<?php 
/*https://www.sitepoint.com/community/t/database-connections-with-oop-php-and-mysqli/38642/3*/

class admin{
static $login = 'ntvkpodhale@gmail.com';	
static $pass = '660c05855130e4a9ff6707959fcabc83';
static $code = 'XusPelI3e1qoNBuj';
static $id = '30149';	
	
}
class connect{
static $url = 'http://212.244.210.208'; // url serwera gdzie skrypt do powrotu z tpay
static $adres = 'localhost'; //adres bazy danych
static $uzytkownik = 'root'; // uzytkownik
static $haslo = ''; //haslo
static $select_db = 'live'; //wybrana baza danych na serwerze
static $server_www = 'http://localhost'; 
}
$consql = mysqli_connect(connect::$adres,connect::$uzytkownik,connect::$haslo,connect::$select_db);

class sql{
//baza danych
static $trans = 'trans'; //tabela uzytkownikow
static $event = 'event'; //znajomi
static $szopchat_messages = 'szopchat_messages'; //tabela wiadomosci
static $method = 'aes-256-cbc';
static $iv = "1234567812345678";


 public static function connect(){
	 
	
	mysqli_query($GLOBALS['consql'],'SET NAMES utf8');
	mysqli_query($GLOBALS['consql'],'SET CHARACTER_SET utf8_unicode_ci');
	mysqli_query($GLOBALS['consql'],'SET collation_connection = utf8_polish_ci');
	}
}
	


class szopchat{
	  public static function polskie_znaki($string) {
    $aWhat = array('ą','ć','ę','ł','ó','ń','ś','ż','ź',' ');
    $aOn = array('a','c','e','l','o','n','s','z','z','-');
    $converted = preg_replace('/[^a-zA-Z0-9-]*/','',str_ireplace($aWhat, $aOn, $string));
    return strtolower($converted);
    }
	

	
	public static function encode($string, $key)
	{
		$encoded = openssl_encrypt($string, sql::$method, $key, false, sql::$iv);
		return $encoded;
	}
	public static function decode($string, $key)
	{
		$decoded = openssl_decrypt($string, sql::$method, $key, false, sql::$iv);
		return $decoded;
	}
	public static function yt_frame($pass,$link)
	{
		
		echo 'https://www.youtube.com/embed/'.$link_decoded;
}}


class panel{

	public static function transtyle($x){
if($x == 0){echo '<html><head>
<style>body{
background-image: url("ppv.jpg");
background-repeat: no-repeat;
background-position: center top;
background-size: cover;
}
table {border: 0px; width: 40%; margin: auto; position: relative; top: 25%; max-height: 30%; overflow-y: scroll;white-space: nowrap;  }

 div {border: 0px; width: 30%; margin: auto; position: relative; top: 25%; max-height: 30%; }
</style>
</head><body>';}}



	
	public static function login(){

		if(isset($_POST)){
		$email = $_POST['email'];
		$pass = md5($_POST['pass']);
			$id_trans = $_GET['login'];}
if (isset($email) && isset($pass)){
	
	
  $query = mysqli_query($GLOBALS['consql'],"SELECT * FROM ".sql::$trans." WHERE email ='".$email."' AND pass ='".$pass."' AND id_trans='".$id_trans."'");
  $output = mysqli_fetch_assoc($query);
   
  if ($email == $output['email'] && $pass == $output['pass']){
	  if($output['status'] =='1'){
    session_start();
	panel::transtyle(1);
    $_SESSION['id'] = $output['crc'];
	$_SESSION['email'] = $email;
		$link_decoded = szopchat::decode($output['crc'],$pass);
		echo '<head><link rel="stylesheet" href="plyr/plyr.css"></head>
		<body oncontextmenu="return false;" >
		
			<div data-type="youtube" data-video-id="'.$link_decoded.'"></div>
			
				<script src="plyr/plyr.js"></script><script>plyr.setup();</script></body>';
		 
		 exit;
	  }else{echo 'Twoja wpłata nie została potwierdzona<p><a href="'.$output['paylink'].'">Zapłać za dostęp</a>'; exit;
;}
  } else{
  $error = "<B>Błędny email lub hasło</B><BR>";}
} else{
		$error = false;}

		
				panel::transtyle(0);
echo '<div style="border: solid 1px; id="adder">
  <B>Podaj email i&nbsp;hasło</B>
  <FORM method="POST" action="'.$_SERVER['PHP_SELF'].'?login='.$_GET['login'].'">
    Email: <INPUT type="text" name="email"><BR>
    Hasło: <INPUT type="password" name="pass"><BR>
    <INPUT class="button" type="submit" value="Zaloguj się">
</form>';


echo '</div><br>';
exit;
}

public static function buy()
 { panel::transtyle(0);
	    echo '<div style="border: solid 1px;" id="adder"><form enctype="multipart/form-data" method="post" > <p>
	 Imię: <INPUT type="text" name="imie"><BR>
    Nazwisko: <INPUT type="text" name="nazwisko"><BR>
	 
	 Email: <INPUT type="text" name="email"><BR>
	 
    Hasło dostępu: <INPUT type="password" name="pass"><BR>
    Powtórz hasło: <INPUT type="password" name="pass2"><BR>
    
	
   <input type="hidden" name="id_trans" value="'.$_GET['id_trans'].'">
	
	<input type="Submit"  class="button" name="submit" id="submit" value="Zapłać">
	
</form></div>';
	 
 }
public static function admin(){
	
	panel::transtyle(1);
	if ($send == 0){echo '<div  class="width"><div style="border: solid 1px;" id="adder"><form enctype="multipart/form-data" method="post" > <p>
	<h2>Dodaj YT ID</h2><input name="link"   size="30" maxlength="50">

	<input type="Submit" class="button" name="submit" id="submit" value="DODAJ!">
	</form>';
	if ($_POST['submit'])
		{ 

			$link = $_POST['link']; 
 

			if (empty($_POST['link'])){
				echo'<h1>uzupełnij wszystkie pola</h1>';}
			else {	
			mysqli_query($GLOBALS['consql'],"INSERT INTO ". sql::$event ." (id , link,kwota) VALUES ('', '".$link."','".$kwota."')");
			echo '<h2>Dodano</h2><p>
				';}	

	

}
	 if (!empty($_POST['del'])){
	foreach($_POST['del'] as $item)
{
    $sql = "delete FROM `szopchat_friends` WHERE `inviter`='".$item."' and `invited`='".$uzytkownik['login']."' or `invited`='".$item."' and `inviter`='".$uzytkownik['login']."'";
	mysqli_query($GLOBALS['consql'],$sql);
	echo $sql;
}
	
	echo '<h2>Usunięto</h2>';
	
    }



echo '<form  method="POST" action="">';}
$query12 = mysqli_query($GLOBALS['consql'],"SELECT * FROM ".sql::$event." '");
echo '<table border="3" ><tr> <td>X</td><td>YT ID</td><td></td></tr>';

while($row = mysqli_fetch_assoc($query12))
{ $pagec += 1;
	echo '<tr> <td><input id="del" name="del[]" type="checkbox" value="';

	echo $row['id']; 
	echo '"></td><td>';
	
	echo $row['link']; 
	echo '</td><td>';
	if($row['inviter'] != $uzytkownik['login'])
	{
		 $query = mysqli_query($GLOBALS['consql'],"SELECT * FROM ".sql::$szopchat_users." WHERE login='".$row['inviter']."'");
  $output = mysqli_fetch_assoc($query);
			echo '<img style="display:block; width:100px;height:100px;" id="base64image"                 
       src="data:image/png;base64,'.szopchat::decode_img($output['avatar'], $output['klucz']).'"/>'; }

	echo '</tr></optnion>';
	
	};
	echo '</table>';
	if ($send == 0){echo '<input type=submit class="button" value=" Usuń " name="de2l"></form>';}

echo '</div></div>';
	
	
exit;
}

}

?>
