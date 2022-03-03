<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/
namespace App\Models;
class Users extends DBAbstractModel{
    private static $instancia;
    public static function getInstancia(){
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function login($usuario, $password){
        $this->query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
        $this->parametros['usuario'] = $usuario;
        $this->parametros['password'] = $password;
        $this->get_results_from_query();
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Login correcto';
        } else {
            $this->mensaje = 'Login incorrecto';
        }
        return $this->rows[0]??null;
    }
    public function get($id = ''){
        $this->query = "SELECT * FROM usuarios WHERE id = :id";
        $this->parametros['id'] = $id;
    }
    public function set(){}
    public function edit(){}
    public function delete(){}
}
?>