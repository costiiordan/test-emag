<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 26-Jan-19
 * Time: 17:59
 */

namespace App\Characters;


class MonsterCharacter extends AbstractCharacter implements CharacterInterface
{
    const HEALTH_RANGE = [60, 90];
    const STRENGTH_RANGE = [60, 90];
    const DEFENCE_RANGE = [40, 60];
    const SPEED_RANGE = [40, 60];
    const LUCK_RANGE = [25, 40];

    public function __construct($name)
    {
        parent::__construct(
            $name,
            self::HEALTH_RANGE,
            self::STRENGTH_RANGE,
            self::DEFENCE_RANGE,
            self::SPEED_RANGE,
            self::LUCK_RANGE
        );
    }
}