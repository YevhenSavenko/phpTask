<?php

namespace Core;

class Model
{
    protected $params = [];

    public function render(string $viewPage, array $data = [])
    {
        extract($data);

        $fileViewPath = VIEWS_DIR . "pages/{$viewPage}.view.php";
        require_once VIEWS_DIR . 'layout/master.view.php';
    }

    public function set($key, $value)
    {
        $this->params[$key] = $value;
    }

    public function get($key)
    {
        return $this->params[$key];
    }
}
