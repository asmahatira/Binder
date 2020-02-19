<?php

namespace ExamsBundle\Controller;

use ExamsBundle\Entity\exam;

use ExamsBundle\Form\examType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ExamController extends Controller
{



    public function readAction() {
        $listexams= $this->getDoctrine()->getManager()->getRepository(exam::class)->findAll();
        return ($this->render('@Exams/exam/listeforback.html.twig',array("listexams" =>$listexams)));
    }
    public function readerAction() {
        $listexams= $this->getDoctrine()->getManager()->getRepository(exam::class)->findAll();
        return ($this->render('@Exams/exam/liste.html.twig',array("listexams" =>$listexams)));
    }

    public function createAction(Request $request){
        $exam = new exam();
        $form = $this->createForm(examType::class, $exam);
        $form = $form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($exam);
            $em->flush();
            return $this->redirectToRoute('affichebackexams');
        }
        return $this->render('@Exams/exam/create.html.twig',array('form'=>$form->createView()));
    }
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $exam = $em->getRepository(exam::class)->find($id);
        $form=$this->createForm(examType::class,$exam);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $ef=$this->getDoctrine()->getManager();
            $ef->persist($exam);
            $ef->flush();
            return $this->redirectToRoute('affichebackexams');
        }
        return $this->render('@Exams/exam/update.html.twig', array('form' => $form->createView()));
    }
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $exam = $em->getRepository(exam::class)->find($id);
        $em->remove($exam);
        $em->flush();
        return $this->redirectToRoute("affichebackexams");
    }
}
