<?php

namespace App\Controller;


use App\Entity\FleaMarket;
use App\Form\FleaMarketType;
use App\Repository\FleaMarketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FleaMarketController extends Controller
{

    /**
     * @Route("/flea-markets/list")
     * @return Response
     */
    public function list()
    {
        $repository = $this->getDoctrine()->getRepository(FleaMarket::class);
        $fleaMarkets = $repository->findAll();

        return $this->render('fleamarket/list.html.twig', array('list' => $fleaMarkets));
    }

    /**
     * @Route("/flea-markets/new")
     * @return Response
     */
    public function new(Request $request)
    {
        $fleaMarket = new FleaMarket();

        $form = $this->createForm(FleaMarketType::class, $fleaMarket);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fleaMarket = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fleaMarket);
            $entityManager->flush();

            return $this->redirectToRoute('list');
        }

        return $this->render('fleamarket/new.html.twig', array('form' => $form->createView()));
    }

}