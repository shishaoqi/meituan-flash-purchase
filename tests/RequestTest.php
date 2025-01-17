<?php

namespace Shishaoqi\MeituanFlashPurchase\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class RequestTest extends TestCase
{
    public function test_all_requests_will_return_the_correct_response()
    {
        $mock = new MockHandler();
        $handlerStack = new HandlerStack($mock);
        $client = new Client(['handler' => $handlerStack]);
        $app = $this->getApplicationInstance()->setHttpClient($client);

        $responseJson = $this->getResponseJson();
        $classArray = ['comment', 'act', 'medicine', 'order', 'poi', 'retail', 'shipping', 'im', 'goods', 'task', 'delivery'];
        foreach ($classArray as &$class) {
            $reflectionClass = new \ReflectionClass($app->$class);
            $methods = $reflectionClass->getMethods();
            foreach ($methods as &$method) {
                if ($method->class == 'Shishaoqi\\MeituanFlashPurchase\\Request\\'.ucfirst($class)) {
                    $response = new Response(200, [], $responseJson);
                    $mock->append($response);
                    $methodName = $method->getName();
                    $result = $app->$class->$methodName(['foo' => 'bar']);
                    $this->assertSame($responseJson, $result);
                }
            }
        }
    }

    private function getResponseJson()
    {
        return '{"data":"ok"}';
    }

    public function test_can_set_async()
    {
        $app = $this->getApplicationInstance()->goods;
        $this->assertFalse($app->isAsync);

        $app->async();
        $this->assertTrue($app->isAsync);
    }
}
