<?php

namespace App\PortalBundle\Event;

use App\PortalBundle\Entity\Movie;
use Symfony\Component\EventDispatcher\Event;

class MovieEvent extends Event
{
    /**
     * @var Movie
     */
    protected $movie;

    /**
     * @param Movie $movie
     */
    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    /**
     * @return Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }
} 