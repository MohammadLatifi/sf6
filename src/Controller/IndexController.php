<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(PostRepository $postRepository): Response
    {
        return $this->render('components/index.html.twig', [
            'posts' => $postRepository->findAll(),
        ]);
    }
}
