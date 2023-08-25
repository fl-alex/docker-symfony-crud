<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\Employee;
use App\Form\EmployeeType;
use App\Repository\CompanyRepository;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

#[Route('/employee')]
class EmployeeController extends AbstractController
{
    #[Route('/', name: 'app_employee_index', methods: ['GET'])]
    public function index(EmployeeRepository $employeeRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('employee/index.html.twig', [
            'employees' => $employeeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_employee_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $employee = new Employee();
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($employee);
            $entityManager->flush();

            return $this->redirectToRoute('app_employee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employee/new.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }

    #[Route('/new_from/{id}', name: 'app_employee_new_from', methods: ['GET', 'POST'])]
    public function new_from(Request $request, EntityManagerInterface $entityManager, CompanyRepository $companyRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $employee = new Employee();

        $form = $this->createFormBuilder()
            ->add('name')
            ->add('company', EntityType::class,[
                'class'=>Company::class,
                'data'=>$companyRepository->find($request->get('id'))
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $employee->setName($form->getData()['name']);
            $employee->setCompany($form->getData()['company']);
            $entityManager->persist($employee);
            $entityManager->flush();

            return $this->redirectToRoute('app_company_edit', ['id'=>$employee->getCompany()->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employee/new.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employee_show', methods: ['GET'])]
    public function show(Employee $employee): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('employee/show.html.twig', [
            'employee' => $employee,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_employee_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employee $employee, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_employee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employee/edit.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employee_delete', methods: ['POST'])]
    public function delete(Request $request, Employee $employee, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if ($this->isCsrfTokenValid('delete'.$employee->getId(), $request->request->get('_token'))) {
            $entityManager->remove($employee);
            $entityManager->flush();
        }

     return $this->redirectToRoute('app_employee_index', [], Response::HTTP_SEE_OTHER);


    }

    #[Route('/delfrom/{id}', name: 'app_employee_delete_from', methods: ['GET','POST'])]
    public function delete_from(Request $request, Employee $employee, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if ($this->isCsrfTokenValid('delete'.$employee->getId(), $request->request->get('_token'))) {
            $entityManager->remove($employee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_company_edit', ['id'=>$employee->getCompany()->getId()], Response::HTTP_SEE_OTHER);
    }

}
