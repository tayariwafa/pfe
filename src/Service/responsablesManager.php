<?php
namespace Service;

use Entity\responsables;

class responsablesManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function KeyPrimary($id)
    {
        $sql = "SELECT * FROM `responsables` WHERE `id`= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function FetchAll()
    {
        return $this->db->fetchAll('SELECT * FROM `responsables`');
    }


    public function FindByID($id)
    {
        $sql = "select * from `responsables` where `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
        $utilisateur = new responsables($rs['id'], $rs['email_resp'], $rs['Prenom_resp'], $rs['Nom_resp'], $rs['tel_resp'], $rs['Paiement_resp'],$rs['NomUtilisateur_resp'],$rs['mdp_resp'],$rs['id_ad'],$rs['id_Park']);
        return $utilisateur;
    }

    public function Add(responsables $user)
    {
        $sql = "INSERT INTO `responsables` (`id`, `email_resp`, `Prenom_resp`, `Nom_resp`, `tel_resp`, `Paiement_resp`, `NomUtilisateur_resp`, `mdp_resp`, `id_ad`, `id_Park`) VALUES (:id,:email_resp,:Prenom_resp,:Nom_resp,:tel_resp,:Paiement_resp,:NomUtilisateur_resp, :mdp_resp,:id_ad,:id_Park)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("email_resp", $user->email_resp);
        $stmt->bindValue("Prenom_resp", $user->Prenom_resp);
        $stmt->bindValue("Nom_resp", $user->Nom_resp);
        $stmt->bindValue("tel_resp", $user->tel_resp);
        $stmt->bindValue("Paiement_resp", $user->Paiement_resp);
        $stmt->bindValue("NomUtilisateur_resp", $user->NomUtilisateur_resp);
        $stmt->bindValue("mdp_resp", $user->mdp_resp);
        $stmt->bindValue("id_ad", $user->id_ad);
        $stmt->bindValue("id_Park", $user->id_Park);
        $stmt->execute();
    }

    public function Update(responsables $user)
    {
        $sql = "UPDATE `responsables` SET `email_resp`=:email_resp,`Prenom_resp`=:Prenom_resp ,`Nom_resp`=:Nom_resp,`tel_resp`=:tel_resp ,`Paiement_resp`=:Paiement_resp ,`NomUtilisateur_resp`=:NomUtilisateur_resp ,`mdp_resp`=:mdp_resp,`id_ad`=:id_ad,`id_Park`=:id_Park  WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("email_resp", $user->email_resp);
        $stmt->bindValue("Prenom_resp", $user->Prenom_resp);
        $stmt->bindValue("Nom_resp", $user->Nom_resp);
        $stmt->bindValue("tel_resp", $user->tel_resp);
        $stmt->bindValue("Paiement_resp", $user->Paiement_resp);
        $stmt->bindValue("NomUtilisateur_resp", $user->NomUtilisateur_resp);
        $stmt->bindValue("mdp_resp", $user->mdp_resp);
        $stmt->bindValue("id_ad", $user->id_ad);
        $stmt->bindValue("id_Park", $user->id_Park);
        $stmt->execute();
    }

    public function Delet($id)
    {
        $sql = "DELETE FROM `responsables` WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return true;
    }

}