<?php

namespace Entity;


/*
 * @table : utilisateurs
 */
class responsables
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
    public $email_resp;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement email d’utilisateur.
     */
    public $Prenom_resp;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement mot passe d’utilisateur crypté md5.
     */
    public $Nom_resp;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
     */
    public $tel_resp;

    /*
  * @Type : varchar(191)
  * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
  */
    public $Paiement_resp;

    /*
* @Type : varchar(191)
* @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
*/
    public $NomUtilisateur_resp;

    /*
* @Type : varchar(191)
* @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
*/
    public $mdp_resp;

    /*
* @Type : varchar(191)
* @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
*/
    public $id_ad;

    /*
* @Type : varchar(191)
* @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
*/
    public $id_Park;

    public function __construct($id,$email_resp,$Nom_resp,$Prenom_resp,$tel_resp,$Paiement_resp,$NomUtilisateur_resp, $mdp_resp, $id_ad, $id_Park){
        $this->id = $id;
        $this->email_resp = $email_resp;
        $this->Prenom_resp = $Prenom_resp;
        $this->Nom_resp = $Nom_resp;
        $this->tel_resp = $tel_resp;

        $this->Paiement_resp = $Paiement_resp;
        $this->NomUtilisateur_resp = $NomUtilisateur_resp;
        $this->mdp_resp = $mdp_resp;
        $this->id_ad = $id_ad;
        $this->id_Park = $id_Park;
     }

}