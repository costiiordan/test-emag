<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 27-Jan-19
 * Time: 17:01
 */

namespace App\Communication\Controller;


use App\Library\Logger;
use App\Services\BattleService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BattleController extends AbstractController
{
    protected $battleService;

    public function __construct()
    {
        $this->battleService = new BattleService();
    }

    public function view(Request $request): Response
    {
        $this->battleService->simulateBattle();

        return $this->render('battle', ['messages' => Logger::getLogs()]);
    }
}