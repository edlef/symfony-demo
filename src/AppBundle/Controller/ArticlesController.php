<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticlesController extends Controller
{
    /**
     * @Route("/admin/articles", name="articles_list")
     */
    public function listAction()
    {

        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAllOrderedByTitle();

        return $this->render('@App/articles/list.html.twig', ['articles' => $articles]);
    }

    /**
     * @Route("/admin/article/{id}", name="article_detail", requirements={"id" = "\d+"})
     * @param $id
     * @return Response
     */
    public function detailAction($id)
    {

        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findOneById($id);

        return $this->render('@App/articles/detail.html.twig', ['article' => $article]);
    }

    /**
     * @Route("/admin/article/add", name="article_add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function addAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            $this->addFlash(
                'notice',
                'Article successfully added!'
            );

            return $this->redirectToRoute('articles_list');
        }

        return $this->render('@App/articles/add.html.twig', array(
            'form'  => $form->createView(),
            'title' => 'Add'
        ));
    }

    /**
     * @Route("/admin/article/edit/{id}", name="article_edit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editAction(Request $request, $id)
    {
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findOneById($id);

        if ($article === null) {

            $this->addFlash(
                'notice',
                'Article not found!'
            );
            return $this->redirectToRoute('articles_list');

        }

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash(
                'notice',
                'Article successfully edited!'
            );

            return $this->redirectToRoute('articles_list');
        }

        return $this->render('@App/articles/add.html.twig', array(
            'form'  => $form->createView(),
            'title' => 'Edit'
        ));
    }

    /**
     * @Route("/admin/article/remove/{id}", name="article_remove", requirements={"id" = "\d+"})
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function removeAction($id)
    {

        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findOneById($id);

        if ($article === null) {

            $this->addFlash(
                'notice',
                'Article not found!'
            );
            return $this->redirectToRoute('articles_list');

        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($article);
        $em->flush();

        $this->addFlash(
            'notice',
            'Article successfully deleted!'
        );

        return $this->redirectToRoute('articles_list');
    }

}
