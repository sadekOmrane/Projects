<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Food;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $categRepository = $this->getDoctrine()->getRepository(Category::class);
        $FoodRepository = $this->getDoctrine()->getRepository(Food::class);
        $categories = $categRepository->findAll();
        $foods = $FoodRepository->findAll();
        return $this->render('home/index.html.twig', ['categories' => $categories, 'foods' => $foods]);
    }
}
