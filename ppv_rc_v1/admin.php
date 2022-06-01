<?php
	session_start();
require_once('szopchat_api.php');

if (!empty($_POST) or isset($_SESSION['id']))
{  
	if($_POST['logoff'] == 'Wyloguj')
	{session_destroy();header("Refresh:0");}
	if(md5($_POST['pass']) == admin::$pass and $_POST['login'] == admin::$login or $_SESSION['id'] == admin::$pass)
	{
		
    $_SESSION['id'] = admin::$pass;
	
		if (empty($_POST['add'])){
		echo'<h1>Wpisz wartosci</h1>';}
		else {	
		
			$link = $_POST['link'];
			$nazwa = $_POST['nazwa'];
			$kwota = $_POST['kwota'];
			$link_grafika = $_POST['link_grafika'];
			
	mysqli_query($GLOBALS['consql'],"INSERT INTO ". sql::$event ." (id , nazwa, link, kwota, link_grafika) VALUES ('', '$nazwa', '$link', '$kwota', '$link_grafika')");
		echo '<h2>Dodano</h2><p>
		';}	
		
		if (!empty($_POST['del'])){
	
    $sql = 'delete from ' . sql::$event .' where id in ('.implode(",",$_POST['del']).')';
	mysqli_query($GLOBALS['consql'],$sql);
	
	
	
	echo '<h2>Usunięto</h2>';
	
    }
		echo '<form  method="POST" action=""><table border="1">
			<tr>
			<th>X</th>
			<th>id</th>
			<th>nazwa</th>
			<th>link</th>
			<th>kwota</th>
			<th>link do grafiki</th>
			</tr>';
			$result = mysqli_query($GLOBALS['consql'],"SELECT * FROM event");
			while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo '<td><input type="checkbox" name="del[]" value="'.$row['id'].'"></td>';
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['nazwa'] . "</td>";
			echo "<td>" . $row['link'] . "</td>";
			echo "<td>" . $row['kwota'] . "</td>";
			echo "<td>" . $row['link_grafika'] . "</td>";
			echo "</tr>";
		}
		echo '</table><input type=submit class="button" value=" Usuń " name="de2l"></form><table><tr><th>Nazwa</th><th>Link z youtube</th><th>kwota biletu</th><th>link do grafiki</th</tr><tr><form enctype="multipart/form-data" method="post" >
		<td><INPUT type="text" name="nazwa"></td>
		<td><INPUT type="text" name="link"></td>
		<td><INPUT type="text" name="kwota"></td>
		<td><INPUT type="text" name="link_grafika"></td> 
		
		</tr>
		</table><input type="Submit"  class="button" name="add" id="submit" value="Dodaj"><input type="Submit" style="position:absolute;left: 10%;bottom:10%;" class="button" name="logoff" id="submit" value="Wyloguj"></form>';
echo '<div style="position:relative;left:60%;bottom:20%;width:40%;height:40%;"><b>INSTRUKCJA</b><p>
	1. W polu link z youtube należy dodawać ciąg znaków po warunku ?v=, czyli np. gdy mamy link "https://www.youtube.com/watch?v=lIzXds2wI8A"<br>
	dodajemy samą część "lIzXds2wI8A".<p>
	2. W polu kwota wpisujemy liczbową wartość złotych, zamiast przekinka dla groszy używamy KROPKI.<p>
	3. W polu link do grafiki wstawiamy bezpośredni link do grafiki zapowoadającej wydarzenie, link może być z jakiejkolwiek strony internetowej np.
		http://nowytarg24.tv/images/logo24.svg , należy zwracać uwagę czy na początku jest http:// lub https:// . 
	</div>';
	}
else{session_destroy();header("Refresh:0");}

}else

echo '<div  class="width"><div style="border: solid 1px;" id="adder"><form enctype="multipart/form-data" method="post" > <p>
	 Login: <INPUT type="text" name="login"><BR>
    Hasło: <INPUT type="password" name="pass"><BR>
    
	

	
	<input type="Submit"  class="button" name="submit" id="submit" value="Zaloguj">
	
</form></div></div>';


?>