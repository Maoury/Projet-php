<?php
	function verifFormBankAccount()
	{
		if(isset($_POST['submitFormAccount']))
		{
			if(strlen($_POST['nameBankAccount']) > 50) && (!htmlspecialchars($_POST['nameBankAccount']))
			{
				echo 'Nom limité à 50 caracteres veuillez rentrer un nom conforme';
			}
			else if ($_POST['typeAccount'] != ('epargne' || 'compte joint' || 'courant'))
			{
				echo "Choix Impossible";
			}
			elseif (!is_numeric ($_POST['provision'])) 
			{
				echo 'Ecrivez un nombre'
			}

			else if ($_POST['typeAccount'] != ('USD' || 'EUR'))
			{
				echo "Choix Impossible";
		}	
	}
?>