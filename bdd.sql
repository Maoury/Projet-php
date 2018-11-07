CREATE DATABASE BDD CHARACTER SET 'utf8'; -- creation base de données

	USE BDD; 

	CREATE TABLE users (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		mail VARCHAR(50) NOT NULL UNIQUE,
		password VARCHAR(50) NOT NULL,
		PRIMARY KEY (id)
	)
	ENGINE = INNODB;

	CREATE TABLE bankAccount (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		idUser INT UNSIGNED NOT NULL,
		name VARCHAR(50) NOT NULL,
		type ENUM('courant','epargne','compte_joint'),
		provision DECIMAL(10,3) DEFAULT 0,
		currency ENUM('EUR','USD'),
		PRIMARY KEY (id)
	)
	ENGINE = INNODB;

	CREATE TABLE operation (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		idBankAccount INT UNSIGNED NOT NULL,
		idCategory INT UNSIGNED NOT NULL,
		name VARCHAR(50) NOT NULL,
		amount DECIMAL(10,3) DEFAULT 0,
		dateOps DATE NOT NULL,
		PRIMARY KEY (id)
	)
	ENGINE = INNODB;

	CREATE TABLE category (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		name VARCHAR (25) NOT NULL,
		type ENUM('debit','credit'),
		PRIMARY KEY (id)
	)
	ENGINE = INNODB;

										--STORY 3--
	ALTER TABLE bankAccount ADD FOREIGN KEY (idUser) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE;
	ALTER TABLE operation ADD FOREIGN KEY (idBankAccount) REFERENCES bankAccount(id) ON DELETE CASCADE ON UPDATE CASCADE;
	ALTER TABLE operation ADD FOREIGN KEY (idCategory) REFERENCES category(id) ON DELETE CASCADE ON UPDATE CASCADE;

	INSERT INTO bankAccount (idUser, name, type, provision, currency)
	VALUES (1, 'Budget', 'courant', 300.00, 'EUR'),
		   (1, 'Budget Alim', 'courant', 500.00, 'EUR'),
		   (1, 'Budget Vacances', 'compte_joint', 900.00, 'EUR'),
		   (1, 'Budget Noël', 'epargne', 900.00, 'EUR'),
		   (1, 'Budget Vacances d\'Hiver', 'compte_joint', 900.00, 'EUR'),
		   (1, 'Budget Vacances d\'Eté', 'compte_joint', 900.00, 'EUR');
