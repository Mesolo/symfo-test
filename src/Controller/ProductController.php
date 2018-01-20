<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $p = new Product();
        $p->setName('Tazzina Caffè');
        $p->setPrice(5.59);
        $p->setDescription('Di vetro con manico in metallo, comfy!');

        $em->persist($p);

        $em->flush();

        return new Response('Prodotto salvato, id: ' . $p->getId());
    }

    /**
     * @Route("/product/{id}", name="product_show")
     * @param Product $product
     * @throws NotFoundHttpException
     * @return Response
     */
    public function showAction(Product $product)
    {
        if (!$product)
            throw $this->createNotFoundException('Nessun prodotto trovato per id ' . $product->getId());

        return $this->render('product.show.html.twig', ['product' => $product]);
    }
}
