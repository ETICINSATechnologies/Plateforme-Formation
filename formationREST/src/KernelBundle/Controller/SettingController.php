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
use KernelBundle\Entity\Setting;
use KernelBundle\Form\SettingType;

class SettingController extends FOSRestController
{

    /**
     * Get all the settings
     * @return array
     *
     * @ApiDoc(
     *  section="Setting",
     *  description="Get all settings",
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
     * @Get("/settings")
     */
    public function getSettingsAction()
    {

        $settings = $this->getDoctrine()->getRepository("KernelBundle:Setting")
            ->findAll();

        return array('settings' => $settings);
    }

    /**
     * Get a setting by ID
     * @param Setting $setting
     * @return array
     *
     * @ApiDoc(
     *  section="Setting",
     *  description="Get a setting",
     *  requirements={
     *      {
     *          "name"="setting",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="setting id"
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
     * @ParamConverter("setting", class="KernelBundle:Setting")
     * @Get("/setting/{id}", requirements={"id" = "\d+"})
     */
    public function getSettingAction(Setting $setting)
    {

        return array('setting' => $setting);

    }

    /**
     * Get a setting by label
     * @param string $label
     * @return array
     *
     * @ApiDoc(
     *  section="Setting",
     *  description="Get a setting",
     *  requirements={
     *      {
     *          "name"="label",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="setting label"
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
     * @Get("/setting/{label}")
     */
    public function getSettingByLabelAction($label)
    {

        $setting = $this->getDoctrine()->getRepository('KernelBundle:Setting')->findOneBy(['label' => $label]);
        return array('setting' => $setting);

    }

    /**
     * Create a new Setting
     * @var Request $request
     * @return View|array
     *
     * @ApiDoc(
     *  section="Setting",
     *  description="Create a new Setting",
     *  input="KernelBundle\Form\SettingType",
     *  output="KernelBundle\Entity\Setting",
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
     * @Post("/setting")
     */
    public function postSettingAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $setting = new Setting();
        $form = $this->createForm(new SettingType(), $setting);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($setting);
            $em->flush();

            return array("setting" => $setting);

        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Edit a Setting
     * Put action
     * @var Request $request
     * @var Setting $setting
     * @return array
     *
     * @ApiDoc(
     *  section="Setting",
     *  description="Edit a Setting",
     *  requirements={
     *      {
     *          "name"="setting",
     *          "dataType"="string",
     *          "requirement"="*",
     *          "description"="setting id"
     *      }
     *  },
     *  input="KernelBundle\Form\SettingType",
     *  output="KernelBundle\Entity\Setting",
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
     * @ParamConverter("setting", class="KernelBundle:Setting")
     * @Post("/setting/{id}")
     */
    public function putSettingAction(Request $request, Setting $setting)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $form = $this->createForm(new SettingType(), $setting);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($setting);
            $em->flush();

            return array("setting" => $setting);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Delete a Setting
     * Delete action
     * @var Setting $setting
     * @return array
     *
     * @View()
     * @ParamConverter("setting", class="KernelBundle:Setting")
     * @Delete("/setting/{id}")
     */
    public function deleteSettingAction(Setting $setting)
    {
        $this->denyAccessUnlessGranted('ROLE_KERNEL_SUPERADMIN');

        $em = $this->getDoctrine()->getManager();
        $em->remove($setting);
        $em->flush();

        return array("status" => "Deleted");
    }

}