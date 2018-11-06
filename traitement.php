<?php
	function verifFormBankAccount()
	{
		$submitFormAccount = htmlentities($_POST['submitFormAccount']);
		$nameBankAccount = htmlentities($_POST['nameBankAccount']);
		$typeAccount = htmlentities($_POST['typeAccount']);
		$provision = htmlentities($_POST['provision']);
		$currency = htmlentities($_POST['currency']);

		$availableType = ['epargne', 'compte_joint', 'courant'];
		$availableCurrency = ['USD', 'EUR'];

		if (isset($submitFormAccount))
		{	
			if (strlen($nameBankAccount) > 50 OR strlen($nameBankAccount) == 0)
			{
				$message = 'Votre nom de compte n\'est pas conforme. Entre 0 et 50 caractères max.';
			}
			else if(!in_array($typeAccount, $availableType)){
				$message = "Choix Impossible, sélectionnez l'un des types proposés";
			}
			else if (!is_numeric($provision)) 
			{
				$message = 'Veuillez renseignez un montant, ex : 500.00';
			}
			else if (!in_array($currency, $availableCurrency))
			{
				$message = "Choix Impossible, sélectionnez l'une des devises proposées";
			}
			else
			{
				$message = "Nom de compte : " . $nameBankAccount . " Type de compte : " . $typeAccount . " Solde : " . $provision . " Devise : " . $currency;
			}
		}

		header('Location: bankAccountForm.php?msg=' . $message);
	}
?>



