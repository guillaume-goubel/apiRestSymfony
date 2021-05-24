<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 10 ; $i++) { 
            
            $user = new User();
            $hashPass = $this->encoder->encodePassword($user ,'password');
            $user->setEmail($faker->email)
                 ->setPassword($hashPass)
                 ->setRoles(['ROLE_USER'])  
            ;

            $manager->persist($user);

            for ($a=0; $a < random_int(5,15) ; $a++) { 
                $article = (new Article())->setAuthor($user)
                ->setContent($faker->text(300))
                ->setName($faker->text(50));

                $manager->persist($article);
            }
            
        }

        $manager->flush();
    }
}
