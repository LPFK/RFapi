<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RecetteRepository;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Annotation\Groups;

class RecetteController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'APIController',
        ]);
    }

    /**
     * @Route("/api/recette", name="Recettes")
     */
    public function afficherListeRecettes(RecetteRepository $paraRecetReposi,
     NormalizerInterface $paraNormaliseur):Response
    {
        $recettes = $paraRecetReposi->findAll();
        $normalise = $paraNormaliseur->normalize($recettes, null, [ "groups"=>("recette:read")]);
        $json = json_encode($normalise);
        $reponse = new Response(
            $json, 200, 
            ['content-type' => 'application/json']
        );
        return $reponse;
    }

    /**
     * @Route("/api/recette/{id}", name="Recette")
     */
    public function afficherRecette(RecetteRepository $paraRecetReposi, $id, 
    NormalizerInterface $paraNormaliseur):Response
    {
        $recette = $paraRecetReposi->find($id);
        $normalise = $paraNormaliseur->normalize($recette, null, [ "groups"=>("recette:read")]);
        $json = json_encode($normalise);
        $reponse = new Response(
            $json, 200, 
            ['content-type' => 'application/json']
        );
        return $reponse;
    }
}
