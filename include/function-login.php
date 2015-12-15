<?php
    include_once 'functions.php';
    function HashPassword($mdp)
    {
        // Hash le mot de passe en md5 puis en sha256
        return hash ( "sha256", hash ( "md5", $mdp ) );
    }
    // Fonction de connexion retourne vrai si la connexion est établie , faux dans le cas contraire
    function login($username, $mdp)
    {
        session_start ();
        // Requête qui va chercher dans la BDD la ligne qui correspond
        // à la combinaison utilisateur/mot de passe
        $query = 'SELECT id_Utilisateur
                  FROM Utilisateur
                  WHERE nom_Utilisateur = "'.htmlentities($username).'" AND
                        MDP_Utilisateur = "'.htmlentities(HashPassword($mdp)).'"';
        $row = queryDB($query);
        /* 
         * Si une seule combinaison utilisateur/mdp ressort de la requête 
         * c'est ok, sinon c'est qu'il y a une erreur.
         */
        if(count($row) != 1)
            return false;
         
        // Requête pour inserer l'id de l'utilisateur dans la table de connexion
        $query = "INSERT INTO Connexion(User_Connexion)
                  VALUES (".$row[0]['id_Utilisateur'].")";
        queryDB($query);
            // On met en variables de session son nom d'utilisateur et son id
        $_SESSION['user'] = $username;
        $_SESSION['id_user'] = $row[0]['id_Utilisateur'];
        
        // Retourne vrai par défaut    
        return true;
    }
    // Met fin à la session en cours pour déconnecter l'utilisateur
    function disconnect()
    {
        $_SESSION = array();
        
        if (ini_get("session.use_cookies"))
        {
            $params = session_get_cookie_params();
            
            setcookie(session_name(), '', time() - 42000, 
            $params["path"], $params["domain"], $params["secure"], 
            $params["httponly"]);
        }
        
        session_destroy ();
    }
    // Renvoie vrai si un utilisateur est connecté , faux dans le cas contraire
    function isLoged()
    {
        if (isset($_SESSION['id_user']) && isset($_SESSION['user']))
            return true;
    
        return false;
    }
    // Fonction qui retourne le nom de l'utilisateur
    function GetUsername()
    {
        return $_SESSION ['user'];
    }
    // Fonction qui retourne l'id de l'utilisateur
    function GetUserID()
    {
        return $_SESSION ['id_user'];
    }
