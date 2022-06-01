<?php
require_once('szopchat_api.php');
if(isset($_GET['login']))
{
	panel::login();
	exit;
}

?>