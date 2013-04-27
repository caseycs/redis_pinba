<?php
namespace RedisPinba;

class RedisPinba
{
    private $Redis;

    public function __construct()
    {
        $this->Redis = new \Redis;
    }

    public function __call($method, $args)
    {
        $tags = array('group' => 'redis', 'op' => $method);
        $data = array('args' => json_encode($args));
        $timer = pinba_timer_start($tags);
        $result = call_user_func_array(array($this->Redis, $method), $args);
        pinba_timer_stop($timer);
        return $result;
    }
}
