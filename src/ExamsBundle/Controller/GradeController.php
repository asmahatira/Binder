<?php

namespace ExamsBundle\Controller;

use ExamsBundle\Entity\grade;
use ExamsBundle\Form\gradeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GradeController extends Controller
{
    public function readAction() {
        $listgrades= $this->getDoctrine()->getManager()->getRepository(grade::class)->findAll();
        return ($this->render('@Exams/grade/liste.html.twig',array("listgrades" =>$listgrades)));
    }
    public function createAction(Request $request){
        $grade = new grade();
        $form = $this->createForm(gradeType::class, $grade);
        $form = $form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($grade);
            $em->flush();
            return $this->redirectToRoute('affichebackgrades');
        }
        return $this->render('@Exams/grade/create.html.twig',array('form'=>$form->createView()));
    }
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $grade = $em->getRepository(grade::class)->find($id);
        $form=$this->createForm(gradeType::class,$grade);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $ef=$this->getDoctrine()->getManager();
            $ef->persist($grade);
            $ef->flush();
            return $this->redirectToRoute('affichebackgrades');
        }
        return $this->render('@Exams/grade/update.html.twig', array('form' => $form->createView()));
    }
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $grade = $em->getRepository(grade::class)->find($id);
        $em->remove($grade);
        $em->flush();
        return $this->redirectToRoute("affichegrades");
    }
}
