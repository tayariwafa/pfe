<?php

namespace Entity;


/*
 * @table : utilisateurs
 */
class favoris
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
    public $id_utilisateur;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement email d’utilisateur.
     */
    public $id_Parking;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement mot passe d’utilisateur crypté md5.
     */
    public $etat;

    public function __construct($id,$id_utilisateur, $id_Parking, $etat){
        $this->id = $id;
        $this->id_utilisateur = $id_utilisateur;
        $this->id_Parking = $id_Parking;
        $this->etat = $etat;
     }

}