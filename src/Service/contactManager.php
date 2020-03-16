<?php
namespace Service;

use Entity\contact;

class contactManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function KeyPrimary($id)
    {
        $sql = "SELECT * FROM `contact` WHERE `id`= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function FetchAll()
    {
        return $this->db->fetchAll('SELECT * FROM `contact`');
    }


    public function FindByID($id)
    {
        $sql = "select * from `contact` where `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
        $utilisateur = new contact($rs['id'], $rs['police'], $rs['ambulance'], $rs['protectionCivile']);
        return $utilisateur;
    }


    public function Add(contact $user)
    {
        $sql = "INSERT INTO `contact`(`id`, `police`, `ambulance`, `protectionCivile`) VALUES (:id,:police,:ambulance,:protectionCivile)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("police", $user->police);
        $stmt->bindValue("ambulance", $user->ambulance);
        $stmt->bindValue("protectionCivile", $user->protectionCivile);
        $stmt->execute();
    }

    public function Update(contact $user)
    {
        $sql = "UPDATE `contact` SET `police`=:police,`ambulance`=:ambulance ,`protectionCivile`=:protectionCivile  WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("police", $user->police);
        $stmt->bindValue("ambulance", $user->ambulance);
        $stmt->bindValue("protectionCivile", $user->protectionCivile);
        $stmt->execute();
    }

    public function Delet($id)
    {
        $sql = "DELETE FROM `contact` WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return true;
    }

}