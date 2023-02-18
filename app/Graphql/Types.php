<?php 
//crear types para tickets
namespace App\Graphql;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
class Types
{
    private static $ticket;
    private static $tickets;
    public static function ticket()
    {
        if (empty(self::$ticket)) {
            self::$ticket = new ObjectType([
                'name' => 'Ticket',
                'fields' => [
                    'id' => Type::int(),
                    'userId' => Type::int(),
                    'status' => Type::string(),
                    'created_at' => Type::string(),
                    'updated_at' => Type::string(),
                    'deleted_at' => Type::string()
                ]
            ]);
        }
        return self::$ticket;
    }
    public static function tickets()
    {
        if (empty(self::$tickets)) {
            self::$tickets = new ObjectType([
                'name' => 'Tickets',
                'fields' => [
                    'data' => Type::listOf(self::ticket()),
                    'total' => Type::int()
                ]
            ]);
        }
        return self::$tickets;
    }

    
}
?>