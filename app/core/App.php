<?php
class App
{

    protected $controller = "login";
    protected $action = "index";
    protected $params = [];

    function __construct()
    {
        $arr = $this->UrlProcess();
        unset($arr[0]);
        if (!isset($arr[1])) {
            $arr[1] = $this->controller;
        }
        if (file_exists("./app/controllers/" . $arr[1] . ".php")) {
            $this->controller = $arr[1];
            unset($arr[1]);
        }
        require_once "./app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;
        if (isset($arr[2])) {
            if (method_exists($this->controller, $arr[2])) {
                $this->action = $arr[2];
            }
            unset($arr[1]);
        }
        $this->params = $arr ? array_values($arr) : [];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
    function UrlProcess()
    {
        if (isset($_SERVER["REQUEST_URI"])) {
            return explode("/", filter_var(trim($_SERVER["REQUEST_URI"], "/")));
        }
    }
}
