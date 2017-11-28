<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SidebarController extends Controller
{
    public function listLastUsersAction()
    {
        $users = [
            ['username' => 'Marge'],
            ['username' => 'Maggie'],
            ['username' => 'Homer'],
            ['username' => 'Bart'],
            ['username' => 'Liza'],
        ];

        shuffle($users);

        return $this->render('sidebar/users.html.twig', ['users' => $users]);
    }

    public function listLastGamesAction()
    {
        return $this->render('sidebar/games.html.twig');
    }
}
