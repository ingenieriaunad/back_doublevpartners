<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
class TicketsController extends BaseController
{
    public function index()
    {
        $schema = new Schema([
            'query' => require_once APPPATH . 'Graphql/Schema.php',
            'mutation' => require_once APPPATH . 'Graphql/Mutations.php'
        ]);
        //obtenemos el input o peticion
        $rawInput = file_get_contents('php://input');
        //decodificamos el input
        $input = json_decode($rawInput, true);
        //ejecutamos la peticion mediante graphql
        $result = GraphQL::executeQuery(
            $schema,
            $input['query'],
            null,
            null,
            $input['variables']??null
        );

        $output = $result->toArray();
        return $this->getResponse($output);
        
    }
    private function getResponse($output){
        //validamos se es una peticion de schema
        if(isset($output['data']['__schema'])){
            return $this->response->setStatusCode(200)
                                  ->setJSON($output);
        }
        //validamos si hay errores
        if(isset($output['errors'])){
            return $this->response->setStatusCode(400)
                                  ->setJSON($output['errors']);
        }
        //Retornamos la data
        return $this->response->setStatusCode(200)
                              ->setJSON($output['data']);
    }
}
