<?php

namespace Entity;


/*
 * @table : utilisateurs
 */
class administrations
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
    public $email_ad;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement email d’utilisateur.
     */
    public $Num_tel;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement mot passe d’utilisateur crypté md5.
     */
    public $Prenom_ad;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
     */
    public $Nom_ad;

    /*
  * @Type : varchar(191)
  * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
  */
    public $NomUtilisateur_ad;

    /*
  * @Type : varchar(191)
  * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
  */
    public $mdp_ad;

    public function __construct($id,$email_ad, $Num_tel, $Prenom_ad, $Nom_ad,$NomUtilisateur_ad,$mdp_ad){
        $this->id = $id;
        $this->email_ad = $email_ad;
        $this->Num_tel = $Num_tel;
        $this->Prenom_ad = $Prenom_ad;
        $this->Nom_ad = $Nom_ad;
        $this->NomUtilisateur_ad = $NomUtilisateur_ad;
        $this->mdp_ad = $mdp_ad;
     }

}