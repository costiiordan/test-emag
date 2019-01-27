<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 27-Jan-19
 * Time: 19:07
 */

namespace App\Library;


use App\Characters\CharacterInterface;

class Logger
{
    static protected $log = [];

    static function writeLog($message)
    {
        self::$log[] = $message;
    }

    static function getLogs()
    {
        return self::$log;
    }

    public static function describeCharacter(CharacterInterface $character)
    {
        self::$log[] = 'Character description:';
        self::$log[] = 'Name: '.$character->getName();
        self::$log[] = 'Health: '.$character->getHealth();
        self::$log[] = 'Strength: '.$character->getStrength();
        self::$log[] = 'Defence: '.$character->getDefence();
        self::$log[] = 'Speed: '.$character->getSpeed();
        self::$log[] = 'Luck: '.$character->getLuck();
    }
}