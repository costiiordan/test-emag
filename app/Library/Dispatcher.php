<?php
namespace App\Library;
use App\Communication\Controller\BattleController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class Dispatcher
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function dispatch()
    {
        $controller = new BattleController();
        $action = 'view';

        if (!method_exists($controller, $action)) {
            $response = new Response('', Response::HTTP_NOT_FOUND);
            $response->send();
            return;
        }
        $response = $controller->$action($this->request);
        $response->send();
    }
}