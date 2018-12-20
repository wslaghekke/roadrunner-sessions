<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SessionTestController
{
    /**
     * @Route("/")
     * @Template("counter.html.twig")
     *
     * @param Request $request
     * @return array
     */
    public function counter(Request $request)
    {
        $session = $request->getSession();
        if ($session === null) {
            throw new \RuntimeException('Failed to get session');
        }
        $counter = $session->get('counter', 0);
        $session->set('counter', $counter + 1);
        return ['counter' => $counter, 'session' => $session->getId()];
    }

}