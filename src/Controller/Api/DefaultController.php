<?php

namespace App\Controller\Api;

use App\Type\Request\ExampleRequest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Rest\Route("/api/default", name="api.default.")
 */
class DefaultController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("", name="index")
     * @Rest\View()
     * @ParamConverter("exampleRequest", class="App\Type\Request\ExampleRequest", converter="fos_rest.request_body")
     */
    public function index(
        ExampleRequest $exampleRequest
    ): ExampleRequest
    {
        return $exampleRequest;
    }
}
