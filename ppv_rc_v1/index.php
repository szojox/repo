<?php

require_once('szopchat_api.php');

// Check IP address and POST parameters
   $ipTable = array('195.149.229.109', '148.251.96.163', '178.32.201.77',
   '46.248.167.59', '46.29.19.106', '10.0.5.1');
 if (in_array($_SERVER['REMOTE_ADDR'], $ipTable) && !empty($_POST) && !isset($_POST['submit'])) {
		$crc = base64_decode($_POST['tr_crc']);

        $sellerID = $_POST['id'];
        $transactionStatus = $_POST['tr_status'];
        $transactionID = $_POST['tr_id'];
        $transactionAmount = $_POST['tr_amount'];
        $paidAmount = $_POST['tr_paid'];
        $error = $_POST['tr_error'];
        $transactionDate = $_POST['tr_date'];
        $transactionDescription = $_POST['tr_desc'];
        
        $customerEmail = $_POST['tr_email'];
        $md5sum = $_POST['md5sum'];

        // check transaction status
        if($transactionStatus=='TRUE' && $error=='none') {
            echo 'TRUE';
			mysqli_query($GLOBALS['consql'],"UPDATE ".sql::$trans." SET status='1'  WHERE crc ='".$crc."'");
			mysqli_query($GLOBALS['consql'],"INSERT INTO errors (id, crc, sellerID, transactionStatus, transactionID, transactionAmount, paidAmount, error, transactionDate, transactionDescription, customerEmail, md5sum) VALUES ('', '".$crc."', '".$sellerID."', '".$transactionStatus."', '".$transactionID."', '".$transactionAmount."', '".$paidAmount."', '".$error."', '".$transactionDate."', '".$transactionDescription."', '".$customerEmail."', '".$md5sum."')");
            exit;
        } else {
           echo 'FALSE';
			mysqli_query($GLOBALS['consql'],"INSERT INTO errors (id, crc, sellerID, transactionStatus, transactionID, transactionAmount, paidAmount, error, transactionDate, transactionDescription, customerEmail, md5sum) VALUES ('', '".$crc."', '".$sellerID."', '".$transactionStatus."', '".$transactionID."', '".$transactionAmount."', '".$paidAmount."', '".$error."', '".$transactionDate."', '".$transactionDescription."', '".$customerEmail."', '".$md5sum."')");
			exit;
        }
   }
panel::transtyle(0);
echo '<table border="1">
			<tr><th></th>
			<th>Nazwa</th>

			<th>   Cena   </th>
			
			</tr>';
			$result = mysqli_query($GLOBALS['consql'],"SELECT * FROM event");
			while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
		
			echo '<td><a href="buy.php?id_trans=' . $row['id'] .'">Kup</a><p><a href="login.php?login=' . $row['id'] .'">Zaloguj</a></td>';
			echo "<td>" . $row['nazwa'] . "</td>";
		
			echo '<td style="white-space: nowrap; ">' . $row['kwota'] . ' zł</td>';
			echo '<td><img style="max-height:100px;" src="' . $row['link_grafika'] . '"></td>';
			echo "</tr>";
		}
		echo '</table>';

   
   
?>