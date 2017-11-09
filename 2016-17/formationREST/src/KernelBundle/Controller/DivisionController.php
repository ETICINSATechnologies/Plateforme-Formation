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
use KernelBundle\Entity\Division;
use KernelBundle\Form\DivisionType;

class DivisionController extends FOSRestController
{

    /**
     * Get all the divisions
     * @return array
     *
     * @ApiDoc(
     *  section="Division",
     *  description="Get all divisions",
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
     * @Get("/divisions")
     */
    public function getDivisionsAction()
    {

        $divisions = $this->getDoctrine()->getRepository("KernelBundle:Division")
            ->findAll();

        return array('divisions' => $divisions);
    }

    /**
     * Get a division by ID
     * @param Division $division
     * @return array
     *
     * @ApiDoc(
     *  section="Division",
     *  description="Get a division",
     *  requirements={
     *      {
     *          "name"="division",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="division id"
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
     * @ParamConverter("division", class="KernelBundle:Division")
     * @Get("/division/{id}", requirements={"id" = "\d+"})
     */
    public function getDivisionAction(Division $division)
    {

        return array('division' => $division);

    }

    /**
     * Get a division by label
     * @param string $label
     * @return array
     *
     * @ApiDoc(
     *  section="Division",
     *  description="Get a division",
     *  requirements={
     *      {
     *          "name"="label",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="division label"
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
     * @Get("/division/{label}")
     */
    public function getDivisionByLabelAction($label)
    {

        $division = $this->getDoctrine()->getRepository('KernelBundle:Division')->findOneBy(['label' => $label]);
        return array('division' => $division);

    }

    /**
     * Create a new Division
     * @var Request $request
     * @return View|array
     *
     * @ApiDoc(
     *  section="Division",
     *  description="Create a new Division",
     *  input="KernelBundle\Form\DivisionType",
     *  output="KernelBundle\Entity\Division",
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
     * @Post("/division")
     */
    public function postDivisionAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $division = new Division();
        $form = $this->createForm(new DivisionType(), $division);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($division);
            $em->flush();

            return array("division" => $division);

        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Edit a Division
     * Put action
     * @var Request $request
     * @var Division $division
     * @return array
     *
     * @ApiDoc(
     *  section="Division",
     *  description="Edit a Division",
     *  requirements={
     *      {
     *          "name"="division",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="division id"
     *      }
     *  },
     *  input="KernelBundle\Form\DivisionType",
     *  output="KernelBundle\Entity\Division",
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
     * @ParamConverter("division", class="KernelBundle:Division")
     * @Post("/division/{id}")
     */
    public function putDivisionAction(Request $request, Division $division)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $form = $this->createForm(new DivisionType(), $division);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($division);
            $em->flush();

            return array("division" => $division);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Delete a Division
     * Delete action
     * @var Division $division
     * @return array
     *
     * @View()
     * @ParamConverter("division", class="KernelBundle:Division")
     * @Delete("/division/{id}")
     */
    public function deleteDivisionAction(Division $division)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $em = $this->getDoctrine()->getManager();
        $em->remove($division);
        $em->flush();

        return array("status" => "Deleted");
    }

}