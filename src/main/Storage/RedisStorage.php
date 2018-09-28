<?php

namespace Chemisus\Storage;

use Redis;

class RedisStorage implements Storage
{
    /**
     * @var Redis
     */
    private $redis;

    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    public function get($key)
    {
        $value = $this->redis->get($key);

        if ($value === false) {
            throw new InvalidKeyException();
        }

        return $value;
    }

    public function put($key, $value)
    {
        $this->redis->set($key, $value);
    }

    public function remove($key)
    {
        $this->redis->delete($key);
    }
}