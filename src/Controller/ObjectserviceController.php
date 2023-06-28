<?php

namespace App\Controller;

use App\Entity\Objectservice;
use App\Form\ObjectserviceType;
use App\Repository\ObjectserviceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/objectservice')]
class ObjectserviceController extends AbstractController
{
    #[Route('/', name: 'app_objectservice_index', methods: ['GET'])]
    public function index(ObjectserviceRepository $objectserviceRepository): Response
    {
        return $this->render('objectservice/index.html.twig', [
            'objectservices' => $objectserviceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_objectservice_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ObjectserviceRepository $objectserviceRepository): Response
    {
        $objectservice = new Objectservice();
        $form = $this->createForm(ObjectserviceType::class, $objectservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectserviceRepository->save($objectservice, true);

            return $this->redirectToRoute('app_objectservice_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('objectservice/new.html.twig', [
            'objectservice' => $objectservice,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_objectservice_show', methods: ['GET'])]
    public function show(Objectservice $objectservice): Response
    {
        return $this->render('objectservice/show.html.twig', [
            'objectservice' => $objectservice,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_objectservice_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Objectservice $objectservice, ObjectserviceRepository $objectserviceRepository): Response
    {
        $form = $this->createForm(ObjectserviceType::class, $objectservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectserviceRepository->save($objectservice, true);

            return $this->redirectToRoute('app_objectservice_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('objectservice/edit.html.twig', [
            'objectservice' => $objectservice,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_objectservice_delete', methods: ['POST'])]
    public function delete(Request $request, Objectservice $objectservice, ObjectserviceRepository $objectserviceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objectservice->getId(), $request->request->get('_token'))) {
            $objectserviceRepository->remove($objectservice, true);
        }

        return $this->redirectToRoute('app_objectservice_index', [], Response::HTTP_SEE_OTHER);
    }
}
