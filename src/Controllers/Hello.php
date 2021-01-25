<?php

namespace Notes\Controllers;

Class Hello
{
    private $c;

    public function __construct($c)
    {
        //
        $this->c = $c;
    }

    public function index($request, $response, $args)
    {
        $name = $request->getAttribute('name');

        $sec_name = $this->c->session->t6;

        $response->getBody()->write("Bye, ${name}, ${sec_name}");

        return $response;
    }
}
