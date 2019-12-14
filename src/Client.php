<?php

namespace alexeevdv\yii\CarrotQuest;

use alexeevdv\CarrotQuest\Client as CarrotQuestClient;
use alexeevdv\CarrotQuest\ClientInterface;
use GuzzleHttp\Client as GuzzleClient;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\di\Instance;

/**
 * Class Client
 * @package alexeevdv\yii\CarrotQuest
 */
class Client extends Component implements ClientInterface
{
    /**
     * @var string
     */
    public $authToken;

    /**
     * @var ClientInterface
     */
    public $client;

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();

        if ($this->authToken === null) {
            throw new InvalidConfigException('`authToken` is required.');
        }

        if ($this->client === null) {
            $this->client = new CarrotQuestClient($this->authToken, new GuzzleClient([
                'base_uri' => 'https://api.carrotquest.io',
            ]));
        }

        $this->client = Instance::ensure($this->client, ClientInterface::class);
    }

    /**
     * @inheritDoc
     */
    public function userSetProperties(int $userId, array $properties, $isCarrotQuestUser = true): void
    {
        $this->client->userSetProperties($userId, $properties, $isCarrotQuestUser);
    }
}
