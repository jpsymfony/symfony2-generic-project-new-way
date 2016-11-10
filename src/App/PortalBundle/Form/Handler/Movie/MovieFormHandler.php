<?php
namespace App\PortalBundle\Form\Handler\Movie;

use App\PortalBundle\Entity\Manager\Interfaces\MovieManagerInterface;
use App\PortalBundle\Services\ManagerService;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use App\PortalBundle\Entity\Movie;

class MovieFormHandler
{
    /**
     * @var string
     */
    private $message = "";

    /**
     * @var FormInterface $form
     */
    protected $form;

    /**
     * @var ManagerService $managerService
     */
    private $managerService;

    /**
     * @var MovieFormHandlerStrategy $movieFormHandlerStrategy
     */
    private $movieFormHandlerStrategy;

    /**
     * @var MovieFormHandlerStrategy $newActorFormHandlerStrategy
     */
    protected $newMovieFormHandlerStrategy;

    /**
     * @var MovieFormHandlerStrategy $updateActorFormHandlerStrategy
     */
    protected $updateMovieFormHandlerStrategy;

    /**
     * @var MovieManagerInterface $movieManager
     */
    protected $movieManager;

    public function setNewMovieFormHandlerStrategy(MovieFormHandlerStrategy $nafhs) {
        $this->newMovieFormHandlerStrategy = $nafhs;
    }

    public function setUpdateMovieFormHandlerStrategy(MovieFormHandlerStrategy $uafhs) {
        $this->updateMovieFormHandlerStrategy = $uafhs;
    }

    public function setManagerService(ManagerService $managerService)
    {
        $this->managerService = $managerService;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Movie|null $movie
     * @return Movie
     */
    public function processForm(Movie $movie = null)
    {
        if (is_null($movie)) {
            $movie = new Movie();
            $this->movieFormHandlerStrategy = $this->newMovieFormHandlerStrategy;
        } else {
            $this->movieFormHandlerStrategy = $this->updateMovieFormHandlerStrategy;
        }

        $this->form = $this->createForm($movie);

        return $movie;
    }

    /**
     * @param Movie $movie
     * @return FormInterface
     */
    public function createForm(Movie $movie)
    {
        return $this->movieFormHandlerStrategy->createForm($movie);
    }

    /**
     * @param FormInterface $form
     * @param Movie $movie
     * @param Request $request
     * @return bool
     */
    public function handleForm(FormInterface $form, Movie $movie, Request $request)
    {
        if (
            (null === $movie->getId() && $request->isMethod('POST'))
            || (null !== $movie->getId() && $request->isMethod('PUT'))
        ) {
            $originalHashTags = new ArrayCollection();

            // Create an ArrayCollection of the current Tag objects in the database
            foreach ($movie->getHashTags() as $tag) {
                $originalHashTags->add($tag);
            }

            $form->handleRequest($request);

            if (!$form->isValid()) {
                return false;
            }

            $this->message = $this->movieFormHandlerStrategy->handleForm($request, $movie, $originalHashTags);

            return true;
        }
    }

    /**
     * @param FormInterface $form
     * @param Request $request
     * @throws \Exception
     */
    public function handleSearchForm(FormInterface $form, Request $request)
    {
        $attributes = $request->attributes->all();

        foreach ($attributes as $key => $val) {
            if (!empty($val)) {
                // title, description, releaseDateFrom, releaseDateTo
                if (in_array($key, Movie::getLikeFieldsSearchForm())) {
                    $form->get($key)->setData($val);
                    continue;
                }

                // hashTags, actors
                if (in_array($key, Movie::getCollectionFields())) {
                    $normalizedKey = Movie::getManagerName($key);
                    $objectManager = $this->managerService->getManagerClass($normalizedKey . 'Manager');
                    foreach($val as $keyCollection => $valCollection) {
                        $attributes[$key][$keyCollection] = $objectManager->find($valCollection);
                    }
                    $form->get($key)->setData($attributes[$key]);
                    continue;
                }

                // category
                if (in_array($key, Movie::getObjectFields())) {
                    $objectManager = $this->managerService->getManagerClass($key . 'Manager');
                    $object = $objectManager->find($val);
                    $form->get($key)->setData($object);
                    continue;
                }
            }
        }
    }

    /**
     * @return FormInterface
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @return mixed
     */
    public function createView()
    {
        return $this->movieFormHandlerStrategy->createView();
    }
}
