<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ProduceItem;
use App\Form\ProduceItemType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProduceController extends BaseController {

  /**
  * @Route("/new-item")
  */
  public function new(Request $request) {

    $item = new ProduceItem("", new \DateTime("today"), "");

    $form = $this->createForm(ProduceItemType::class, $item);

    $form->handleRequest($request);

    if($form->isSubmitted()) {
      $imageFile = $item->getIcon();

      $fileName = md5(uniqid()) . '.' . $imageFile->guessExtension();

      $rootDirPath = $this->get('kernel')->getRootDir() . '/../public/uploads';

      $imageFile->move($rootDirPath, $fileName);

      $item->setIcon($fileName);

      return new Response(
        '<html><body>New produce item was added: '. $item->getName(). ' on ' . $item->getExpirationDate()->format('Y-m-d') .
        ' Hashed file name: ' . $item->getIcon() . '<img src="/uploads/' . $item->getIcon() . '"/></body></html>'
      );
    }

    return $this->render('new-item.html.twig', ['item_form' => $form->createView()])

  }

}

 ?>
