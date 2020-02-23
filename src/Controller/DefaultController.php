<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function home() {
        return $this->render('default/homepage.html.twig');
    }

    /**
     * @Route("/contact", name="contact_page")
     */
    public function contact() {
        return $this->render('default/contact.html.twig');
    }

    /**
     * @Route("/not-i18n", name="not_i18n_page", options={"i18n"=false})
     */
    public function noti18n() {
        return $this->render('default/not_i18n.html.twig');
    }

    /**
     * @Route("/hi", name="hi_page", options={"i18n"=false}))
     */
    public function hi() {
        return new Response('hi');
    }
}
