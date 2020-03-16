<?php

namespace Entity;


/*
 * @table : utilisateurs
 */
class parkings
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
    public $Nom_p;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement email d’utilisateur.
     */
    public $capacite_p;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement mot passe d’utilisateur crypté md5.
     */
    public $NbEtoil_p;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
     */
    public $Rue_p;


    /*
    * @Type : varchar(191)
    * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
    */
    public $Ville_p;

    /*
    * @Type : varchar(191)
    * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
    */
    public $Pays_p;

    /*
    * @Type : varchar(191)
    * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
    */
    public $CodePostale_p;

    /*
    * @Type : varchar(191)
    * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
    */
    public $Longitude_p;

    /*
    * @Type : varchar(191)
    * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
    */
    public $Laltitude_p;


    public function __construct($id,$capacite_p,$NbEtoil_p,$Nom_p,$Rue_p,$Ville_p,$Pays_p, $CodePostale_p, $Longitude_p, $Laltitude_p){
        $this->id = $id;
        $this->Nom_p = $Nom_p;
        $this->capacite_p = $capacite_p;
        $this->NbEtoil_p = $NbEtoil_p;
        $this->Rue_p = $Rue_p;
        $this->Ville_p = $Ville_p;
        $this->Pays_p = $Pays_p;
        $this->CodePostale_p = $CodePostale_p;
        $this->Longitude_p = $Longitude_p;
        $this->Laltitude_p = $Laltitude_p;
     }

}