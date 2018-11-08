<?php
//*. INCLUSION DE LA FONCTION DE CONNEXION BDD
	include_once('connexionBdd.php'); // permet d'inclure une fonction et de l'executé qu'une seule fois (évite les plantage)
	
	$nameBankAccount = htmlentities($_POST['nameBankAccount']);
	$typeAccount = htmlentities($_POST['typeAccount']);
	$provision = htmlentities($_POST['provision']);
	$currency = htmlentities($_POST['currency']);
	
	
//2. FONCTION DE COMPTAGE DE PRESENCE DE COMPTE UTILISATEUR INFERIEUR A 10 POUR UN MEME UTILISATEUR + Connexion BDD
	function countBankAccount()
		{   
			$db = db_connect();
			$req = $db->prepare('SELECT COUNT(idUser) as countId FROM bankAccount WHERE idUser = :idUser');
			$req->execute(array('idUser' => $_SESSION['idUser']));

			$data = $req->fetch();

			if ($data['countId'] < 10)
			{
				return true;
			}
			else
			{
				return false;	
			} 
				
		
		}

//3. FONCTION D'INSERTION DES DONNEES DU FORMULAIRE DANS LA BASE DE DONNEES + Connexion BDD
	function insertIntoBank($nameBankAccount, $typeAccount, $currency, $provision)
	{	
		$db = db_connect();
		$req = $db->prepare('INSERT INTO bankAccount (idUser, name, type, currency, provision) VALUES(:idUser, :name, :type, :currency, :provision)');  //
		$req->execute(array(
						'idUser' => $_SESSION['idUser'],
						'name' => $nameBankAccount,
						'type' => $typeAccount,
						'currency' => $currency,
						'provision' => $provision)) ;

	}
//4. FONCTION DE SUPPRESSION D'UN COMPTE BANCAIRE + Connexion BDD

	function selectBankAccountsPerUser()
	{
		$db = db_connect();
		$req = $db->prepare('SELECT id, name, type, provision, currency FROM bankAccount WHERE idUser = :idUser');
		$req->execute(array(
						'idUser' => $_SESSION['idUser']));
	}

//5. FONCTION DE SUPPRESSION DE COMPTE BANCAIRE

	function deleteBankAccount()
	{
		$db = db_connect();
		$req = $db->prepare("DELETE FROM bankAccount WHERE ")
	}

//6. FONCTION DE VERIFICATION DE SELECTION ACTIVE LORS DE LA SUPPRESSION

	function checkModif()
	{
		$delete = ($_POST['delete']);
		if(isset($delete))
		{
			$selectedAccount = ($_POST['selected']);
			deleteBankAccount($selectedAccount);
		}
	}
?>