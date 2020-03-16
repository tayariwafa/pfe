<?php
namespace Service;

use Entity\gardiens;

class gardiensManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function KeyPrimary($id)
    {
        $sql = "SELECT * FROM `gardiens` WHERE `id`= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function FetchAll()
    {
        return $this->db->fetchAll('SELECT * FROM `gardiens`');
    }

    public function FindByID($Username)
    {
        $sql = "select * from `gardiens` where `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $Username);
        $stmt->execute();
        $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
        $utilisateur = new gardiens($rs['id'], $rs['email_g'], $rs['Prenom_g'], $rs['Nom_g'], $rs['cin_g'], $rs['tel_g'],$rs['salaire_g'],$rs['NbHeure_g'],$rs['TempsHoraire_g'],$rs['NomUtilisateur_g'],$rs['mdp_g'],$rs['Id_park']);
        return $utilisateur;
    }


    public function Add(gardiens $user)
    {
        $sql = "INSERT INTO `gardiens`(`id`, `email_g`, `Prenom_g`, `Nom_g`, `cin_g`, `tel_g`, `salaire_g`, `NbHeure_g`, `TempsHoraire_g`, `NomUtilisateur_g`, `mdp_g`, `Id_park`) VALUES (:id,:email_g,:Prenom_g,:Nom_g,:cin_g,:tel_g,:salaire_g,:NbHeure_g,:TempsHoraire_g,:NomUtilisateur_g,:mdp_g,:Id_park)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("email_g", $user->email_g);
        $stmt->bindValue("Prenom_g", $user->Prenom_g);
        $stmt->bindValue("Nom_g", $user->Nom_g);
        $stmt->bindValue("cin_g", $user->cin_g);
        $stmt->bindValue("tel_g", $user->tel_g);
        $stmt->bindValue("salaire_g", $user->salaire_g);
        $stmt->bindValue("NbHeure_g", $user->NbHeure_g);
        $stmt->bindValue("TempsHoraire_g", $user->TempsHoraire_g);
        $stmt->bindValue("NomUtilisateur_g", $user->NomUtilisateur_g);
        $stmt->bindValue("mdp_g", $user->mdp_g);
        $stmt->bindValue("Id_park", $user->Id_park);
        $stmt->execute();
    }

    public function Update(gardiens $user)
    {
        $sql = "UPDATE `gardiens` SET `email_g`=:email_g,`Prenom_g`=:Prenom_ut ,`Nom_g`=:Nom_g,`cin_g`=:cin_g ,`tel_g`=:tel_g ,`salaire_g`=:salaire_g ,`NbHeure_g`=:NbHeure_g ,`TempsHoraire_g`=:TempsHoraire_g ,`NomUtilisateur_g`=:NomUtilisateur_g ,`mdp_g`=:mdp_g ,`Id_park`=:Id_park WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("email_g", $user->email_g);
        $stmt->bindValue("Prenom_g", $user->Prenom_g);
        $stmt->bindValue("Nom_g", $user->Nom_g);
        $stmt->bindValue("cin_g", $user->cin_g);
        $stmt->bindValue("tel_g", $user->tel_g);
        $stmt->bindValue("salaire_g", $user->salaire_g);
        $stmt->bindValue("NbHeure_g", $user->NbHeure_g);
        $stmt->bindValue("TempsHoraire_g", $user->TempsHoraire_g);
        $stmt->bindValue("NomUtilisateur_g", $user->NomUtilisateur_g);
        $stmt->bindValue("mdp_g", $user->mdp_g);
        $stmt->bindValue("Id_park", $user->Id_park);
        $stmt->execute();
    }

    public function Delet($username)
    {
        $sql = "DELETE FROM `gardiens` WHERE `NomUtilisateur_ut`=:Username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("Username", $username);
        $stmt->execute();
        return true;
    }

}