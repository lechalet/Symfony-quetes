<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Form\CategoryType;
/**
 * @Route("/category", name="category_")
 */
Class CategoryController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     * @return Response
     */
    public function add(Request $request): Response
    {
        $category = new Category();
        $form = $this->createForm(
            CategoryType::class
        );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $newCategory = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newCategory);
            $entityManager->flush();
            return $this->redirectToRoute('wild_index');
        }
        return $this->render('form/addcategory.html.twig', [
            'categoryForm' => $form->createView()
        ]);
    }
}
