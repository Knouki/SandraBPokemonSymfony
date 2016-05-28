<?php
namespace SandraPokemonBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Finder\Finder;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('Admin');
        $user->setEmail('admin@poke.com');
        $user->setPlainPassword('1234');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_SUPER_ADMIN'));

        $userManager = $this->container->get('fos_user.user_manager');
        $userManager->updateUser($user, true);

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('Pierre');
        $user->setEmail('pierre@poke.com');
        $user->setPlainPassword('password');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));

        // Update the user
        $userManager->updateUser($user, true);

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('Auguste');
        $user->setEmail('auguste@poke.com');
        $user->setPlainPassword('password');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));

        // Update the user
        $userManager->updateUser($user, true);

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('Giovanni');
        $user->setEmail('giovanni@poke.com');
        $user->setPlainPassword('password');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));

        // Update the user
        $userManager->updateUser($user, true);

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('Ondine');
        $user->setEmail('ondine@poke.com');
        $user->setPlainPassword('password');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));

        // Update the user
        $userManager->updateUser($user, true);

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('Major');
        $user->setEmail('major@poke.com');
        $user->setPlainPassword('password');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));

        // Update the user
        $userManager->updateUser($user, true);

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('Erika');
        $user->setEmail('erika@poke.com');
        $user->setPlainPassword('password');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));

        // Update the user
        $userManager->updateUser($user, true);

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('Koga');
        $user->setEmail('koga@poke.com');
        $user->setPlainPassword('password');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));

        // Update the user
        $userManager->updateUser($user, true);

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('morgane');
        $user->setEmail('morgane@poke.com');
        $user->setPlainPassword('password');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));

        // Update the user
        $userManager->updateUser($user, true);
    }

    public function getOrder()
    {
        return 1;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }


}