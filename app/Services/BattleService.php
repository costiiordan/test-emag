<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 27-Jan-19
 * Time: 17:24
 */

namespace App\Services;


use App\Actions\Battle;
use App\Characters\HeroCharacter;
use App\Characters\MonsterCharacter;
use App\Characters\Skills\MagicShield;
use App\Characters\Skills\RapidStrike;
use App\Library\Logger;

class BattleService
{
    public function simulateBattle() {
        $hero = new HeroCharacter('Orderus', new MagicShield(), new RapidStrike());
        $monster = new MonsterCharacter('Wild Beast');

        Logger::describeCharacter($hero);
        Logger::describeCharacter($monster);

        $Battle = new Battle($hero, $monster);

        return $Battle->runBattle();
    }
}