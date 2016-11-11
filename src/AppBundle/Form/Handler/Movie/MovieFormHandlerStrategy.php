<?php
namespace AppBundle\Form\Handler\Movie;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Movie;

interface MovieFormHandlerStrategy
{
    public function handleForm(Request $request, Movie $movie, ArrayCollection $originalHashTags = null);

    public function createForm(Movie $movie);

    public function createView();
}
