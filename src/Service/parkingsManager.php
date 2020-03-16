<?php
namespace Service;

use Entity\parkings;

class parkingsManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function KeyPrimary($id)
    {
        $sql = "SELECT * FROM `parkings` WHERE `id`= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function FetchAll()
    {
        return $this->db->fetchAll('SELECT * FROM `parkings`');
    }

    public function FindByIDsearch($Username)
    {
        $sql = "select * from `parkings` where `NomUtilisateur_ut` LIKE '%$Username%' ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rs;
    }

    public function FindByID($Username)
    {
        $sql = "select * from `parkings` where `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $Username);
        $stmt->execute();
        $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
        $utilisateur = new parkings($rs['id'], $rs['Nom_p'], $rs['capacite_p'], $rs['NbEtoil_p'], $rs['Rue_p'], $rs['Ville_p'],$rs['Pays_p'],$rs['CodePostale_p'],$rs['Longitude_p'],$rs['Laltitude_p']);
        return $utilisateur;
    }


    public function Add(parkings $user)
    {
        $sql = "INSERT INTO `parkings`(`id`, `Nom_p`, `capacite_p`, `NbEtoil_p`, `Rue_p`, `Ville_p`, `Pays_p`, `CodePostale_p`, `Longitude_p`, `Laltitude_p`) VALUES (:id,:Nom_p,:capacite_p,:NbEtoil_p,:Rue_p,:Ville_p,:Pays_p,:CodePostale_p,:Longitude_p,:Laltitude_p)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("Nom_p", $user->Nom_p);
        $stmt->bindValue("capacite_p", $user->capacite_p);
        $stmt->bindValue("NbEtoil_p", $user->NbEtoil_p);
        $stmt->bindValue("Rue_p", $user->Rue_p);
        $stmt->bindValue("Ville_p", $user->Ville_p);
        $stmt->bindValue("Pays_p", $user->Pays_p);
        $stmt->bindValue("CodePostale_p", $user->CodePostale_p);
        $stmt->bindValue("Longitude_p", $user->Longitude_p);
        $stmt->bindValue("Laltitude_p", $user->Laltitude_p);
        $stmt->execute();
    }

    public function Update(parkings $user)
    {
        $sql = "UPDATE `parkings` SET `Nom_p`=:Nom_p,`capacite_p`=:capacite_p ,`NbEtoil_p`=:NbEtoil_p,`Rue_p`=:Rue_p  ,`Ville_p`=:Ville_p ,`Pays_p`=:Pays_p ,`CodePostale_p`=:CodePostale_p ,`Longitude_p`=:Longitude_p ,`Laltitude_p`=:Laltitude_p  WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("Nom_p", $user->Nom_p);
        $stmt->bindValue("capacite_p", $user->capacite_p);
        $stmt->bindValue("NbEtoil_p", $user->NbEtoil_p);
        $stmt->bindValue("Rue_p", $user->Rue_p);
        $stmt->bindValue("Ville_p", $user->Ville_p);
        $stmt->bindValue("Pays_p", $user->Pays_p);
        $stmt->bindValue("CodePostale_p", $user->CodePostale_p);
        $stmt->bindValue("Longitude_p", $user->Longitude_p);
        $stmt->bindValue("Laltitude_p", $user->Laltitude_p);
        $stmt->execute();
    }

    public function Delet($id)
    {
        $sql = "DELETE FROM `parkings` WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return true;
    }

}