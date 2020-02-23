<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController
{
    /**
     * @Route("/contact")
     */
    public function number(Request $r)
    {
        $locale = $r->getLocale();

        return new Response(
            "<html><body>Locale=$locale</body></html>"
        );
    }
}
