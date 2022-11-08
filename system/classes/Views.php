<?php

class Views {

    function __construct() {
    }

    public function render($viewName, $data = []) {
        require '../application/views/' . $viewName . '.php';
    }
}