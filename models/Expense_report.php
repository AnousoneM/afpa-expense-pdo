<?php

class Expense_report
{

    // nous allons créer les propriétés de l'objet en fonction des champs de la table employees, ils seront privés
    private int $_id;
    private string $_date;
    private float $_amount_ttc;
    private float $_amount_ht;
    private string $_description;
    private string $_proof;
    private string $_cancel_reason;
    private string $_decisions_date;
    private int $_id_type;
    private int $_id_statut;
    private int $_id_employee;

    // nous allons utiliser la méthode magique __get pour récupérer les propriétés de l'objet en dehors de la classe
    function __get(string $name)
    {
        return $this->$name;
    }


    /**
     * Permet de rajouter une dépense dans la base de données
     * @param array $post_form tableau contenant les données du formulaire
     * @param string $userFileIn64 chaine de caractères contenant le fichier uploadé en base64
     * @param int $id_employee id de l'employé
     * @return bool true si la dépense a été ajouté, sinon false
     */
    public static function addExpenseReport(array $post_form, string $userFileIn64, int $id_employee): bool
    {
        try {
            // Creation d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // requête SQL pour ajouter une note de frais avec des marqueurs nominatifs pour faciliter le bindValue
            $sql = 'INSERT INTO `employees` (`exp_date`, `exp_amount_ttc`, `exp_amount_ht`, `exp_description`, `exp_proof`, `exp_id_type`, `exp_id_employee`)
            VALUES (:date, :amount_ttc, :amount_ht, :description, :proof, :id_type, :id_employee)';

            // On prépare la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // On injecte les valeurs dans la requête et nous utilisons la méthode bindValue pour se prémunir des injections SQL
            // Nous utilisons également la méthode PDO::PARAM_STR pour préciser que le paramètre est une chaîne de caractères
            // Nous utilisons htmlspecialchars pour se prémunir des failles XSS

            $stmt->bindValue(':date', htmlspecialchars($post_form['date']), PDO::PARAM_STR);
            $stmt->bindValue(':amount_ttc', htmlspecialchars($post_form['amount']), PDO::PARAM_STR);
            // On calcule le montant HT
            $amount_ht = $post_form['type'] == 4 || $post_form['type'] == 5 ? $post_form['amount'] * 0.9 : $post_form['amount'] * 0.8;
            $stmt->bindValue(':amount_ht', $amount_ht, PDO::PARAM_STR);
            $stmt->bindValue(':description', htmlspecialchars($post_form['description']), PDO::PARAM_STR);
            $stmt->bindValue(':proof', $userFileIn64, PDO::PARAM_STR);
            $stmt->bindValue(':id_type', htmlspecialchars($post_form['type']), PDO::PARAM_STR);
            $stmt->bindValue(':id_employee', $id_employee, PDO::PARAM_STR);

            // On exécute la requête, elle sera true si elle réussi, dans le cas contraire il y aura une exception
            return $stmt->execute();
        } catch (PDOException $e) {
            // test unitaire pour vérifier que l'employé n'a pas été ajouté et connaitre la raison
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}
