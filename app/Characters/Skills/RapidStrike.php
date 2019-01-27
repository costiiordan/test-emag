<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 26-Jan-19
 * Time: 17:36
 */

namespace App\Characters\Skills;


class RapidStrike extends AbstractSkill implements SkillInterface
{
    const TYPE = self::TYPE_ATTACK;

    protected $chance = 10;
}