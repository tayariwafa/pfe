<?php

namespace Entity;


/*
 * @table : utilisateurs
 */
class places
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
    public $Prix_p;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement mot passe d’utilisateur crypté md5.
     */
    public $Etat_dispo;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
     */
    public $Id_park;

    public function __construct($id,$Nom_p, $Prix_p, $Etat_dispo, $Id_park){
        $this->id = $id;
        $this->Nom_p = $Nom_p;
        $this->Prix_p = $Prix_p;
        $this->Etat_dispo = $Etat_dispo;
        $this->Id_park = $Id_park;
     }

}