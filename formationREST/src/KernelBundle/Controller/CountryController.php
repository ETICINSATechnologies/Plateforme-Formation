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
use KernelBundle\Entity\Country;
use KernelBundle\Form\CountryType;

class CountryController extends FOSRestController
{

    /**
     * Get all the countries
     * @return array
     *
     * @ApiDoc(
     *  section="Country",
     *  description="Get all countries",
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
     * @Get("/countries")
     */
    public function getCountriesAction()
    {

        $countries = $this->getDoctrine()->getRepository("KernelBundle:Country")
            ->findAll();

        return array('countries' => $countries);
    }

    /**
     * Get a country by ID
     * @param Country $country
     * @return array
     *
     * @ApiDoc(
     *  section="Country",
     *  description="Get a country",
     *  requirements={
     *      {
     *          "name"="country",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="country id"
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
     * @ParamConverter("country", class="KernelBundle:Country")
     * @Get("/country/{id}", requirements={"id" = "\d+"})
     */
    public function getCountryAction(Country $country)
    {

        return array('country' => $country);

    }

    /**
     * Get a country by label
     * @param string $label
     * @return array
     *
     * @ApiDoc(
     *  section="Country",
     *  description="Get a country",
     *  requirements={
     *      {
     *          "name"="label",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="country label"
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
     * @Get("/country/{label}")
     */
    public function getCountryByLabelAction($label)
    {

        $country = $this->getDoctrine()->getRepository('KernelBundle:Country')->findOneBy(['label' => $label]);
        return array('country' => $country);
    }

    /**
     * Create a new Country
     * @var Request $request
     * @return View|array
     *
     * @ApiDoc(
     *  section="Country",
     *  description="Create a new Country",
     *  input="KernelBundle\Form\CountryType",
     *  output="KernelBundle\Entity\Country",
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
     * @Post("/country")
     */
    public function postCountryAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $country = new Country();
        $form = $this->createForm(new CountryType(), $country);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($country);
            $em->flush();

            return array("country" => $country);

        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Edit a Country
     * Put action
     * @var Request $request
     * @var Country $country
     * @return array
     *
     * @ApiDoc(
     *  section="Country",
     *  description="Edit a Country",
     *  requirements={
     *      {
     *          "name"="country",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="country id"
     *      }
     *  },
     *  input="KernelBundle\Form\CountryType",
     *  output="KernelBundle\Entity\Country",
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
     * @ParamConverter("country", class="KernelBundle:Country")
     * @Post("/country/{id}")
     */
    public function putCountryAction(Request $request, Country $country)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $form = $this->createForm(new CountryType(), $country);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($country);
            $em->flush();

            return array("country" => $country);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Delete a Country
     * Delete action
     * @var Country $country
     * @return array
     *
     * @View()
     * @ParamConverter("country", class="KernelBundle:Country")
     * @Delete("/country/{id}")
     */
    public function deleteCountryAction(Country $country)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $em = $this->getDoctrine()->getManager();
        $em->remove($country);
        $em->flush();

        return array("status" => "Deleted");
    }

}