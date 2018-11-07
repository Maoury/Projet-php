<?php
	session_start();
//*. INCLUSION DE LA FONCTION DE CONNEXION BDD
	include_once('Functions/fonctions.php'); // permet d'inclure une fonction et de l'executé qu'une seule fois (évite les plantage)
	
	verifFormBankAccount();


//1. FONCTION VERIFICATION DU FORMULAIRE + connexion BDD

	function verifFormBankAccount() 
	// déclaration de variable : On récupère les "names" du formulaire avec $_POST. Ensuite on les re-déclarent pour simplifier leurs notations
	{

		
		$db = db_connect();
// Lorsque que l'on met des crochets lors d'une création de variables on les "transforment" en tableau. les virgules séparent les colonnes
		$availableType = ['epargne', 'compte_joint', 'courant'];
		$availableCurrency = ['USD', 'EUR'];


		if (isset($_POST['submitFormAccount']))// isset verifie si l'information à été envoyé ici à traitement.php
		{	
			$nameBankAccount = htmlentities($_POST['nameBankAccount']);
			$typeAccount = htmlentities($_POST['typeAccount']);
			$provision = htmlentities($_POST['provision']);
			$currency = htmlentities($_POST['currency']);

			if (strlen($nameBankAccount) > 50 OR strlen($nameBankAccount) == 0)
			{
				$message = 'Votre nom de compte n\'est pas conforme. Entre 0 et 50 caractères max.';
			}
			//in_array permet de comparer les valeurs de deux tableaux
			else if(!in_array($typeAccount, $availableType)){
				$message = "Choix Impossible, sélectionnez l'un des types proposés";
			}
			// is_numeric vérifie si le contenu est numérique
			else if (!is_numeric($provision)) 
			{
				$message = 'Veuillez renseignez un montant, ex : 500.00';
			}
			else if (!in_array($currency, $availableCurrency))
			{
				$message = "Choix Impossible, sélectionnez l'une des devises proposées";
			}
			else if(!countBankAccount()){
				$message = "Trop de compte";
			}
			else
			{
				insertIntoBank($nameBankAccount, $typeAccount, $currency, $provision); // INSERE LES DONNEES
				
				$message = "Nom de compte : " . $nameBankAccount . " Type de compte : " . $typeAccount . " Solde : " . $provision . " Devise : " . $currency . ' a été ajouté à votre liste de compte';
			}

			// redirige la variable 'message' sur la page du formulaire, ainsi l'utilisateur voit le message de son erreur et peut éditer le formulaire
			header('Location: index.php?msg=' . $message);

		}
	}
	
?>




