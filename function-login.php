<?php
function HashPassword($mdp) {
	// Hash le mot de pass en md5 puis en sha256
	return hash ( "sha256", hash ( "md5", $mdp ) );
}
// Fonction de connexion retourne vrai si la connexion est établie , faux dans le cas contraire
function login($username, $mdp) {
	include 'functions.php';
	session_start ();
	$link = connectDB ();
	$query = "SELECT id_Utilisateur FROM Utilisateur WHERE nom_Utilisateur = \"" . mysqli_real_escape_string ( $link, $username ) . "\" AND MDP_Utilisateur = \"" . mysqli_real_escape_string ( $link, HashPassword ( $mdp ) ) . "\" ";
	$row = queryDB ( $query );
	// Login OK
	echo count ( $row );
	if (count ( $row ) == 1) {
		$query = "INSERT INTO Connexion(User_Connexion) VALUES (" . $row ['id_Utilisateur'] . ")";
		queryDB ( $query );
		$_SESSION ['isloged'] = true;
		$_SESSION ['user'] = $username;
		$_SESSION ['id_user'] = $row ['id_Utilisateur'] ;
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
	if (isset($_SESSION['isloged']) && ! empty ( $_SESSION ['isloged'] )) {
		return true;
	}
	
	return false;
}
function GetUsername()
{
	return $_SESSION ['user'];
}
function GetUserID()
{
	return $_SESSION ['id_user'];
}
