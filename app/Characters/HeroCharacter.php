<?php
/**
 * Created by PhpStorm.
 * User: Costi
 * Date: 26-Jan-19
 * Time: 17:20
 */

namespace App\Characters;


use App\Characters\Skills\SkillInterface;

class HeroCharacter extends AbstractCharacter implements CharacterInterface
{
    const HEALTH_RANGE = [70, 100];
    const STRENGTH_RANGE = [70, 80];
    const DEFENCE_RANGE = [45, 55];
    const SPEED_RANGE = [40, 50];
    const LUCK_RANGE = [10, 30];

    public function __construct($name, SkillInterface ...$skills)
    {
        parent::__construct(
            $name,
            self::HEALTH_RANGE,
            self::STRENGTH_RANGE,
            self::DEFENCE_RANGE,
            self::SPEED_RANGE,
            self::LUCK_RANGE
        );

        $this->skills = $skills;
    }
}