<?php
    include 'functions.php';

    function HashPassword($mdp)
    {
        // Hash le mot de passe en md5 puis en sha256
        return hash ( "sha256", hash ( "md5", $mdp ) );
    }


    // Fonction de connexion retourne vrai si la connexion est établie , faux dans le cas contraire
    function login($username, $mdp)
    {

        session_start ();

        $link = connectDB ();

        // Requête qui va chercher dans la BDD la ligne qui correspond
        // à la combinaison utilisateur/mot de passe
        $query = 'SELECT id_Utilisateur
                  FROM Utilisateur
                  WHERE nom_Utilisateur = "'.mysqli_real_escape_string($link, $username).'" AND
                        MDP_Utilisateur = "'.mysqli_real_escape_string($link, HashPassword($mdp)).'"';

        $row = queryDB($query);

        // Si une seule combinaison utilisateur/mdp ressort de la requête,
        // on le connecte
        if (count($row) == 1)
        {
            // Requête pour inserer l'id de l'utilisateur dans la table de connexion
            $query = "INSERT INTO Connexion(User_Connexion)
                      VALUES (".$row['id_Utilisateur'].")";
            queryDB($query);

            // On met en variables de session
            // Que l'utilisateur est connecté
            $_SESSION['isloged'] = true;
            // Son pseudo
            $_SESSION['user'] = $username;
            // Son id
            $_SESSION['id_user'] = $row['id_Utilisateur'];
            return true;
        }
        else
        // Sinon c'est qu'il y a une erreur
        {
            // Login Not Ok
            $_SESSION['isloged'] = false;
            return false;
        }
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
        if (isset($_SESSION['isloged']) && !empty ( $_SESSION['isloged'])) 
        {
            return true;
        }
    
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
