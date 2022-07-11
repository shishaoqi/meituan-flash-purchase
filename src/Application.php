<?php

namespace Shishaoqi\MeituanFlashPurchase;

use Shishaoqi\MeituanFlashPurchase\Request\Act;
use Shishaoqi\MeituanFlashPurchase\Request\Comment;
use Shishaoqi\MeituanFlashPurchase\Request\Delivery;
use Shishaoqi\MeituanFlashPurchase\Request\Goods;
use Shishaoqi\MeituanFlashPurchase\Request\Im;
use Shishaoqi\MeituanFlashPurchase\Request\Image;
use Shishaoqi\MeituanFlashPurchase\Request\Medicine;
use Shishaoqi\MeituanFlashPurchase\Request\Order;
use Shishaoqi\MeituanFlashPurchase\Request\Poi;
use Shishaoqi\MeituanFlashPurchase\Request\Retail;
use Shishaoqi\MeituanFlashPurchase\Request\Shipping;
use Shishaoqi\MeituanFlashPurchase\Request\Task;
use Shishaoqi\MeituanFlashPurchase\Request\Token;
use Exception;
use GuzzleHttp\Client;

/**
 * Class Application.
 *
 * @property Comment $comment
 * @property Act $act
 * @property Image $image
 * @property Medicine $medicine
 * @property Order $order
 * @property Poi $poi
 * @property Retail $retail
 * @property Shipping $shipping
 * @property Im $im
 * @property Goods $goods
 * @property Delivery $delivery
 * @property Task $task
 * @property Token $token
 */
class Application
{
    private $config;

    public function __construct($config)
    {
        $this->config = new Config($config);
        $this->client = new Client();
    }

    public function setHttpClient($client)
    {
        $this->client = $client;

        return $this;
    }

    public function __get($name)
    {
        if (! isset($this->$name)) {
            $class_name = ucfirst($name);
            $application = "\\Shishaoqi\\MeituanFlashPurchase\\Request\\{$class_name}";
            if (! class_exists($application)) {
                throw new Exception($class_name.'不存在');
            }
            $this->$name = new $application($this->config, $this->client);
        }

        return $this->$name;
    }
}
