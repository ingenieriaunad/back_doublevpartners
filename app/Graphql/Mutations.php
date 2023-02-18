<?php 
//Mutation para crear un ticket
namespace App\Graphql;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\Graphql\Types;
use App\Models\{TicketsModel, UsersModel};

return new ObjectType([
    'name' => 'Mutation',
    'fields' => [
        'createTicket' => [
            'type' => Types::ticket(),
            'args' => [
                'userId' => Type::nonNull(Type::int()),
                'status' => Type::nonNull(Type::string())
            ],
            'resolve' => function ($root, $args) {
                $ticketsModel = new TicketsModel();
                $usersModel   = new UsersModel();
                $user = $usersModel->find($args['userId']);
                if(!$user) return null;
                $ticket = [
                    'userId' => $args['userId'],
                    'status' => $args['status']
                ];
                $ticketId = $ticketsModel->insert($ticket);
                $ticket= $ticketsModel->find($ticketId);
                return $ticket;
            }
        ],
        'updateTicket' => [
            'type' => Types::ticket(),
            'args' => [
                'id'     => Type::nonNull(Type::int()),
                'userId' => Type::int(),
                'status' => Type::string()
            ],
            'resolve' => function ($root, $args) {
                $ticketsModel = new TicketsModel();
                $usersModel   = new UsersModel()  ;
                $ticket       = []                ;
                if(isset($args['userId'])) {
                    $ticket['userId'] = $args['userId'];
                    $user = $usersModel->find($args['userId']);
                    if(!$user) return null;
                }
                if(isset($args['status'])) {
                    $ticket['status'] = $args['status'];
                }
                $ticketsModel->update($args['id'], $ticket);
                $ticket= $ticketsModel->find($args['id']);
                return $ticket;
            }
        ],
        'deleteTicket' => [
            'type' => Types::ticket(),
            'args' => [
                'id' => Type::nonNull(Type::int())
            ],
            'resolve' => function ($root, $args) {
                $ticketsModel = new TicketsModel();
                $ticket= $ticketsModel->find($args['id']);
                if(!$ticket) return null;
                $ticketsModel->delete($args['id']);
                return $ticket;
            }
        ]
    ]
]);
?>