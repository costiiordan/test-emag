<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 26-Jan-19
 * Time: 17:37
 */

namespace App\Characters\Skills;


interface SkillInterface
{
    public function isUsingSkill(): bool;
}