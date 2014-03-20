<?php
namespace demtrees\CMSBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use demtrees\CMSBundle\Entity\Post;

class LoadPostData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{
		$post_first = new Post();
		$post_first->setCategory($em->merge($this->getReference('category-miscellaneous')));
        $post_first->setTitle('This is a test post');
        $post_first->setHeaderImage('test.png');
        $post_first->setContent('This a test post.');
        $post_first->setToken('test_post');
        $post_first->setIsPublic(true);

        $post_second = new Post();
        $post_second->setCategory($em->merge($this->getReference('category-design')));
        $post_second->setTitle('This is a test post 2');
        $post_second->setHeaderImage('test-2.png');
        $post_second->setContent('This a test post 2.');
        $post_second->setToken('test_post_2');
        $post_second->setIsPublic(true);

        $em->persist($post_first);
        $em->persist($post_second);
        $em->flush();

	}

    public function getOrder()
    {
        return 2;
    }
}