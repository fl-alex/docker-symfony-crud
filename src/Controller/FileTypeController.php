<?php

namespace App\Controller;

use App\Entity\FileType;
use App\Form\FileTypeType;
use App\Repository\FileTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/filetype')]
class FileTypeController extends AbstractController

{

    #[Route('/', name: 'app_file_type_index', methods: ['GET'])]
    public function index(FileTypeRepository $fileTypeRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('file_type/index.html.twig', [
            'file_types' => $fileTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_file_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FileTypeRepository $fileTypeRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $fileType = new FileType();
        $form = $this->createForm(FileTypeType::class, $fileType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fileTypeRepository->save($fileType, true);

            return $this->redirectToRoute('app_file_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('file_type/new.html.twig', [
            'file_type' => $fileType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_file_type_show', methods: ['GET'])]
    public function show(FileType $fileType): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('file_type/show.html.twig', [
            'file_type' => $fileType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_file_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FileType $fileType, FileTypeRepository $fileTypeRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $form = $this->createForm(FileTypeType::class, $fileType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fileTypeRepository->save($fileType, true);

            return $this->redirectToRoute('app_file_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('file_type/edit.html.twig', [
            'file_type' => $fileType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_file_type_delete', methods: ['POST'])]
    public function delete(Request $request, FileType $fileType, FileTypeRepository $fileTypeRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if ($this->isCsrfTokenValid('delete'.$fileType->getId(), $request->request->get('_token'))) {
            $fileTypeRepository->remove($fileType, true);
        }

        return $this->redirectToRoute('app_file_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
