<?php

	if (countBankAccount() === true)
	{
?>
		<form method='POST' action='traitement.php'> 
			<p><label for="nameBankAccount">Nom de compte :</label></p>
			<p><input type="text" name="nameBankAccount" id="nameBankAccount"></p>
			<p><label for="typeAccount">Type de compte :</label></p>
			<p><select name="typeAccount" id="typeAccount"></p>
				<option value='epargne'>Epargne</option>
				<option value='courant'>Courant</option>
				<option value='compte_joint'>Compte joint</option>
			</select>
			<p><label for="provision">Solde : </label></p>
			<p><input type="number" name="provision" id="provision"></p>
			<p><label for="currency">Devise :</label></p>
			<p><select name='currency' id="currency"></p>
				<option value='USD'>USD</option>
				<option value='EUR'>EUR</option>
			</select>
			<p><input type="submit" name="submitFormAccount" value="Valider"></p>
		</form>
<?php
	}
	else 
	{
		echo '<p> VOUS AVEZ TROP DE COMPTES, VEUILLEZ EN SUPRR OU MODIF</p>';
	}
?>

		

<?php
/*
	if (countBankAccount() === true)
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

		echo '<p> vious avez déja 10 compte (limite) payer le compte premium pour avoir plus de compte <href src="payant.html"></p>';
	}
*/
?>
<?php

if(isset($_GET['msg']))
{
	echo htmlspecialchars($_GET['msg']);
}
?>

