<?php

namespace App\Type\Request;

use Symfony\Component\Validator\Constraints as Assert;

class ExampleRequest
{
    /**
     * @var string|null
     * @Assert\Choice({"working", "not_working"})
     * @Assert\NotBlank()
     */
    public $server;
}
