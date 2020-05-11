<?php

namespace App\Tests\Domain\Commend;

use App\Application\Service\Contract\TaskServiceContract;
use App\Domain\Command\RegisterTasksCommend;
use App\Tests\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use ReflectionException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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
        $this->taskService = $this->getIsolatedMock(TaskServiceContract::class);
        $this->registerTaskCommend = new RegisterTasksCommend($this->taskService);

        parent::setUp();
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

        $this->assertNull($this->invokeMethod($this->registerTaskCommend, 'configure'));
        $this->assertEquals($description, $this->registerTaskCommend->getDescription());
        $this->assertEquals($help, $this->registerTaskCommend->getHelp());
    }

    /**
     * @test
     * @covers ::execute
     * @throws ReflectionException
     */
    public function itShouldExecuteCommend()
    {
        /** @var InputInterface|MockObject $input */
        $input = $this->getIsolatedMock(InputInterface::class);

        /** @var OutputInterface|MockObject $input */
        $output = $this->getIsolatedMock(OutputInterface::class);

        $this->taskService->expects($this->once())->method('registerTasks');
        $output->expects($this->once())->method('writeln')->with(['Task Registered']);

        $this->assertEquals(0, $this->invokeMethod($this->registerTaskCommend, 'execute', [$input, $output]));
    }
}