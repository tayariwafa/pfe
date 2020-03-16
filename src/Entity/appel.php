<?php

namespace Entity;


/*
 * @table : utilisateurs
 */
class appel
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
    public $Nom_C;

    /*
     * @Type : varchar(191)
     * @Description : Le contenu de cette section devrait décrire brièvement le non du service appeler .
     */
    public $Num_C;

 

    /*
  * @Type : varchar(191)
  * @Description : Le contenu de cette section devrait décrire brièvement Name d’utilisateur .
  */
    public $mdp_ad;

    public function __construct($id,$Nom_C, $Num_C){
        $this->id = $id;
        $this->Nom_C = $Nom_C;
        $this->Num_C = $Num_C;
        
     }

}