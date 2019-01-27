<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 26-Jan-19
 * Time: 17:04
 */

namespace App\Communication\Command;

use App\Actions\Battle;
use App\Characters\HeroCharacter;
use App\Characters\MonsterCharacter;
use App\Characters\Skills\MagicShield;
use App\Characters\Skills\RapidStrike;
use App\Library\Logger;
use App\Services\BattleService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BattleCommand extends Command
{
    protected static $defaultName = 'game:battle';

    protected $battleService;

    public function __construct()
    {
        parent::__construct();

        $this->battleService = new BattleService();
    }

    protected function configure()
    {
        $this->setDescription('Runs a battle between a hero and a wild beast.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->battleService->simulateBattle();

        $output->writeln(Logger::getLogs());
    }
}