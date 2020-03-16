<?php
namespace Service;

use Entity\appel;

class appelManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function KeyPrimary($id)
    {
        $sql = "SELECT * FROM `appel` WHERE `id`= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function FetchAll()
    {
        return $this->db->fetchAll('SELECT * FROM `appel`');
    }

    public function FindByID($id)
    {
        $sql = "select * from `appel` where `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
        $utilisateur = new appel($rs['id'], $rs['Nom_C'], $rs['Num_C']);
        return $utilisateur;
    }



    public function Add(appel $user)
    {
        $sql = "INSERT INTO `appel`(`id`, `Nom_C`, `Num_C`) VALUES (:id,:Nom_C,:Num_C)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("Nom_C", $user->Nom_C);
        $stmt->bindValue("Num_C", $user->Num_C);
       
        $stmt->execute();
    }

    public function Update(administrations $user)
    {
        $sql = "UPDATE `appel` SET `Nom_C`=:Nom_C,`Num_C`=:Num_C  WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("Nom_C", $user->Nom_C);
        $stmt->bindValue("Num_C", $user->Num_C);
       
        $stmt->execute();
    }

    public function Delet($id)
    {
        $sql = "DELETE FROM `appel` WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return true;
    }

}