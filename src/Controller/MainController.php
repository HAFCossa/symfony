<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BlogRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * 
     * @param BlogRepository $blogRepository
     *
     * @return Response
     */
    public function index(BlogRepository $blogRepository)
    {
        return $this->render('list.html.twig', ['blogs' => $blogRepository->findAll()]);
    }


    /**
     * @Route("/create", name="app_main_createblog")
     * @param Request $request
     *
     * @return Response
     */
    public function createBlog(Request $request)
    {
        
        $form = $this->createForm(BlogFormType::class, new Blog());

        return $this->render('create.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
}