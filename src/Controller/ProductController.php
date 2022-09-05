<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="app_product")
     */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route("/addproduct", name="addproduct")
     */
    public function createProduct(ManagerRegistry $doctrire,ValidatorInterface $validator): Response
    {
        $entityManager= $doctrire->getManager();
       # $entityManager = $this>ManagerRegistry::class->getManager();
       # $entityManager= $this->getDoctrine()->getManager()
        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        $errors = $validator->validate($product);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }
        return new Response('Saved new product with id '.$product->getId());
    }

    /**
     * @Route("/updateproduct/{id}", name="updateproduct")
     */
    public function update(ManagerRegistry $doctrine, ProductRepository $repository, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $product= $doctrine->getRepository(Product::class)->find($id);
        #$product = $repository->find($id);
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $product->setName('New product name!');
        $entityManager->flush();
        return $this->redirectToRoute('addproduct', [
            'id' => $product->getId()
        ]);
    }

    /**
     * @Route("/deleteproduct/{id}", name="deleteproduct")
     */
    public function remove(ManagerRegistry $doctrine, $id){
        $entityManager= $doctrine->getManager();
        $product= $doctrine->getRepository(Product::class)->find($id);
        $entityManager->remove($product);
        $entityManager->flush();
        return new Response("Product deleted");
    }
}

