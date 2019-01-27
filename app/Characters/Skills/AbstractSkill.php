<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 26-Jan-19
 * Time: 18:19
 */

namespace App\Characters\Skills;


abstract class AbstractSkill
{
    const TYPE_ATTACK = 'attack';
    const TYPE_DEFENCE = 'defence';

    protected $chance;

    public function isUsingSkill(): bool
    {
        return $this->chance > rand(0, 100);
    }
}