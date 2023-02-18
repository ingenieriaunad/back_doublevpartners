<?php
use App\Models\{
    TicketsModel
};
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\Graphql\Types;
/* esquema para crud de tickets con paginacion */
return new ObjectType([
    'name' => 'Query',
    'fields' => [
        'tickets' => [
            'type' => Types::tickets(),
            'args' => [
                'page' => Type::nonNull(Type::int()),
                'per_page' => Type::nonNull(Type::int()),
            ],
            'resolve' => function ($root, $args) {
                $ticketsModel = new TicketsModel();
                $args['per_page'] = $args['per_page'] ?? 10;
                //limitar el per_page a 100
                $args['per_page'] = $args['per_page'] > 100? 100 : $args['per_page'];
                //limitar el per_page a 1 para que no se cargue toda la data
                $args['per_page'] = $args['per_page'] < 1? 1 : $args['per_page'];
                if(!isset($args['page']) || $args['page'] < 1) $args['page'] = 1;
                //calcular el offset
                $offset = ($args['page'] - 1) * $args['per_page'];
                $tickets = $ticketsModel->findAll($args['per_page'], $offset);
                $total= $ticketsModel->countAll();
                $tickets = [
                    'data' => $tickets,
                    'total' => $total
                ];
                return $tickets;
            }
        ],
        'ticket' => [
            'type' => Types::ticket(),
            'args' => [
                'id' => Type::nonNull(Type::int())
            ],
            'resolve' => function ($root, $args) {
                $ticketsModel = new TicketsModel();
                $ticket = $ticketsModel->find($args['id']);
                return $ticket;
            }
        ]
    ]
]);
?>