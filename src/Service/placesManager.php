<?php
namespace Service;

use Entity\places;

class placesManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function KeyPrimary($id)
    {
        $sql = "SELECT * FROM `places` WHERE `id`= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function FetchAll()
    {
        return $this->db->fetchAll('SELECT * FROM `places`');
    }


    public function FindByID($id)
    {
        $sql = "select * from `places` where `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
        $utilisateur = new places($rs['id'], $rs['Nom_p'], $rs['Prix_p'], $rs['Etat_dispo'], $rs['Id_park']);
        return $utilisateur;
    }

    public function Add(places $user)
    {
        $sql = "INSERT INTO `places`(`id`, `Nom_p`, `Prix_p`, `Etat_dispo`, `Id_park`) VALUES (:id,:Nom_p,:Prix_p,:Etat_dispo,:Id_park)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("Nom_p", $user->Nom_p);
        $stmt->bindValue("Prix_p", $user->Prix_p);
        $stmt->bindValue("Etat_dispo", $user->Etat_dispo);
        $stmt->bindValue("Id_park", $user->Id_park);
        $stmt->execute();
    }

    public function Update(places $user)
    {
        $sql = "UPDATE `places` SET `Nom_p`=:Nom_p,`Prix_p`=:Prix_p ,`Etat_dispo`=:Etat_dispo,`Id_park`=:Id_park  WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("Nom_p", $user->Nom_p);
        $stmt->bindValue("Prix_p", $user->Prix_p);
        $stmt->bindValue("Etat_dispo", $user->Etat_dispo);
        $stmt->bindValue("Id_park", $user->Id_park);
        $stmt->execute();
    }

    public function Delet($id)
    {
        $sql = "DELETE FROM `places` WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return true;
    }

}