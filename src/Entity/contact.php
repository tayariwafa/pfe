<?php

namespace Entity;


/*
 * @table : utilisateurs
 */
class contact
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
    public $police;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement email d’utilisateur.
     */
    public $ambulance;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement mot passe d’utilisateur crypté md5.
     */
    public $protectionCivile;

    public function __construct($id,$police, $ambulance, $protectionCivile){
        $this->id = $id;
        $this->police = $police;
        $this->ambulance = $ambulance;
        $this->protectionCivile = $protectionCivile;
     }

}