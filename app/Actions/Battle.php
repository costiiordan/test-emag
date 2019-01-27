<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 26-Jan-19
 * Time: 17:54
 */

namespace App\Actions;


use App\Characters\CharacterInterface;
use App\Characters\Skills\MagicShield;
use App\Characters\Skills\RapidStrike;
use App\Library\Logger;

class Battle
{
    const MAX_TURNS = 10;

    protected $participants;
    protected $turn;

    protected $attacksPerTurn = 1;

    protected $battleLog = [];

    public function __construct(CharacterInterface $characterOne, CharacterInterface $characterTwo)
    {
        $this->participants = [$characterOne, $characterTwo];
        $this->turn = 1;
    }

    public function runBattle():CharacterInterface
    {
        Logger::writeLog('Battle Starts');

        $this->orderParticipants();

        Logger::writeLog($this->participants[0]->getName().' attacks first');

        return $this->runTurn();
    }

    protected function runTurn():CharacterInterface
    {
        Logger::writeLog('Turn: '.$this->turn);

        $this->engage($this->participants[0], $this->participants[1]);

        if (!$this->participants[1]->isAlive()) {
            return $this->declareWinner($this->participants[0]);
        }

        $this->turn += 1;

        if ($this->turn === 10) {
            if ($this->participants[0]->getHealth() > $this->participants[1]->getHealth()) {
                return $this->declareWinner($this->participants[0]);
            }

            return $this->declareWinner($this->participants[1]);
        }

        $this->switchTurns();

        return $this->runTurn();
    }

    protected function orderParticipants()
    {
        if ($this->participants[0]->getSpeed() < $this->participants[1]->getSpeed()) {
            $this->switchTurns();
            return;
        }

        if (
            $this->participants[0]->getSpeed() === $this->participants[1]->getSpeed()
            && $this->participants[0]->getLuck() < $this->participants[1]->getLuck()
        ) {
            $this->switchTurns();
        }
    }

    protected function switchTurns()
    {
        $this->participants = array_reverse($this->participants);
    }

    protected function engage(CharacterInterface &$attacker, CharacterInterface &$defender)
    {
        $attackSkills = $attacker->getAttackSkills();
        $defenceSkills = $defender->getDefenceSkills();

        foreach ($attackSkills as $skill) {
            if ($skill instanceof RapidStrike && $skill->isUsingSkill()){
                $this->attacksPerTurn = 2;
                Logger::writeLog($attacker->getName().' is using Rapid Strike');
            }
        }

        for ($i = 0; $i < $this->attacksPerTurn; $i++) {
            Logger::writeLog($attacker->getName().' is attacking');

            $damage = $attacker->attack();
            Logger::writeLog('Attack damage: '.$damage);

            foreach ($defenceSkills as $skill) {
                if ($skill instanceof MagicShield && $skill->isUsingSkill()){
                    $damage = round($damage / 2);
                    Logger::writeLog($defender->getName().' is using Magic Shield');
                    Logger::writeLog('Attack damage: '.$damage);
                }
            }

            $defender->defend($damage);
        }

        Logger::writeLog($defender->getName().' remaining health: '.$defender->getHealth());
    }

    protected function declareWinner(CharacterInterface $winner):CharacterInterface
    {
        Logger::writeLog($winner->getName().' is winner');

        return $winner;
    }
}