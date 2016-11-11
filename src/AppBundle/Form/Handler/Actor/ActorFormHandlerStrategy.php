<?php
namespace AppBundle\Form\Handler\Actor;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Actor;

interface ActorFormHandlerStrategy
{
    public function handleForm(Request $request, Actor $actor);

    public function createForm(Actor $actor);

    public function createView();
}
