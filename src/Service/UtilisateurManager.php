<?php
namespace Service;

use Entity\Utilisateurs;

class UtilisateurManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function KeyPrimary($id)
    {
        $sql = "SELECT * FROM `utilisateurs` WHERE `id`= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function FetchAll()
    {
        return $this->db->fetchAll('SELECT * FROM `utilisateurs`');
    }

    public function FindByIDsearch($Username)
    {
        $sql = "select * from `utilisateurs` where `NomUtilisateur_ut` LIKE '%$Username%' ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rs;
    }

    public function FindByID($Username)
    {
        $sql = "select * from `utilisateurs` where `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $Username);
        $stmt->execute();
        $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
        $utilisateur = new Utilisateurs($rs['id'], $rs['Prenom_ut'], $rs['Nom_ut'], $rs['NomUtilisateur_ut'], $rs['Email_ut'], $rs['mdp_ut'],$rs['tel_ut'],$rs['Solde_ut']);
        return $utilisateur;
    }

    public function Authenticate($Username, $Password)
    {
        $sql = "select * from `utilisateurs`  where `Email_ut` = :username and `mdp_ut` = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("username", $Username);
        $stmt->bindValue("password", md5($Password));
        $stmt->execute();
        $rs = $stmt->rowCount();
        return $rs;
    }

    public function Add(Utilisateurs $user)
    {
        $sql = "INSERT INTO `utilisateurs`(`id`, `Prenom_ut`, `Nom_ut`, `NomUtilisateur_ut`, `Email_ut`, `mdp_ut`, `tel_ut`, `Solde_ut`) VALUES (:id,:Prenom_ut,:Nom_ut,:NomUtilisateur_ut,:Email_ut,:mdp_ut,:tel_ut,:Solde_ut)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("Nom_ut", $user->Nom_ut);
        $stmt->bindValue("Prenom_ut", $user->Prenom_ut);
        $stmt->bindValue("NomUtilisateur_ut", $user->NomUtilisateur_ut);
        $stmt->bindValue("Email_ut", $user->Email_ut);
        $stmt->bindValue("mdp_ut", $user->mdp_ut);
        $stmt->bindValue("tel_ut", $user->tel_ut);
        $stmt->bindValue("Solde_ut", $user->Solde_ut);
        $stmt->execute();
    }

    public function Update(Utilisateurs $user)
    {
        $sql = "UPDATE `utilisateurs` SET `Nom_ut`=:Nom_ut,`Prenom_ut`=:Prenom_ut ,`NomUtilisateur_ut`=:NomUtilisateur,`Email_ut`=:Email_ut  ,`mdp_ut`=:mdp_ut ,`tel_ut`=:tel_ut ,`Solde_ut`=:Solde_ut  WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $user->id);
        $stmt->bindValue("Nom_ut", $user->Nom_ut);
        $stmt->bindValue("Prenom_ut", $user->Prenom_ut);
        $stmt->bindValue("NomUtilisateur_ut", $user->NomUtilisateur_ut);
        $stmt->bindValue("Email_ut", $user->Email_ut);
        $stmt->bindValue("mdp_ut", $user->mdp_ut);
        $stmt->bindValue("tel_ut", $user->tel_ut);
        $stmt->bindValue("Solde_ut", $user->Solde_ut);
        $stmt->execute();
    }

    public function Delet($id)
    {
        $sql = "DELETE FROM `utilisateurs` WHERE `id`=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        return true;
    }


}