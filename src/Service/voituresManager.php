<?php
namespace Service;

use Entity\voitures;

class voituresManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function KeyPrimary($id)
    {
        $sql = "SELECT * FROM `voitures` WHERE `id`= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function FetchAll()
    {
        return $this->db->fetchAll('SELECT * FROM `voitures`');
    }

    public function FindByID($id)
    {
        $sql = "select * from `voitures` where `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
        $utilisateur = new voitures($rs['id'], $rs['Matricule'], $rs['Marque'], $rs['couleur'], $rs['Id_ut']);
        return $utilisateur;
    }

    public function Add(voitures $voitures)
    {
        $sql = "INSERT INTO `voitures`(`id`, `Matricule`, `Marque`, `couleur`, `Id_ut`) VALUES  (:id,:Matricule,:Marque,:couleur,:Id_ut)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $voitures->id);
        $stmt->bindValue("Matricule", $voitures->Matricule);
        $stmt->bindValue("Marque", $voitures->Marque);
        $stmt->bindValue("couleur", $voitures->couleur);
        $stmt->bindValue("Id_ut", $voitures->Id_ut);
        $stmt->execute();
    }

    public function Update(voitures $voitures)
    {
        $sql = "UPDATE `voitures` SET `Matricule`=:Matricule,`Marque`=:Marque ,`couleur`=:couleur,`Id_ut`=:Id_ut  WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $voitures->id);
        $stmt->bindValue("Matricule", $voitures->Matricule);
        $stmt->bindValue("Marque", $voitures->Marque);
        $stmt->bindValue("couleur", $voitures->couleur);
        $stmt->bindValue("Id_ut", $voitures->Id_ut);
        $stmt->execute();
    }

    public function Delet($id)
    {
        $sql = "DELETE FROM `voitures` WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return true;
    }
    
    public function GetProfile($id)
    {
        $sql = "select * from `utilisateurs` ,`voitures` where utilisateurs.Id_ut = voitures.id  ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return true;
    }

}