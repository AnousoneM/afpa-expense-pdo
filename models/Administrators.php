<?php

class Administrators
{

    // nous allons créer les propriétés de l'objet en fonction des champs de la table Administrators, ils seront privés
    private int $_id;
    private string $_mail;
    private string $_password;

    // nous allons utiliser la méthode magique __get pour récupérer les propriétés de l'objet en dehors de la classe
    function __get(string $name)
    {
        return $this->$name;
    }

    /**
     * Permet de vérifier si le mail est déja présent dans la base de données 
     * @param string $mail le mail à vérifier
     * @return bool true si le mail existe, sinon false
     */
    public static function checkIfMailExist(string $mail): bool
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT COUNT(*) FROM `administrators` WHERE `adm_mail` = :mail'; // marqueur nominatif
            $stmt = $pdo->prepare($sql); // on prepare la requete pour se prémunir des injections SQL
            $stmt->bindValue(':mail', htmlspecialchars($mail), PDO::PARAM_STR); // on associe le marqueur nominatif à la variable $mail
            $stmt->execute(); // on execute la requête

            // A l'aide d'une ternaire, nous vérifions si nous avons un résultat à l'aide de la méthode fetchColumn()
            // Si le résultat est supérieur à 0, nous retournons true, sinon nous retournons false
            $stmt->fetchColumn() > 0 ? $result = true : $result = false;

            // nous retournons le result
            return $result;
        } catch (PDOException $e) {
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
    
    /**
     * Permet de récupérer de contrôler le mot de passe en fonction du mail
     * @param string $mail le mail de l'administrateur
     * @param string $password le mot de passe de l'administrateur
     * @return bool true si le mot de passe correspond, sinon false
     */
    public static function checkPasswordByMail(string $mail, string $password): bool
    {
        try {
            $pdo = Database::createInstancePDO();
            $sql = 'SELECT * FROM `administrators` WHERE `adm_mail` = :mail'; // marqueur nominatif
            $stmt = $pdo->prepare($sql); // on prepare la requete
            $stmt->bindValue(':mail', htmlspecialchars($mail), PDO::PARAM_STR); // on associe le marqueur nominatif à la variable $login
            $stmt->execute(); // on execute la requête

            // Je fais fetch() pour récupérer un tableau associatif avec les clés qui sont les noms des colonnes SQL
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // nous vérifions que le mot de passe correspond à celui en base à l'aide de la fonction password_verify
            // nous récupérons le mot de passe à l'aide de la clé 'adm_password' du tableau $result obtenu avec la requête SQL
            if (password_verify($password, $result['adm_password'])) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}
