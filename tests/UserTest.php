<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testSomething()
    {
        $this->assertTrue(true);
    }

    public function testIsTue()
    {
        $user = new User();
        $user->setFirstName("asma")
            ->setLastName("ayari")
            ->setEmail("asma.ayari@gmail.com")
            ->setPassword("password")
            ->setAbout("it's me")
            ->setPhoneNumber("123456789");
        $this->assertTrue($user->getFirstName() === "asma");
        $this->assertTrue($user->getLastName() === "ayari");
        $this->assertTrue($user->getEmail() === "asma.ayari@gmail.com");
        $this->assertTrue($user->getPassword() === "password");
        $this->assertTrue($user->getAbout() === "it's me");
        $this->assertTrue($user->getPhoneNumber() === "123456789");
    }

    public function testIsFalse()
    {
        $user = new User();
        $user->setFirstName("asma")
            ->setLastName("ayari")
            ->setEmail("asma.ayari@gmail.com")
            ->setPassword("password")
            ->setAbout("it's me")
            ->setPhoneNumber("123456789");
        $this->assertFalse($user->getFirstName() === "false");
        $this->assertFalse($user->getLastName() === "false");
        $this->assertFalse($user->getEmail() === "asma.ayari@esprit.tn");
        $this->assertFalse($user->getPassword() === "false");
        $this->assertFalse($user->getAbout() === "false");
        $this->assertFalse($user->getPhoneNumber() === "false");
    }

    public function testIsEmpty()
    {
        $user = new User();
        $this->assertEmpty($user->getFirstName());
        $this->assertEmpty($user->getLastName());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPhoneNumber());
        $this->assertEmpty($user->getAbout());
        $this->assertEmpty($user->getPassword());

    }

}
