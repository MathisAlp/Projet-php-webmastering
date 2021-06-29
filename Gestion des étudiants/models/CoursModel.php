<?php
namespace ism\models;
use ism\lib\AbstractModel;
class CoursModel extends AbstractModel{

    public function __construct() {
        parent::__construct();
        $this->tableName = "cours";
        $this->primaryKey = "idCours";
    }

    function select_date():array {
        $sql="SELECT * FROM cours
        WHERE dateCours=?";
        return $result=$this->database->executeSelect($sql);
    }
    
    function select_classe(string $libelleClass, string $niveauClass, string $filiereClass):array{
        $sql= "SELECT * FROM cours 
        WHERE classCours=? ";
        return $result=$this->database->executeSelect($sql,[$libelleClass,$niveauClass,$filiereClass],true);
    }

    function select_module_prof(string $matriculeProf):array{
        $sql= "SELECT moduleProf FROM professeur 
        WHERE matriculeProf=?";
        return $result=$this->database->executeSelect($sql,[$matriculeProf]);
    }

    function select_module(string $libelleCours):array{
        $sql= "SELECT moduleCours FROM cours
        WHERE classeCours=?";
        return [];
    }

    function select_semestre():array{
        $sql= "SELECT semestreCours FROM cours
        WHERE moduleCours=?";
        return $result =$this->database->executeSelect($sql);
    }

    function insert_user(array $user):bool{
        extract($user);
        $sql= "INSERT INTO user 
        (login,password,role,nom_complet)
        VALUES 
        (?,?,?,?)";

        $result=$this->database->executeSelect($sql,[$login,$password,$role,$nom_complet]);
        
        return $result["count"]==0?false:true;
    }
}
?>