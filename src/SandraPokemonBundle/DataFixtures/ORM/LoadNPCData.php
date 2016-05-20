<?php
namespace SandraPokemonBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Finder\Finder;

class LoadNPCData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $sql = file_get_contents("web/sql/ScriptForNpcAndDresseurs.sql");
        $manager->getConnection()->exec($sql);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}