<?php

use Codeception\Module\Cli;

class BattleCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(Cli $I)
    {
        $I->runShellCommand('php console game:battle', false);

        $I->seeShellOutputMatches('/is winner/m');
    }
}
