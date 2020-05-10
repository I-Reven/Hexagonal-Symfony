<?php

namespace App\Infrastructure\Fixture;

use App\Infrastructure\Entity\Developer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class DeveloperFixture
 * @package App\Infrastructure\Fixture
 */
class DeveloperFixture extends Fixture
{

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 5; $i++) {
            $developer = new Developer();
            $developer->setName('Developer ' . $i);
            $developer->setEstimated(0);
            $developer->setSeniority($i);
            $manager->persist($developer);
        }

        $manager->flush();
    }
}