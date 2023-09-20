<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
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
