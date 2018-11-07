<?php
	session_start();

	$_SESSION['idUser'] = 1; // La session est ouverte par l'uitilsateur 1

	include_once('traitement.php');
	include_once('connexionBdd.php');
?>

<?php 
	if (countBankAccount() === true)
	{
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
	}
	else 
	{
?>
		<p> vious avez déja 10 compte (limite) payer le compte premium pour avoir plus de compte <href src="payant.html"></p>
<?php
	}
?>
<?php 
/*	if (countBankAccount() === true)
	{
		echo '<form method="POST" action="traitement.php"> 
			
			<input type="text" name="nameBankAccount">
			<select name="typeAccount">
				<option value="epargne">Epargne</option>
				<option value="courant">Courant</option>
				<option value="compte_joint">Compte joint</option>
			</select>
			<input type="number" name="provision">
			<select name="currency">
				<option value="USD">USD</option>
				<option value="EUR">EUR</option>
			</select>
			<input type="submit" name="submitFormAccount" value="Valider">
		</form>';

	}

	else 
	{

		<p> vious avez déja 10 compte (limite) payer le compte premium pour avoir plus de compte <href src="payant.html"></p>
	}

*/
?>
<?php

if(isset($_GET['msg'])){
	echo htmlspecialchars($_GET['msg']);
}
?>

