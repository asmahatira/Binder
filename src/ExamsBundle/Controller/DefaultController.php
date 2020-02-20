<?php

namespace ExamsBundle\Controller;

use Knp\Component\Pager\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function backindexAction()
    {
        return $this->render('@Exams\Default\homeback.html.twig');
    }
    public function indexAction()
    {
        return $this->render('@Exams\Default\index.html.twig');
    }
    public function listAction(Request $request) {
        $em= $this->getDoctrine()->getManager();
       // $listofexams= $em ->getRepository('ExamsBundle:exam')->findAll();
       // $dql = "SELECT ex FROM ExamsBundle:exam ex";
       // $query = $em->createQuery($dql);
        $queryBuilder = $em ->getRepository('ExamsBundle:exam')->createQueryBuilder('ex');
        $queryBuilder->where('ex.subject LIKE :subject or ex.date LIKE :date')
            ->setParameter('subject', '%' . $request->query->getAlnum('filter').'%')
        ->setParameter('date', '%' . $request->query->getAlnum('filter').'%');
        $query = $queryBuilder->getQuery();
        /**
         * @var $paginator Paginator
         */
        $paginator= $this->get('knp_paginator');
        $result=$paginator->paginate(
            $query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',3)
        );
        return $this->render('@Exams\exam\listeforback.html.twig', array('pagination'=>$result)

        );
    }
    public function listgradesAction(Request $request) {
        $em= $this->getDoctrine()->getManager();
        // $listofexams= $em ->getRepository('ExamsBundle:exam')->findAll();
       // $dql = "SELECT ex FROM ExamsBundle:grade ex";
       // $query = $em->createQuery($dql);
        $queryBuilder = $em->getRepository('ExamsBundle:grade')->createQueryBuilder('ex');
        $queryBuilder->where('ex.grade LIKE :grade ')
           // ->setParameter('teacher','%'.$request->query->getAlnum('filter').'%')
            //->setParameter('pupil','%'.$request->query->getAlnum('filter').'%')
            ->setParameter('grade','%'.$request->query->getAlnum('filter').'%');
            //->setParameter('examname','%'.$request->query->getAlnum('filter').'%');
        $query = $queryBuilder->getQuery();

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
