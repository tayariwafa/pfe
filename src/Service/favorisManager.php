<?php
namespace Service;

use Entity\favoris;

class favorisManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function KeyPrimary($id)
    {
        $sql = "SELECT * FROM `favoris` WHERE `id`= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function FetchAll()
    {
        return $this->db->fetchAll('SELECT * FROM `favoris`');
    }

    public function FindByIDsearch($Username)
    {
        $sql = "select * from `favoris` where `NomUtilisateur_ut` LIKE '%$Username%' ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rs;
    }

    public function FindByID($Username)
    {
        $sql = "select * from `favoris` where `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $Username);
        $stmt->execute();
        $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
        $utilisateur = new favoris($rs['id'], $rs['id_utilisateur'], $rs['id_Parking'], $rs['etat']);
        return $utilisateur;
    }

    public function Authenticate($Username, $Password)
    {
        $sql = "select * from `favoris`  where `Email_ut` = :username and `mdp_ut` = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("username", $Username);
        $stmt->bindValue("password", md5($Password));
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function Add(favoris $user)
    {
        $sql = "INSERT INTO `favoris`(`id`, `id_utilisateur`, `id_Parking`, `etat`) VALUES  (:id,:id_utilisateur,:id_Parking,:etat)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("id_utilisateur", $user->id_utilisateur);
        $stmt->bindValue("id_Parking", $user->id_Parking);

        $stmt->bindValue("etat", $user->etat);
        $stmt->execute();
    }

    public function Update(favoris $user)
    {
        $sql = "UPDATE `favoris` SET `id_utilisateur`=:id_utilisateur,`id_Parking`=:id_Parking ,`etat`=:etat WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("id_utilisateur", $user->id_utilisateur);
        $stmt->bindValue("id_Parking", $user->id_Parking);
        $stmt->bindValue("etat", $user->etat);
        $stmt->execute();
    }

    public function Delet($id)
    {
        $sql = "DELETE FROM `favoris` WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return true;
    }

}