<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/")
     */
    public function index()
    {
        $number = mt_rand(5, 100);

        return $this->render('index.html.twig', [
            'number' => $number
        ]);
    }
}
