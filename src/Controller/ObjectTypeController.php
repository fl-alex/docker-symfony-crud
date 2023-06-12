<?php

namespace App\Controller;

use App\Entity\ObjectType;
use App\Form\ObjectTypeType;
use App\Repository\ObjectTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/object/type')]
class ObjectTypeController extends AbstractController
{
    #[Route('/', name: 'app_object_type_index', methods: ['GET'])]
    public function index(ObjectTypeRepository $objectTypeRepository): Response
    {
        return $this->render('object_type/index.html.twig', [
            'object_types' => $objectTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_object_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ObjectTypeRepository $objectTypeRepository): Response
    {
        $objectType = new ObjectType();
        $form = $this->createForm(ObjectTypeType::class, $objectType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectTypeRepository->save($objectType, true);

            return $this->redirectToRoute('app_object_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('object_type/new.html.twig', [
            'object_type' => $objectType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_object_type_show', methods: ['GET'])]
    public function show(ObjectType $objectType): Response
    {
        return $this->render('object_type/show.html.twig', [
            'object_type' => $objectType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_object_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ObjectType $objectType, ObjectTypeRepository $objectTypeRepository): Response
    {
        $form = $this->createForm(ObjectTypeType::class, $objectType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectTypeRepository->save($objectType, true);

            return $this->redirectToRoute('app_object_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('object_type/edit.html.twig', [
            'object_type' => $objectType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_object_type_delete', methods: ['POST'])]
    public function delete(Request $request, ObjectType $objectType, ObjectTypeRepository $objectTypeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objectType->getId(), $request->request->get('_token'))) {
            $objectTypeRepository->remove($objectType, true);
        }

        return $this->redirectToRoute('app_object_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
