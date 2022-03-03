<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/
namespace App\Controllers;
use App\Models\contactos;
class ContactosController{

private $requestMethod;
private $userId;
private $contactos;

public function __construct($requestMethod, $userId)
{
    $this->requestMethod = $requestMethod;
    $this->userId = $userId;
    $this->contactos = Contactos::getInstancia();
}

public function processRequest()
    {
        var_dump($this->contactos);
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->userId) {
                    $response = $this->getContactos($this->userId);
                } else {
                    $response = $this->getAllContactos();
                };
                break;
            // case 'POST':
            //     $response = $this->createContactosFromRequest();
            //     break;
            // case 'PUT':
            //     $response = $this->updateContactosFromRequest($this->userId);
            //     break;
            // case 'DELETE':
            //     $response = $this->deleteContactos($this->userId);
            //     break;
            // default:
            //     $response = $this->notFoundResponse();
            //     break;
            // }
        
            }
    header($response['status_code_header']);
            if ($response['body']) {
                echo $response['body'];
            }
}
    private function getContactos($id)
    {
        $result = $this->contactos->get($id);
        var_dump($result);
        if (!$result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }
    private function getAllContactos(){
        $result = $this->contactos->get_all();
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }
    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
    }
?>