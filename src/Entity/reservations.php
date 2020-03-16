<?php

namespace Entity;


/*
 * @table : utilisateurs
 */
class reservations
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
    public $ModePaiement;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement email d’utilisateur.
     */
    public $Montant_carte;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement mot passe d’utilisateur crypté md5.
     */
    public $Montant_espece;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
     */
    public $MontantPay;

    /*
  * @Type : varchar(191)
  * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
  */
    public $Surplus;

    /*
* @Type : varchar(191)
* @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
*/
    public $DateDeb;

    /*
* @Type : varchar(191)
* @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
*/
    public $DateFin;

    /*
* @Type : varchar(191)
* @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
*/
    public $HeurDeb;

    /*
* @Type : varchar(191)
* @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
*/
    public $HeurFin;

    /*
* @Type : varchar(191)
* @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
*/
    public $Id_Gard;

    /*
* @Type : varchar(191)
* @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
*/
    public $Id_ut;


    /*
* @Type : varchar(191)
* @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
*/
    public $Id_voiture;


    /*
* @Type : varchar(191)
* @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
*/
    public $Id_place;

    public function __construct($id,$ModePaiement,$Montant_carte,$Montant_espece,$MontantPay,$Surplus,$DateDeb, $DateFin, $HeurDeb, $HeurFin,$Id_Gard,$Id_ut,$Id_voiture,$Id_place){
        $this->id = $id;
        $this->ModePaiement = $ModePaiement;
        $this->Montant_carte = $Montant_carte;
        $this->Montant_espece = $Montant_espece;
        $this->MontantPay = $MontantPay;
        $this->Surplus = $Surplus;
        $this->DateDeb = $DateDeb;
        $this->DateFin = $DateFin;
        $this->HeurDeb = $HeurDeb;
        $this->HeurFin = $HeurFin;
        $this->Id_Gard = $Id_Gard;
        $this->Id_ut = $Id_ut;
        $this->Id_voiture = $Id_voiture;
        $this->Id_place = $Id_place;
     }

}