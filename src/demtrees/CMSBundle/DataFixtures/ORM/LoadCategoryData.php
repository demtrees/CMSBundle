<?php
namespace demtrees\CMSBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use demtrees\CMSBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
    {
        $photography = new Category();
        $photography->setName('Photography');

        $design = new Category();
        $design->setName('Design');

        $thoughtFlow = new Category();
        $thoughtFlow->setName('Thought-flow');
        
        $random = new Category();
        $random->setName('Miscellaneous');

        $theWeekly = new Category();
        $theWeekly->setName('The Weekly');

        $em->persist($photography);
        $em->persist($design);
        $em->persist($thoughtFlow);
        $em->persist($random);
        $em->persist($theWeekly);
        $em->flush();

        $this->addReference('category-photography', $photography);
        $this->addReference('category-design', $design);
        $this->addReference('category-miscellaneous', $random);
        $this->addReference('category-thoughtflow', $thoughtFlow);
        $this->addReference('category-theweekly', $theWeekly);

    }

    public function getOrder()
    {
        return 1;
    }
}
