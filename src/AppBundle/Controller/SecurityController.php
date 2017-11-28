<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="app_login")
     * @Method("GET")
     */
    public function loginAction(Request $request)
    {
        return $this->render('login.html.twig');
    }

    /**
     * @Route("/login", name="app_login_check")
     * @Method("POST")
     */
    public function loginCheckAction()
    {
        // this action will never be executed
    }

    /**
     * @Route("/logout", name="app_logout")
     * @Method("GET")
     */
    public function logoutAction()
    {
        // this action will never be executed
    }
}
