<?php
namespace Service;

use Entity\administrations;

class administrationsManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function KeyPrimary($id)
    {
        $sql = "SELECT * FROM `administrations` WHERE `id`= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function FetchAll()
    {
        return $this->db->fetchAll('SELECT * FROM `administrations`');
    }

    public function FindByID($id)
    {
        $sql = "select * from `administrations` where `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
        $utilisateur = new administrations($rs['id'], $rs['email_ad'], $rs['Num_tel'], $rs['Prenom_ad'], $rs['Nom_ad'], $rs['NomUtilisateur_ad'],$rs['mdp_ad']);
        return $utilisateur;
    }



    public function Add(administrations $user)
    {
        $sql = "INSERT INTO `administrations`(`id`, `email_ad`, `Num_tel`, `Prenom_ad`, `Nom_ad`, `NomUtilisateur_ad`, `mdp_ad`) VALUES (:id,:email_ad,:Num_tel,:Prenom_ad,:Nom_ad,:NomUtilisateur_ad,:mdp_ad)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("email_ad", $user->email_ad);
        $stmt->bindValue("Num_tel", $user->Num_tel);
        $stmt->bindValue("Prenom_ad", $user->Prenom_ad);
        $stmt->bindValue("Nom_ad", $user->Nom_ad);
        $stmt->bindValue("NomUtilisateur_ad", $user->NomUtilisateur_ad);
        $stmt->bindValue("mdp_ad", $user->mdp_ad);
        $stmt->execute();
    }

    public function Update(administrations $user)
    {
        $sql = "UPDATE `administrations` SET `email_ad`=:email_ad,`Num_tel`=:Num_tel ,`Prenom_ad`=:Prenom_ad,`Nom_ad`=:Nom_ad  ,`NomUtilisateur_ad`=:NomUtilisateur_ad ,`mdp_ad`=:mdp_ad  WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("email_ad", $user->email_ad);
        $stmt->bindValue("Num_tel", $user->Num_tel);
        $stmt->bindValue("Prenom_ad", $user->Prenom_ad);
        $stmt->bindValue("Nom_ad", $user->Nom_ad);
        $stmt->bindValue("NomUtilisateur_ad", $user->NomUtilisateur_ad);
        $stmt->bindValue("mdp_ad", $user->mdp_ad);
        $stmt->execute();
    }

    public function Delet($id)
    {
        $sql = "DELETE FROM `administrations` WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return true;
    }

}