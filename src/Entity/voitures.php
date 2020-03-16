<?php

namespace Entity;


/*
 * @table : utilisateurs
 */
class voitures
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
    public $Matricule;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement email d’utilisateur.
     */
    public $Marque;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement mot passe d’utilisateur crypté md5.
     */
    public $couleur;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
     */
    public $Id_ut;

    public function __construct($id,$Matricule, $Marque, $couleur, $Id_ut){
        $this->id = $id;
        $this->Matricule = $Matricule;
        $this->Marque = $Marque;
        $this->couleur = $couleur;
        $this->Id_ut = $Id_ut;
     }

}