<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testIsTue()
    {
        $category = new Category();
        $category->setName("category")
            ->setDescription("description")
            ->setSlug("test");
        $this->assertTrue($category->getName() === "category");
        $this->assertTrue($category->getDescription() === "description");
        $this->assertTrue($category->getSlug() === "test");
    }

    public function testIsFalse()
    {
        $category = new Category();
        $category->setName("category")
            ->setDescription("description")
            ->setSlug("test");
        $this->assertFalse($category->getName() === "false");
        $this->assertFalse($category->getDescription() === "false");
        $this->assertFalse($category->getSlug() === "false");

    }

    public function testIsEmpty()
    {
        $category = new Category();
        $this->assertEmpty($category->getName());
        $this->assertEmpty($category->getDescription());
        $this->assertEmpty($category->getSlug());
    }

}
