<?php

namespace App\Tests;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use PHPUnit_Framework_MockObject_MockObject;
use ReflectionClass;
use ReflectionException;

/**
 * Class TestCase
 * @package App\Tests
 */
abstract class TestCase extends WebTestCase
{
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
}