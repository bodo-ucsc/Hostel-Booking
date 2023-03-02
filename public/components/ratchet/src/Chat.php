<?php
namespace MyApp;

use Ratchet\App;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

#[AllowDynamicProperties]
class Chat implements MessageComponentInterface
{
    protected $clients;

    protected $routes;

    public function __construct()
    {
        $this->routes = array();
    }


    #[AllowDynamicProperties]
    public function onOpen(ConnectionInterface $conn)
    {
        $route = $conn->route;
        if (!isset($this->routes[$route])) {
            $this->routes[$route] = array(
                'connections' => new \SplObjectStorage,
                'clients' => 0,
            );
        }

        echo "New connection! ({$conn->resourceId}) in route $route \n";



        $this->routes[$route]['connections']->attach($conn);
        $this->routes[$route]['clients']++;
    }


    #[AllowDynamicProperties]
    public function onClose(ConnectionInterface $conn)
    {
        $route = $conn->route;
        $this->routes[$route]['connections']->detach($conn);
        $this->routes[$route]['clients']--;
        echo "Connection {$conn->resourceId} has disconnected from route $route \n";
        if ($this->routes[$route]['clients'] == 0) {

            unset($this->routes[$route]);
            echo "Route $route has been deleted\n";
        }
        echo "open routes are " . count($this->routes) . "\n";
        // list all open routes
        foreach ($this->routes as $key => $value) {
            echo "route: $key \n";
        }
    }


    #[AllowDynamicProperties]
    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg);
        if (isset($data->newRoute)) {
            $newRoute = $data->newRoute;
            if (!isset($this->routes[$newRoute])) {
                $this->routes[$newRoute] = array(
                    'connections' => new \SplObjectStorage,
                    'clients' => 0,
                );
                echo "New route: $newRoute\n";
            }
            $from->route = $newRoute;
            $this->routes[$newRoute]['connections']->attach($from);
            $this->routes[$newRoute]['clients']++;
            echo "Connection {$from->resourceId} has connected to route $newRoute \n";
        } else if (isset($data->typing)) {
            $route = $from->route;
            $numRecv = count($this->routes[$route]['connections']) - 1;
            echo sprintf(
                'Connection %d is typing in %s route' . "\n"
                , $from->resourceId,
                $route
            );

            foreach ($this->routes[$route]['connections'] as $client) {
                if ($from !== $client) {
                    // The sender is not the receiver, send to each client connected 
                    $client->send(json_encode([
                        'typing' => 'y',
                        'name' => $data->name
                    ]));
                }
            }
        } else {
            $route = $from->route;
            $numRecv = count($this->routes[$route]['connections']) - 1;
            echo sprintf(
                'Connection %d sending message "%s" to %d other connection%s through %s route' . "\n"
                , $from->resourceId,
                $msg,
                $numRecv, $numRecv == 1 ? '' : 's',
                $route
            );

            foreach ($this->routes[$route]['connections'] as $client) {
                if ($from !== $client) {
                    // The sender is not the receiver, send to each client connected 
                    $client->send(json_encode([
                        'name' => $data->name,
                        'date' => $data->date,
                        'msg' => $data->msg
                    ]));
                }
            }
        }
    }

    //make a new route for the chat 
    // public function route($route, $component, $allowedOrigins = [])
    // {
    //     $this->routes[$route] = [
    //         'component' => $component,
    //         'allowedOrigins' => $allowedOrigins
    //     ];
    //     echo "New route: $route\n";
    // }

    // public function onOpen(ConnectionInterface $conn)
    // {
    //     // Store the new connection to send messages to later
    //     $this->clients->attach($conn); 

    //     echo "New connection! ({$conn->resourceId})\n";
    // }

    // public function onMessage(ConnectionInterface $from, $msg)
    // {
    //     echo "Message received: $msg\n";
    //     $data = json_decode($msg);
    //     $route = $data->route;
    //     $name = $data->name;
    //     $date = $data->date;
    //     $message = $data->msg;
    //     $create = $data->create;

    //     if($create == 'y'){
    //         if(!isset($this->routes[$route])){
    //             $this->route($route, new Chat, ['*']);
    //         }
    //         else{
    //             echo "Route already exists\n";
    //         }
    //         $this->routes[$route]['component']->onOpen($from);
    //     }else{
    //         $numRecv = count($this->routes[$route]['component']->clients) - 1;
    //         echo sprintf('Connection %d sending message "%s" to %d other connection%s through %s route' . "\n"
    //             , $from->resourceId, $message, $numRecv, $numRecv == 1 ? '' : 's', $route);

    //         foreach ($this->routes[$route]['component']->clients as $client) {
    //             if ($from !== $client) {
    //                 // The sender is not the receiver, send to each client connected
    //                 $client->send(json_encode([
    //                     'name' => $name,
    //                     'date' => $date,
    //                     'msg' => $message
    //                 ]));
    //             }
    //         }
    //     }
    // }


    // public function onClose(ConnectionInterface $conn)
    // {
    //     // The connection is closed, remove it, as we can no longer send it messages
    //     $this->clients->detach($conn);




    //     echo "Connection {$conn->resourceId} has disconnected\n";

    //     // if(count($this->routes[$route]['component']->clients) == 0){
    //     //     echo "No more connections, closing server\n";
    //     //     $this->stop();
    //     // }
    // }


    #[AllowDynamicProperties]
    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}

// $app = new App('localhost', 8080, '0.0.0.0');
// $app->route('/', new Chat, ['*']);
// $app->route('/chat', new Chat, ['*']);
// $app->run();
