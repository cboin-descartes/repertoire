CREATE TABLE personne (
  	id_pers int PRIMARY KEY auto_increment,
	login VARCHAR(20) UNIQUE,
	password VARCHAR(40), /* Mot de passe haché avec SHA1 */
	nom VARCHAR(30) NOT NULL, 
	prenom VARCHAR(30) NOT NULL, 
	num_tel VARCHAR(20), 
	email VARCHAR(50)
);


insert into personne (login, password, nom, prenom, num_tel, email) 
	values ('toto',sha1('toto'), 'toto','truc','+336123456788', NULL);

