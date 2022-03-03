<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/
namespace App\Models;
class Contactos extends DBAbstractModel{
private static $instancia;
    public static function getInstancia()
    {
    if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    public function __construct(){}
    public function get($id=''){
        $this->query = "SELECT * FROM contactos
        WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function get_All(){
        $this->query = "SELECT * FROM contactos";
        $this->get_results_from_query();
        return $this->rows;
    }
    public function edit(){}
    public function delete(){}
    public function set(){}
}

?>