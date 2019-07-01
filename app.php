<?php

use Caramel\Web;

defined('ROOT') or define('ROOT', getcwd());

class Application extends Web\Application
{
    public function __construct()
    {
        $handlers = [
            ["/", "Index"],
        ];

        $settings = [
            "cookie_secret" => "aa415e08c848376f65bae594d4829d1e3978fa05"
        ];

        parent::__construct($handlers, "", null, $settings);
    }
}

class Index extends Web\RequestHandler
{
    public function get($args, $kargs)
    {
        $this->write("<h1>Hello, World!</h1>");
    }
}
