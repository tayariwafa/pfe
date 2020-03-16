<?php

namespace Entity;


/*$Nom_g
 * @table : utilisateurs
 */
class gardiens
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
    public $email_g;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement email d’utilisateur.
     */
    public $Prenom_g;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement mot passe d’utilisateur crypté md5.
     */
    public $Nom_g;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
     */
    public $cin_g;


    /*
    * @Type : varchar(191)
    * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
    */
    public $tel_g;

    /*
    * @Type : varchar(191)
    * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
    */
    public $salaire_g;

    /*
    * @Type : varchar(191)
    * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
    */
    public $NbHeure_g;

    /*
    * @Type : varchar(191)
    * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
    */
    public $TempsHoraire_g;

    /*
    * @Type : varchar(191)
    * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
    */
    public $NomUtilisateur_g;


    /*
    * @Type : varchar(191)
    * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
    */
    public $mdp_g;

    /*
    * @Type : varchar(191)
    * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
    */
    public $Id_park;



    public function __construct($id,$email_g,$Prenom_g,$cin_g,$tel_g,$Nom_g,$salaire_g,$NbHeure_g,$TempsHoraire_g, $NomUtilisateur_g, $mdp_g, $Id_park){
        $this->id = $id;
        $this->email_g = $email_g;
        $this->Prenom_g = $Prenom_g;
        $this->Nom_g = $Nom_g;
        $this->cin_g = $cin_g;
        $this->tel_g = $tel_g;
        $this->salaire_g = $salaire_g;
        $this->NbHeure_g = $NbHeure_g;
        $this->TempsHoraire_g = $TempsHoraire_g;
        $this->NomUtilisateur_g = $NomUtilisateur_g;
        $this->mdp_g = $mdp_g;
        $this->Id_park = $Id_park;
     }

}