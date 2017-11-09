<?php
/**
 * Created by PhpStorm.
 * User: Jindun
 * Date: 16/03/2017
 * Time: 16:06
 */

namespace UsersBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UsersBundle\Entity\Document;
use UsersBundle\Entity\Question;
use UsersBundle\Form\DocumentType;
use UsersBundle\Form\QuestionType;



/**
 * Document controller.
 *
 */
class DocumentController extends FOSRestController
{
    /**Get all the documents
     * @return array
     * @View()
     * @Get("/document")
     */
    public function getDocumentAction()
    {

        $document = $this->getDoctrine()->getRepository("UsersBundle:Document")
            ->findAll();

        return array('document' => $document);
    }

    /**
     * Create a new Document
     * @var Request $request
     * @return View|array
     *
     * @View()
     * @Post("/document")
     */
    public function postDocumentAction(Request $request)
    {

        $document = new Document();
        $form = $this->createForm(new DocumentType(), $document);
        $form->handleRequest($request);


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($document);
            $em->flush();

            return array("document" => $document);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Get a document by name
     * @param string $name
     * @return array
     *
     * @View()
     * @Get("/document/{name}")
     */
    public function getDocumentByNameAction($name)
    {

        $document = $this->getDoctrine()->getRepository('UsersBundle:Document')->findOneBy(['name' => $name]);
        return array('document' => $document);
    }


}
