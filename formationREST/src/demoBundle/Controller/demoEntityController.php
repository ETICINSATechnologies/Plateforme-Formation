<?php

namespace demoBundle\Controller;

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


class demoEntityController extends FOSRestController
{
    /**
     * Get all the courses
     * @return array

     * @View()
     * @Get("/demo-entities")
     */
    public function getDemoEntitiesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('demoBundle:demoEntity')->findAll();

        return array( 'demo-entities' => $entities );
    }

}