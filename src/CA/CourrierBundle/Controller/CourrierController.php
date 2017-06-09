<?php

namespace CA\CourrierBundle\Controller;

use CA\CourrierBundle\Entity\Courrier;
use CA\CourrierBundle\Entity\Attribution;
use CA\CourrierBundle\Entity\AttributionUser;
use CA\CourrierBundle\Form\CourrierEditType;
use CA\CourrierBundle\Form\CourrierType;
use CA\CourrierBundle\Form\AttributionType;
use CA\CourrierBundle\Form\AttributionUserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CourrierController extends Controller
{
  public function indexAction($page, $type, $lu, $attribuated, $archived)
  {
    if ($page < 1) {
      throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    }
      
    $nbPerPage = 3;
    $listCourriers = $this->getDoctrine()
      ->getManager()
      ->getRepository('CACourrierBundle:Courrier')
      ->getCourriers($page, $nbPerPage, $type, $lu, $attribuated, $archived)
    ;
    $nbPages = ceil(count($listCourriers) / $nbPerPage);
    if ($page > $nbPages) {
      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    }

    return $this->render('CACourrierBundle:Courrier:index.html.twig', array(
      'listCourriers' => $listCourriers,
      'nbPages'       => $nbPages,
      'page'          => $page,
      'type'          => $type,
      'lu'            => $lu,
      'attribuated'   => $attribuated,
      'archived'      => $archived,
    ));
  }
  
  public function viewAction($id)
  {
    $em = $this->getDoctrine()->getManager();
      
    $courrier = $em->getRepository('CACourrierBundle:Courrier')->getCorrespondantWithCourrier($id);
    if (null === $courrier) {
      throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
    }
    
    $courrier->setLu(true);
    $em->flush();

    return $this->render('CACourrierBundle:Courrier:view.html.twig', array(
      'courrier'           => $courrier,
    ));
  }    

  public function addAction(Request $request)
  {
    $courrier = new Courrier();
    $form   = $this->get('form.factory')->create(CourrierType::class, $courrier);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($courrier);
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Courrier bien enregistré.');

      return $this->redirectToRoute('ca_courrier_view', array('id' => $courrier->getId()));
    }

    return $this->render('CACourrierBundle:Courrier:add.html.twig', array(
      'form' => $form->createView(),
    ));
  }
    
  public function editAction($id, Request $request)
  {
    $em = $this->getDoctrine()->getManager();

    $courrier = $em->getRepository('CACourrierBundle:Courrier')->getCorrespondantWithCourrier($id);

    if (null === $courrier) {
      throw new NotFoundHttpException("Le courrier d'id ".$id." n'existe pas.");
    }

    $form = $this->get('form.factory')->create(CourrierEditType::class, $courrier);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
      $courrier->setUpdatedAt(new \Datetime());
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Courrier bien modifié.');

      return $this->redirectToRoute('ca_courrier_view', array('id' => $courrier->getId()));
    }

    return $this->render('CACourrierBundle:Courrier:edit.html.twig', array(
      'courrier' => $courrier,
      'form'   => $form->createView(),
    ));
  }
    
  public function deleteAction(Request $request, $id)
  {
    $em = $this->getDoctrine()->getManager();

    $courrier = $em->getRepository('CACourrierBundle:Courrier')->find($id);

    if (null === $courrier) {
      throw new NotFoundHttpException("Le courrier d'id ".$id." n'existe pas.");
    }
    $form = $this->get('form.factory')->create();

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
      $em->remove($courrier);
      $em->flush();

      $request->getSession()->getFlashBag()->add('info', "Le courrier a bien été supprimé.");

      return $this->redirectToRoute('ca_courrier_home');
    }
    
    return $this->render('CACourrierBundle:Courrier:delete.html.twig', array(
      'courrier' => $courrier,
      'form'   => $form->createView(),
    ));
  }
    
  public function archiveAction(Request $request, $id)
  {
    $em = $this->getDoctrine()->getManager();

    $courrier = $em->getRepository('CACourrierBundle:Courrier')->find($id);

    if (null === $courrier) {
      throw new NotFoundHttpException("Le courrier d'id ".$id." n'existe pas.");
    }
    $form = $this->get('form.factory')->create();

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
      $courrier->setArchived(true);
      $em->flush();

      $request->getSession()->getFlashBag()->add('info', "Le courrier a bien été archivé.");

      return $this->redirectToRoute('ca_courrier_home');
    }
    
    return $this->render('CACourrierBundle:Courrier:delete.html.twig', array(
      'courrier' => $courrier,
      'form'   => $form->createView(),
    ));
  }
    
  public function attribuateAction(Request $request, $id)
  {
    $em = $this->getDoctrine()->getManager();

    $courrier = $em->getRepository('CACourrierBundle:Courrier')->find($id);
    $user = $this->get('security.token_storage')->getToken()->getUser();

    if (null === $courrier) {
      throw new NotFoundHttpException("Le courrier d'id ".$id." n'existe pas.");
    }
      
    $attribution = new Attribution();
    $attribution->setCourrier($courrier);
    $attribution->setAttributaire($user);
    //$em->persist($attribution);
    //$em->flush();
      
    $form   = $this->get('form.factory')->create(AttributionType::class, $attribution);
    
    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
      
      $em->persist($attribution);
      $em->flush();
    
      $request->getSession()->getFlashBag()->add('notice', 'Courrier bien attribué.');

      return $this->redirectToRoute('ca_courrier_view', array('id' => $courrier->getId()));
    }
    
    return $this->render('CACourrierBundle:Courrier:attribuate.html.twig', array(
      'form'           => $form->createView(),
    ));
  }
    
  public function listAttribuateAction($page, $type, $status, $archived)
  {
    if ($page < 1) {
      throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    }
    
    $user = $this->get('security.token_storage')->getToken()->getUser();
    
    $nbPerPage = 3;
    $data = $this->getDoctrine()
      ->getManager()
      //->getRepository('CACourrierBundle:AttributionUser')
      ->getRepository('CACourrierBundle:Courrier')
      ->getCourriersT($page, $nbPerPage, $type, $archived, $status, $user->getId());
      $test = count($data);
    $nbPages = ceil(count($data) / $nbPerPage);
    if ($page > $nbPages) {
      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    }

    return $this->render('CACourrierBundle:Courrier:indexAtt.html.twig', array(
      'data' => $data,
      'nbPages'       => $nbPages,
      'page'          => $page,
      'type'          => $type,
      'status'        => $status,
      'archived'      => $archived,
      'test'      => $test,
    ));
      
  }

}