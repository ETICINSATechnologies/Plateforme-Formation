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
use KernelBundle\Entity\Gender;
use KernelBundle\Form\GenderType;

class GenderController extends FOSRestController
{

    /**
     * Get all the genders
     * @return array
     *
     * @ApiDoc(
     *  section="Gender",
     *  description="Get all genders",
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
     * @Get("/genders")
     */
    public function getGendersAction()
    {

        $genders = $this->getDoctrine()->getRepository("KernelBundle:Gender")
            ->findAll();

        return array('genders' => $genders);
    }

    /**
     * Get a gender by ID
     * @param Gender $gender
     * @return array
     *
     * @ApiDoc(
     *  section="Gender",
     *  description="Get a gender",
     *  requirements={
     *      {
     *          "name"="gender",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="gender id"
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
     * @ParamConverter("gender", class="KernelBundle:Gender")
     * @Get("/gender/{id}", requirements={"id" = "\d+"})
     */
    public function getGenderAction(Gender $gender)
    {

        return array('gender' => $gender);

    }

    /**
     * Get a gender by label
     * @param string $label
     * @return array
     *
     * @ApiDoc(
     *  section="Gender",
     *  description="Get a gender",
     *  requirements={
     *      {
     *          "name"="label",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="gender label"
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
     * @Get("/gender/{label}")
     */
    public function getGenderByLabelAction($label)
    {

        $gender = $this->getDoctrine()->getRepository('KernelBundle:Gender')->findOneBy(['label' => $label]);
        return array('gender' => $gender);

    }

    /**
     * Create a new Gender
     * @var Request $request
     * @return View|array
     *
     * @ApiDoc(
     *  section="Gender",
     *  description="Create a new Gender",
     *  input="KernelBundle\Form\GenderType",
     *  output="KernelBundle\Entity\Gender",
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
     * @Post("/gender")
     */
    public function postGenderAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $gender = new Gender();
        $form = $this->createForm(new GenderType(), $gender);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gender);
            $em->flush();

            return array("gender" => $gender);

        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Edit a Gender
     * Put action
     * @var Request $request
     * @var Gender $gender
     * @return array
     *
     * @ApiDoc(
     *  section="Gender",
     *  description="Edit a Gender",
     *  requirements={
     *      {
     *          "name"="gender",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="gender id"
     *      }
     *  },
     *  input="KernelBundle\Form\GenderType",
     *  output="KernelBundle\Entity\Gender",
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
     * @ParamConverter("gender", class="KernelBundle:Gender")
     * @Post("/gender/{id}")
     */
    public function putGenderAction(Request $request, Gender $gender)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $form = $this->createForm(new GenderType(), $gender);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($gender);
            $em->flush();

            return array("gender" => $gender);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Delete a Gender
     * Delete action
     * @var Gender $gender
     * @return array
     *
     * @View()
     * @ParamConverter("gender", class="KernelBundle:Gender")
     * @Delete("/gender/{id}")
     */
    public function deleteGenderAction(Gender $gender)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $em = $this->getDoctrine()->getManager();
        $em->remove($gender);
        $em->flush();

        return array("status" => "Deleted");
    }

}