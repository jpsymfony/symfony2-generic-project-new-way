<?php

namespace App\PortalBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Cookie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends Controller
{
    /**
     * Finds and displays a User entity.
     *
     * @Route("/changer-langue/{language}", name="change_langue")
     * @Method("GET")
     */
    public function chooseLanguageAction($language = null)
    {
        $dateExpire = time() + intVal(604800);

        if (null !== $language) {
            // On enregistre la langue en session
            $this->get('request_stack')->getCurrentRequest()->setLocale($language);
        }

        // on tente de rediriger vers la page d’origine
        $url = $this->get('request_stack')->getCurrentRequest()->headers->get('referer');

        if (empty($url)) {
            $url = $this->get('router')->generate('homepage');
        } else {
            if (!stristr($url, $this->get('request_stack')->getCurrentRequest()->getHttpHost())) {
                $this->createAccessDeniedException('Attack!!');
            }
        }

        $response = new RedirectResponse($url, 302);
        $response->headers->setCookie(new Cookie('_locale', $language, $dateExpire));

        return $response;
    }
}