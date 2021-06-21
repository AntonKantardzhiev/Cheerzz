<?php

namespace App\Controller;

use App\Entity\ShoppingCart;
use App\Entity\User;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShoppingCartController extends AbstractController
{
    #[Route('/shopping/cart', name: 'shopping_cart')]
    public function index(): Response
    {
        return $this->render('shopping_card/index.html.twig', [
            'controller_name' => 'ShoppingCardController',
        ]);
    }
    #[Route('my/shoppingcart', name: 'my_shopping_cart')]
    public function shoppingCard(ProductRepository $productRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var User $user */
        $user = $this->getUser();
        $products = $productRepository->findAll();

        $shoppingCard = new ShoppingCart($user);

        if($user->getSingleShoppingCart()){
            $shoppingCard = $user->getSingleShoppingCart();
        }


        return $this->render('shopping_card/index.html.twig', [
            'controller_name' => 'ShoppingCardController',
            'shopping_lines' => $shoppingCard->getShoppingLines(),
            'product' => $products,
            'shoppincart' => $shoppingCard

        ]);
    }


}