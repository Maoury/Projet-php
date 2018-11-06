<?php
	session_start();

	$_SESSION['idUser'] = 1; // La session est ouveryte par l'uitilsateur 1
?>


<form method='POST' action='traitement.php'> 
	
	<input type="text" name="nameBankAccount">
	<select name="typeAccount">
		<option value='epargne'>Epargne</option>
		<option value='courant'>Courant</option>
		<option value='compte_joint'>Compte joint</option>
	</select>
	<input type="number" name="provision">
	<select name='currency'>
		<option value='USD'>USD</option>
		<option value='EUR'>EUR</option>
	</select>
	<input type="submit" name="submitFormAccount" value="Valider">
</form>


<?php

if(isset($_GET['msg'])){
	echo htmlspecialchars($_GET['msg']);
}

?>