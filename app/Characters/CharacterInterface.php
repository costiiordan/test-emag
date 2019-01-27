<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 26-Jan-19
 * Time: 17:17
 */

namespace App\Characters;


interface CharacterInterface
{
    public function getName();

    public function getHealth();

    public function getStrength();

    public function getDefence();

    public function getSpeed();

    public function getLuck();

    public function isAlive();

    public function attack();

    public function defend($damage);

    public function getAttackSkills():array;

    public function getDefenceSkills():array;
}