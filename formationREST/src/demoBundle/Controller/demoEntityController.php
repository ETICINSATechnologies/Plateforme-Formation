<?php
/**
 * Created by PhpStorm.
 * User: Jindun
 * Date: 15/03/2017
 * Time: 09:17
 */

namespace DemoBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use FormationsBundle\Entity\Course;
use FormationsBundle\Form\CourseType;


class DemoEntityController extends FOSRestController
{
    /**
     * Get all the demo entities
     * @return array
     *
     * @View()
     * @Get("/demo-entities")
     */
    public function getDemoEntitiesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DemoBundle:DemoEntity')->findAll();

        return array( 'demo-entities' => $entities );
    }




}
