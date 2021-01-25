<?php

namespace Notes\Controllers;

Class Hello
{
    private $c;

    public function __construct($c)
    {
        $this->c = $c;
    }

    public function index($request, $response, $args)
    {
        $name = $request->getAttribute('name');

        $response->getBody()->write("Bye, $name");

        return $response;
    }
}
