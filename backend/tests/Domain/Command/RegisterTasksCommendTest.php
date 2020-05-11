<?php

namespace App\Tests\Domain\Commend;

use App\Application\Service\Contract\TaskServiceContract;
use App\Application\Service\TaskService;
use App\Domain\Command\RegisterTasksCommend;
use App\Tests\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use ReflectionException;

/**
 * Class RegisterTasksCommendTest
 * @package App\Tests\Domain\Commend
 * @coversDefaultClass \App\Domain\Command\RegisterTasksCommend
 */
class RegisterTasksCommendTest extends TestCase
{
    /** @var MockObject|TaskServiceContract  */
    private $taskService;

    /** @var MockObject|RegisterTasksCommend */
    private $registerTaskCommend;

    protected function setUp()
    {
        $this->taskService = $this->getIsolatedMock(TaskService::class);
        $this->registerTaskCommend = new RegisterTasksCommend($this->taskService);

        parent::setUp();
    }

    /**
     * @param array $methods
     */
    protected function getMockCommand(array $methods = [])
    {
        $this->registerTaskCommend = $this->getMockBuilder(RegisterTasksCommend::class)
            ->setConstructorArgs([$this->taskService])
            ->setMethods($methods)
            ->getMock();
    }

    /**
     * @test
     * @covers ::configure
     * @throws ReflectionException
     */
    public function itShouldConfigureCommend()
    {
        $description = 'Register Tasks Commend';
        $help = 'This command allows you to register task';
        $this->getMockCommand(['setDescription', 'setHelp']);

        $this->registerTaskCommend->expects($this->once())->method('setDescription')->with([$description])->willReturnSelf();
        $this->registerTaskCommend->expects($this->once())->method('setHelp')->with([$help])->willReturnSelf();

        $this->assertNull($this->invokeMethod($this->registerTaskCommend, 'configure'));
    }
}