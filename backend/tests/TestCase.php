<?php

namespace App\Tests;

use Faker\Factory;
use Faker\Generator;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit_Framework_MockObject_MockObject;
use ReflectionClass;
use ReflectionException;

/**
 * Class TestCase
 * @package App\Tests
 */
abstract class TestCase extends WebTestCase
{

    /** @var ?Generator */
    private $faker = null;

    /**
     * @return Generator
     */
    protected function faker(): Generator
    {
        return $this->faker ? $this->faker : Factory::create();
    }

    /**
     * @param $class
     * @param array $ignoreMethods
     * @return array
     */
    public function getClassMethods($class, $ignoreMethods = [])
    {
        return array_diff(get_class_methods($class), array_merge($ignoreMethods, ['__construct']));
    }

    /**
     * @param $class
     * @param array $mockMethods
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    public function getDisabledConstructorMock($class, $mockMethods = [])
    {
        return $this->getMockBuilder($class)
            ->disableOriginalConstructor()
            ->setMethods($mockMethods)
            ->getMock();
    }

    /**
     * @param $class
     * @param array $ignoreMethods
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    public function getIsolatedMock($class, $ignoreMethods = [])
    {
        return $this->getDisabledConstructorMock($class, $this->getClassMethods($class, $ignoreMethods));
    }

    /**
     * @param object &$object
     * @param string $methodName
     * @param array $parameters
     * @return mixed
     * @throws ReflectionException
     */
    protected function invokeMethod(&$object, $methodName, array $parameters = [])
    {
        $reflection = new ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    /**
     * For setting private or protected property of an object
     * @param mixed $object
     * @param mixed $property
     * @param $value
     * @throws ReflectionException
     */
    public function setPrivateProperty($object, $property, $value)
    {
        $reflection = new ReflectionClass($object);
        $reflectionProperty = $reflection->getProperty($property);
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($object, $value);
    }

    /**
     * For getting private or protected property of an object
     * @param mixed $object
     * @param mixed $property
     * @return mixed
     * @throws ReflectionException
     */
    public function getPrivateProperty($object, $property)
    {
        $reflection = new ReflectionClass($object);
        $reflectionProperty = $reflection->getProperty($property);
        $reflectionProperty->setAccessible(true);

        return $reflectionProperty->getValue($object);
    }

    /**
     * For getting private or protected property of an object parent class
     * @param mixed $object
     * @param mixed $property
     * @return mixed
     * @throws ReflectionException
     */
    public function getPrivatePropertyFromParentClass($object, $property)
    {
        $reflection = (new ReflectionClass($object))->getParentClass();
        $reflectionProperty = $reflection->getProperty($property);
        $reflectionProperty->setAccessible(true);

        return $reflectionProperty->getValue($object);
    }

    /**
     * For getting private or protected property of an object's grand parent's class
     * @param mixed $object
     * @param mixed $property
     * @return mixed
     * @throws ReflectionException
     */
    public function getPrivatePropertyFromGrandParentClass($object, $property)
    {
        $reflection = (new ReflectionClass($object))->getParentClass();
        $reflectionProperty = $reflection->getParentClass()->getProperty($property);
        $reflectionProperty->setAccessible(true);

        return $reflectionProperty->getValue($object);
    }

    /**
     * Returns a builder object to create mock objects using a fluent interface.
     *
     * @param string|string[] $className
     */
    public function getMockBuilder($className): MockBuilder
    {
        return new MockBuilder($this, $className);
    }
}