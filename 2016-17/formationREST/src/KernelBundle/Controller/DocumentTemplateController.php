<?php

namespace KernelBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use KernelBundle\Entity\DocumentTemplate;
use KernelBundle\Form\DocumentTemplateType;

class DocumentTemplateController extends FOSRestController
{

    /**
     * Get all the templates
     * @return array
     *
     * @ApiDoc(
     *  section="DocumentTemplate",
     *  description="Get all templates",
     *  statusCodes={
     *         200="Returned when successful"
     *  },
     *  tags={
     *   "stable" = "#4A7023",
     *   "need validations" = "#ff0000"
     *  }
     * )
     *
     * @View()
     * @Get("/templates")
     */
    public function getDocumentTemplatesAction()
    {

        $templates = $this->getDoctrine()->getRepository("KernelBundle:DocumentTemplate")
            ->findAll();

        return array('templates' => $templates);
    }

    /**
     * Get a template by ID
     * @param DocumentTemplate $template
     * @return array
     *
     * @ApiDoc(
     *  section="DocumentTemplate",
     *  description="Get a template",
     *  requirements={
     *      {
     *          "name"="template",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="template id"
     *      }
     *  },
     *  statusCodes={
     *         200="Returned when successful"
     *  },
     *  tags={
     *   "stable" = "#4A7023",
     *   "need validations" = "#ff0000"
     *  }
     * )
     *
     * @View()
     * @ParamConverter("template", class="KernelBundle:DocumentTemplate")
     * @Get("/template/{id}", requirements={"id" = "\d+"})
     */
    public function getDocumentTemplateAction(DocumentTemplate $template)
    {

        return array('template' => $template);

    }

    /**
     * Get a template by label
     * @param string $label
     * @return array
     *
     * @ApiDoc(
     *  section="DocumentTemplate",
     *  description="Get a template",
     *  requirements={
     *      {
     *          "name"="label",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="template label"
     *      }
     *  },
     *  statusCodes={
     *         200="Returned when successful"
     *  },
     *  tags={
     *   "stable" = "#4A7023",
     *   "need validations" = "#ff0000"
     *  }
     * )
     *
     * @View()
     * @Get("/template/{label}")
     */
    public function getDocumentTemplateByLabelAction($label)
    {

        $template = $this->getDoctrine()->getRepository('KernelBundle:DocumentTemplate')->findOneBy(['label' => $label]);
        return array('template' => $template);

    }

    /**
     * Create a new DocumentTemplate
     * @var Request $request
     * @return View|array
     *
     * @ApiDoc(
     *  section="DocumentTemplate",
     *  description="Create a new DocumentTemplate",
     *  input="KernelBundle\Form\DocumentTemplateType",
     *  output="KernelBundle\Entity\DocumentTemplate",
     *  statusCodes={
     *         200="Returned when successful"
     *  },
     *  tags={
     *   "stable" = "#4A7023",
     *   "need validations" = "#ff0000"
     *  },
     *  views = { "premium" }
     * )
     *
     * @View()
     * @Post("/template")
     */
    public function postDocumentTemplateAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $template = new DocumentTemplate();
        $form = $this->createForm(new DocumentTemplateType(), $template);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($template);
            $em->flush();

            return array("template" => $template);

        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Edit a DocumentTemplate
     * Put action
     * @var Request $request
     * @var DocumentTemplate $template
     * @return array
     *
     * @ApiDoc(
     *  section="DocumentTemplate",
     *  description="Edit a DocumentTemplate",
     *  requirements={
     *      {
     *          "name"="template",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="template id"
     *      }
     *  },
     *  input="KernelBundle\Form\DocumentTemplateType",
     *  output="KernelBundle\Entity\DocumentTemplate",
     *  statusCodes={
     *         200="Returned when successful"
     *  },
     *  tags={
     *   "stable" = "#4A7023",
     *   "need validations" = "#ff0000"
     *  },
     *  views = { "premium" }
     * )
     *
     * @View()
     * @ParamConverter("template", class="KernelBundle:DocumentTemplate")
     * @Post("/template/{id}")
     */
    public function putDocumentTemplateAction(Request $request, DocumentTemplate $template)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $form = $this->createForm(new DocumentTemplateType(), $template);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($template);
            $em->flush();

            return array("template" => $template);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Delete a DocumentTemplate
     * Delete action
     * @var DocumentTemplate $template
     * @return array
     *
     * @View()
     * @ParamConverter("template", class="KernelBundle:DocumentTemplate")
     * @Delete("/template/{id}")
     */
    public function deleteDocumentTemplateAction(DocumentTemplate $template)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $em = $this->getDoctrine()->getManager();
        $em->remove($template);
        $em->flush();

        return array("status" => "Deleted");
    }

}