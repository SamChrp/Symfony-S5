<?php

namespace App\Controller;

use App\Services\Slugify;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/slug', name: 'app_product_slug')]
    public function slugProducts(Slugify $slugify): Response
    {
        $texte = $slugify->generateSlug('Ceci est une phrase Slugigfiée');

        return $this->render('product/slug_products.html.twig', [
            'slug' => $texte,
        ]);
    }

    #[Route('/product', name: 'app_product_list')]
    public function listProducts(): Response
    {
        return $this->render('product/list.html.twig', [
        ]);
    }

    #[Route('/product/{id}', name: 'app_product_view')]
    public function viewProducts(int $id): Response
    {

        return $this->render('product/view_products.html.twig', [
            'id' => $id,
        ]);
    }

}
