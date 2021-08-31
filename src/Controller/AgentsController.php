<?php

namespace App\Controller;

use App\Repository\AgentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgentsController extends AbstractController
{
    /**
     * @Route("/agents", name="agents")
     */
    public function index(AgentsRepository $agentsRepository): Response
    {
        $agents = $agentsRepository->findAll();
        return $this->render('agents/index.html.twig', [
            'agents' => $agents,
        ]);
    }
}
