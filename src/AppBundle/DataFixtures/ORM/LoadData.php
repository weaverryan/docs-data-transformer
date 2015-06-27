<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use AppBundle\Entity\Issue;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $issue1 = new Issue();
        $issue1->setTitle('I am an issue!');
        $issue1->setDescription('...');

        $manager->persist($issue1);
        $manager->flush();
    }
}
