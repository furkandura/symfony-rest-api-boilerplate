<?php

namespace App\Controller;

use App\Type\Request\ExampleRequest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Validator\ConstraintViolationListInterface;


class DefaultController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("", name="index")
     * @ParamConverter("exampleRequest", class="App\Type\Request\ExampleRequest", converter="fos_rest.request_body")
     */
    public function index(
        ExampleRequest $exampleRequest,
        ConstraintViolationListInterface $validationErrors
    ): View
    {
        if ($validationErrors->count()) return View::create($validationErrors);

        return View::create($exampleRequest);
    }
}
