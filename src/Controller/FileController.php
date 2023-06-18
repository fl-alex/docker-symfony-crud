<?php

namespace App\Controller;

use App\Entity\File;
use App\Form\FileType;
use App\Repository\FileRepository;
use App\Repository\EquipmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/file')]
class FileController extends AbstractController
{
    #[Route('/', name: 'app_file_index', methods: ['GET'])]
    public function index(FileRepository $fileRepository): Response
    {
        return $this->render('file/index.html.twig', [
            'files' => $fileRepository->findAll(),
        ]);
    }


    #[Route('/new', name: 'app_file_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FileRepository $fileRepository, SluggerInterface $slugger): Response
    {
        $file = new File();
        $form = $this->createForm(FileType::class, $file);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $myfile = $form->get('myfile')->getData();
            if ($myfile) {
                $originalFilename = pathinfo($myfile->getClientOriginalName(), PATHINFO_FILENAME);
                // це необхідно для безпечного включення імені файлу у якості частини URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$myfile->guessExtension();

                // Перемістіть файл в каталог, де зберігаються брошури
                try {
                    $myfile->move(
                        $this->getParameter('upload_files'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... розберіться з виключенням, якщо щось трапиться під час завантаження файлу
                }

                // оновлює властивість 'brochureFilename' для збереження імені PDF-файлу,
                // а не його змісту
                $file->setName($newFilename);
            }

            $fileRepository->save($file, true);

            return $this->redirectToRoute('app_file_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('file/new.html.twig', [
            'file' => $file,
            'form' => $form,
        ]);
    }

    #[Route('/new/{object_id}', name: 'app_file_new_from', methods: ['GET', 'POST'])]
    public function new_from(Request $request, FileRepository $fileRepository, SluggerInterface $slugger, EntityManagerInterface $entityManager, EquipmentRepository $equipmentRepository): Response
    {

        if ($request->get('object_id')){
            $object_id = $request->get('object_id');
        }
        $myobject = $equipmentRepository->find($object_id);
        $file = new File();
        $file->setEquipment($myobject);
        $form = $this->createForm(FileType::class, $file);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $myfile = $form->get('myfile')->getData();
            if ($myfile) {
                $originalFilename = pathinfo($myfile->getClientOriginalName(), PATHINFO_FILENAME);
                // це необхідно для безпечного включення імені файлу у якості частини URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$myfile->guessExtension();

                // Перемістіть файл в каталог, де зберігаються брошури
                try {
                    $myfile->move(
                        $this->getParameter('upload_files'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... розберіться з виключенням, якщо щось трапиться під час завантаження файлу
                }

                // оновлює властивість 'brochureFilename' для збереження імені PDF-файлу,
                // а не його змісту
                $file->setName($newFilename);
            }

            $fileRepository->save($file, true);

            return $this->redirectToRoute('app_file_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('file/new.html.twig', [
            'file' => $file,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_file_show', methods: ['GET'])]
    public function show(File $file): Response
    {
        return $this->render('file/show.html.twig', [
            'file' => $file,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_file_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, File $file, FileRepository $fileRepository): Response
    {
        $form = $this->createForm(FileType::class, $file);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fileRepository->save($file, true);

            return $this->redirectToRoute('app_file_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('file/edit.html.twig', [
            'file' => $file,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_file_delete', methods: ['POST'])]
    public function delete(Request $request, File $file, FileRepository $fileRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$file->getId(), $request->request->get('_token'))) {
            $fileRepository->remove($file, true);
        }

        return $this->redirectToRoute('app_file_index', [], Response::HTTP_SEE_OTHER);
    }
}
