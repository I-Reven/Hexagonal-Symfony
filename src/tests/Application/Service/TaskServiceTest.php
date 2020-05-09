<?php

namespace App\Tests\Application\Service;

use App\Application\Service\TaskService;
use App\Domain\Adapter\InterfaceTaskAdapter;
use App\Domain\Adapter\InterfaceTaskAdapterProxy;
use App\Domain\Entity\Task;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class TaskServiceTest
 * @package App\Tests\Application\Service
 * @coversDefaultClass \App\
 */
class TaskServiceTest extends TestCase
{
    /** @var MockObject|InterfaceTaskAdapterProxy  */
    private $taskAdapterProxy;

    /** @var MockObject|SerializerInterface  */
    private $serializer;

    /** @var MockObject|TaskService  */
    private $taskService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->taskAdapterProxy = $this->getMockBuilder(InterfaceTaskAdapterProxy::class)->disableArgumentCloning()->getMock();
        $this->serializer = $this->getMockBuilder(SerializerInterface::class)->disableArgumentCloning()->getMock();

        $this->taskService = new TaskService($this->taskAdapterProxy, $this->serializer);
    }

    /**
     * @test
     */
    public function itShouldRegisterTasks()
    {
        $response = $this->getMockBuilder(ResponseInterface::class)->disableArgumentCloning()->getMock();
        $taskAdapter = $this->getMockBuilder(InterfaceTaskAdapter::class)->disableArgumentCloning()->getMock();
        $content = ['id' => 1, 'title' => 'test task', 'time' => 1, 'complex' => 3];
        $url = 'http://www.mocky.io/v2/5d47f24c330000623fa3ebfa';

//        $this->taskAdapterProxy->expects($this->once())->method('setUrl')->with($url)->willReturnSelf();
//        $this->taskAdapterProxy->expects($this->once())->method('lazyLoad')->willReturn($taskAdapter);
//        $taskAdapter->expects($this->once())->method('getResponse')->willReturn($response);
//        $response->expects($this->once())->method('getContent')->willReturn(json_encode($content));


        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $task = $serializer->deserialize(json_encode($content), Task::class, 'json');
        dump($task->getTitle());
        die('');
    }

}
