<?php

namespace FormationsBundle\Controller;

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


class CourseController extends FOSRestController
{
    /**
     * Get all the courses
     * @return array
     *
     * @ApiDoc(
     *  section="Courses",
     *  description="Get all courses",
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
     * @Get("/courses")
     */
    public function getCoursesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('FormationsBundle:Course')->findAll();

        return array( 'courses' => $courses );
    }




}
