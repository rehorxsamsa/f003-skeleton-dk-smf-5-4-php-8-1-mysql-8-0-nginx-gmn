<?php

namespace App\Controller;

use App\Entity\Operation;
use App\Model\Calculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Kontroler kalkulačky.
 * @package App\Controller
 */
class CalculatorController extends AbstractController
{
    /**
     * Výchozí vykreslovací metoda tohoto kontroleru.
     * @param Request    $request    HTTP požadavek
     * @param Calculator $calculator Model pro práci s operacemi kalkulačky.
     * @return Response HTTP odpověď
     * @Route("/", name="homepage")
     */
    public function index(Request $request, Calculator $calculator): Response
    {
        $calculatorForm = $this->createFormBuilder(new Operation())
            ->add('operation', ChoiceType::class, [
                'label' => 'Operace:',
                'choices' => $calculator->getOperations(),
                'expanded' => true,
                'multiple' => false
            ])
            ->add('x', null, ['label' => 'První číslo:'])
            ->add('y', null, ['label' => 'Druhé číslo:'])
            ->add('calculate', SubmitType::class, ['label' => 'Spočítej výsledek'])
            ->getForm();

        // Zpracování formuláře kalkulačky.
        $calculatorForm->handleRequest($request);
        if ($calculatorForm->isSubmitted() && $calculatorForm->isValid())
            $result = $calculator->calculate($calculatorForm->getData());

        // Vykreslení šablony s předáním formuláře a proměnné výsledku.
        return $this->render('calculator/index.html.twig', [
            'calculatorForm' => $calculatorForm->createView(),
            'result' => isset($result) ? $result : null
        ]);
    }
}