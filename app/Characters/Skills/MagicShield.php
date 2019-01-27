<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 26-Jan-19
 * Time: 17:37
 */

namespace App\Characters\Skills;


class MagicShield extends AbstractSkill implements SkillInterface
{
    const TYPE = self::TYPE_DEFENCE;

    protected $chance = 20;
}