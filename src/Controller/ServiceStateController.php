<?php

namespace App\Controller;

use App\Entity\ServiceState;
use App\Form\ServiceStateType;
use App\Repository\ServiceStateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/service/state')]
class ServiceStateController extends AbstractController
{
    #[Route('/', name: 'app_service_state_index', methods: ['GET'])]
    public function index(ServiceStateRepository $serviceStateRepository): Response
    {
        return $this->render('service_state/index.html.twig', [
            'service_states' => $serviceStateRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_service_state_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ServiceStateRepository $serviceStateRepository): Response
    {
        $serviceState = new ServiceState();
        $form = $this->createForm(ServiceStateType::class, $serviceState);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $serviceStateRepository->save($serviceState, true);

            return $this->redirectToRoute('app_service_state_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('service_state/new.html.twig', [
            'service_state' => $serviceState,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_service_state_show', methods: ['GET'])]
    public function show(ServiceState $serviceState): Response
    {
        return $this->render('service_state/show.html.twig', [
            'service_state' => $serviceState,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_service_state_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ServiceState $serviceState, ServiceStateRepository $serviceStateRepository): Response
    {
        $form = $this->createForm(ServiceStateType::class, $serviceState);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $serviceStateRepository->save($serviceState, true);

            return $this->redirectToRoute('app_service_state_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('service_state/edit.html.twig', [
            'service_state' => $serviceState,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_service_state_delete', methods: ['POST'])]
    public function delete(Request $request, ServiceState $serviceState, ServiceStateRepository $serviceStateRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$serviceState->getId(), $request->request->get('_token'))) {
            $serviceStateRepository->remove($serviceState, true);
        }

        return $this->redirectToRoute('app_service_state_index', [], Response::HTTP_SEE_OTHER);
    }
}
