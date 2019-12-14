<?php

namespace tests\unit;

use alexeevdv\CarrotQuest\ClientInterface;
use alexeevdv\yii\CarrotQuest\Client;
use Codeception\Stub\Expected;
use Codeception\Test\Unit;
use yii\base\InvalidConfigException;

class ClientTest extends Unit
{
    public function testAuthTokenIsRequired()
    {
        $this->expectException(InvalidConfigException::class);
        new Client();
    }

    public function testClientIsEnsured()
    {
        $this->expectException(InvalidConfigException::class);
        new Client([
            'authToken' => 'MY_AUTH_TOKEN',
            'client' => 'client',
        ]);
    }

    public function testDefaultClientUsed()
    {
        $client = new Client([
            'authToken' => 'MY_AUTH_TOKEN',
        ]);
        $this->assertInstanceOf(ClientInterface::class, $client->client);
    }

    public function testCallsAreProxiedToActualClient()
    {
        $client = new Client([
            'authToken' => 'MY_AUTH_TOKEN',
            'client' => $this->makeEmpty(ClientInterface::class, [
                'userSetProperties' => Expected::once(),
            ])
        ]);

        $client->userSetProperties(777, [], false);
    }
}
