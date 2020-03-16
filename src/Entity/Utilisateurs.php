<?php

namespace Entity;


/*
 * @table : utilisateurs
 */
class Utilisateurs
{
    /*
     * @Type : int(10)
     * @Primary Key
     * @Description : cette section devrait spécifier utilisateur uniquement.
     */
    public $id;

    /*
     * @Type : varchar(191)
     * @foreign key , @Table : role , @Attribute : Id_SequenceDuTest
     * @Description :
     */
    public $Prenom_ut;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement email d’utilisateur.
     */
    public $Nom_ut;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement mot passe d’utilisateur crypté md5.
     */
    public $NomUtilisateur_ut;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
     */
    public $Email_ut;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement Prénom d’utilisateur.
     */
    public $mdp_ut;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement emplacement de l’image de profile d’utilisateur
     */
    public $tel_ut;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section indique langage par défaut pour utilisateur
     */
    public $Solde_ut;

    public function __construct($id,$Prenom_ut, $Nom_ut, $NomUtilisateur_ut, $Email_ut, $mdp_ut, $tel_ut, $Solde_ut){
        $this->id = $id;
        $this->Prenom_ut = $Prenom_ut;
        $this->Nom_ut = $Nom_ut;
        $this->NomUtilisateur_ut = $NomUtilisateur_ut;
        $this->Email_ut = $Email_ut;
        $this->mdp_ut = $mdp_ut;
        $this->tel_ut = $tel_ut;
        $this->Solde_ut = $Solde_ut;
     }

}