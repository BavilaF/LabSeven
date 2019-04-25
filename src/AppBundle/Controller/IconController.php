<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Icon;
use App\Form\IconType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IconController extends BaseController {

  /**
  * @Route("/new-icon")
  */
  public function new(Request $request) {

    $item = new Icon("", new \DateTime("today"), "");

    $form = $this->createForm(IconType::class, $item);

    $form->handleRequest($request);

    if($form->isSubmitted()) {
      $imageFile = $item->getIcon();

      $fileName = md5(uniqid()) . '.' . $imageFile->guessExtension();

      $rootDirPath = $this->get('kernel')->getRootDir() . '/../public/uploads';

      $imageFile->move($rootDirPath, $fileName);

      $item->setIcon($fileName);

      return new Response(
        '<html><body>New produce item was added: ' . ' Hashed file name: ' . $item->getIcon()
        . '<img src="/uploads/' . $item->getIcon() . '"/></body></html>'
      );
    }

    return $this->render('new-icon.html.twig', ['icon_form' => $form->createView()])

  }

}

 ?>
