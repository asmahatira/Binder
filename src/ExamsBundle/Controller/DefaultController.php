<?php

namespace ExamsBundle\Controller;

use Knp\Component\Pager\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Exams\Default\index.html.twig');
    }
    public function listAction(Request $request) {
        $em= $this->getDoctrine()->getManager();
       // $listofexams= $em ->getRepository('ExamsBundle:exam')->findAll();
        $dql = "SELECT ex FROM ExamsBundle:exam ex";
        $query = $em->createQuery($dql);
        /**
         * @var $paginator Paginator
         */
        $paginator= $this->get('knp_paginator');
        $result=$paginator->paginate(
            $query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',2)
        );
        return $this->render('@Exams\exam\listeforback.html.twig', array('pagination'=>$result)

        );
    }
    public function listgradesAction(Request $request) {
        $em= $this->getDoctrine()->getManager();
        // $listofexams= $em ->getRepository('ExamsBundle:exam')->findAll();
        $dql = "SELECT ex FROM ExamsBundle:grade ex";
        $query = $em->createQuery($dql);
        /**
         * @var $paginator Paginator
         */
        $paginator= $this->get('knp_paginator');
        $result=$paginator->paginate(
            $query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );
        return $this->render('@Exams\grade\listforback.html.twig', array('pagination'=>$result)

        );
    }
}
