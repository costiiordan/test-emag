<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 26-Jan-19
 * Time: 17:18
 */

namespace App\Characters;


abstract class AbstractCharacter
{
    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;
    protected $skills = [];

    protected $name;

    public function __construct($name, $healthRange, $strengthRange, $defenceRange, $speedRange, $luckRange)
    {
        $this->name = $name;

        $this->health = rand($healthRange[0], $healthRange[1]);
        $this->strength = rand($strengthRange[0], $strengthRange[1]);
        $this->defence = rand($defenceRange[0], $defenceRange[1]);
        $this->speed = rand($speedRange[0], $speedRange[1]);
        $this->luck = rand($luckRange[0], $luckRange[1]);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function getDefence()
    {
        return $this->defence;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getLuck()
    {
        return $this->luck;
    }

    public function isAlive()
    {
        return $this->health > 0;
    }

    public function attack()
    {
        return $this->strength;
    }

    public function defend($damage) {
        $receivedDamage = $damage - $this->defence;

        if ($receivedDamage < 0) {
            $receivedDamage = 0;
        }

        $health = $this->health - $receivedDamage;

        $this->health = $health < 0 ? 0 : $health;
    }

    public function getAttackSkills():array
    {
        return array_filter($this->skills, function($skill) {
            return $skill::TYPE === $skill::TYPE_ATTACK;
        });
    }

    public function getDefenceSkills():array
    {
        return array_filter($this->skills, function($skill) {
            return $skill::TYPE === $skill::TYPE_DEFENCE;
        });
    }
}