<?php
namespace Service;

use Entity\reservations;

class reservationsManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function KeyPrimary($id)
    {
        $sql = "SELECT * FROM `reservations` WHERE `id`= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function FetchAll()
    {
        return $this->db->fetchAll('SELECT * FROM `reservations`');
    }



    public function FindByID($Username)
    {
        $sql = "select * from `reservations` where `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $Username);
        $stmt->execute();
        $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
        $utilisateur = new reservations($rs['id'], $rs['ModePaiement'], $rs['Montant_carte'], $rs['Montant_espece'], $rs['MontantPay'], $rs['Surplus'],$rs['DateDeb'],$rs['DateFin'],$rs['HeurDeb'],$rs['HeurFin'],$rs['Id_Gard'],$rs['Id_ut'],$rs['Id_voiture'],$rs['Id_place']);
        return $utilisateur;
    }


    public function Add(reservations $user)
    {
        $sql = "INSERT INTO `reservations`(`id`, `ModePaiement`, `Montant_carte`, `Montant_espece`, `MontantPay`, `Surplus`, `DateDeb`,`DateFin`, `HeurDeb`, `HeurFin`, `Id_Gard`, `Id_ut`, `Id_voiture`, `Id_place`) VALUES (:id,:ModePaiement,:Montant_carte,:MontantPay,:Surplus,:mdp_ut,:tel_ut,:Solde_ut)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("Montant_carte", $user->Montant_carte);
        $stmt->bindValue("Montant_espece", $user->Montant_espece);
        $stmt->bindValue("MontantPay", $user->MontantPay);
        $stmt->bindValue("Surplus", $user->Surplus);
        $stmt->bindValue("DateDeb", $user->DateDeb);
        $stmt->bindValue("DateFin", $user->DateFin);
        $stmt->bindValue("HeurDeb", $user->HeurDeb);
        $stmt->bindValue("HeurFin", $user->HeurFin);
        $stmt->bindValue("Id_Gard", $user->Id_Gard);
        $stmt->bindValue("Id_ut", $user->Id_ut);
        $stmt->bindValue("Id_voiture", $user->Id_voiture);
        $stmt->bindValue("Id_place", $user->Id_place);
        $stmt->execute();
    }

    public function Update(reservations $user)
    {
        $sql = "UPDATE `reservations` SET `Montant_carte`=:Montant_carte,`Montant_espece`=:Montant_espece ,`MontantPay`=:MontantPay,`Surplus`=:Surplus  ,`DateDeb`=:DateDeb ,`DateFin`=:DateFin ,`HeurDeb`=:HeurDeb,`HeurFin`=:HeurFin,`Id_Gard`=:Id_Gard ,`Id_ut`=:Id_ut,`Id_voiture`=:Id_voiture,`Id_place`=:Id_place  WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("Montant_carte", $user->Montant_carte);
        $stmt->bindValue("Montant_espece", $user->Montant_espece);
        $stmt->bindValue("MontantPay", $user->MontantPay);
        $stmt->bindValue("Surplus", $user->Surplus);
        $stmt->bindValue("DateDeb", $user->DateDeb);
        $stmt->bindValue("DateFin", $user->DateFin);
        $stmt->bindValue("HeurDeb", $user->HeurDeb);
        $stmt->bindValue("HeurFin", $user->HeurFin);
        $stmt->bindValue("Id_Gard", $user->Id_Gard);
        $stmt->bindValue("Id_ut", $user->Id_ut);
        $stmt->bindValue("Id_voiture", $user->Id_voiture);
        $stmt->bindValue("Id_place", $user->Id_place);
        $stmt->execute();
    }

    public function Delet($id)
    {
        $sql = "DELETE FROM `reservations` WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return true;
    }
    public function SupprimerReservation($id)
    {
        $sql = "DELETE FROM `utilisateurs`,`reservations` WHERE utilisateurs.id = reservations.Id_ut and `id`=:id ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return true;
    }
    public function Rechercher($Matricule)
    {
        $sql = "select * from `reservations` ,`voitures` where reservations.Id_voiture = voitures.id and 'Matricule' =:Matricule ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("Matricule", $Matricule);
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }




}