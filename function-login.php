<?php
function HashPassword($mdp) {
	// Hash le mot de pass en md5 puis en sha256
	return hash ( "sha256", hash ( "md5", $mdp ) );
}
// Fonction de connexion retourne vrai si la connexion est établie , faux dans le cas contraire
function login($mail, $mdp) {
	include 'functions.php';
	session_start ();
	$query = "SELECT id_Utilisateur FROM Utilisateur WHERE Mail_Utilisateur = \"" . $mail . "\" AND MDP_Utilisateur = \"" . HashPassword ( $mdp ) . "\" ";
	$row = queryDB ( $query );
	// Login OK
	echo count ( $row );
	if (count ( $row ) == 1) {
		$query = "INSERT INTO Connexion(User_Connexion) VALUES (" . $row ['id_Utilisateur'] . ")";
		queryDB ( $query );
		$_SESSION ['isloged'] = true;
		$_SESSION ['user'] = $mail;
		return true;
	} else {
		// Login Not Ok
		$_SESSION ['isloged'] = false;
		return false;
	}
}
// Met fin à la session en cours pour deconnecter l'utilisateur
function disconnect() {
	return session_destroy ();
}
// Renvoie vrai si un utilisateur est connecté , faux dans le cas contraire
function isLoged() {
	if (! empty ( $_SESSION ['isloged'] )) {
		return $_SESSION ['isloged'];
	} else {
		return false;
	}
}