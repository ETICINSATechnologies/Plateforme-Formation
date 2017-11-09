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
use UsersBundle\Entity\Chapter;
use UsersBundle\Entity\Question;
use UsersBundle\Form\ChapterType;
use UsersBundle\Form\QuestionType;



/**
 * Chapter controller.
 *
 */
class ChapterController extends FOSRestController
{
    /**Get all the chapters
     * @return array
     * @View()
     * @Get("/chapter")
     */
    public function getChapterAction()
    {

        $chapter = $this->getDoctrine()->getRepository("UsersBundle:Chapter")
            ->findAll();

        return array('chapter' => $chapter);
    }

    /**
     * Create a new Chapter
     * @var Request $request
     * @return View|array
     *
     * @View()
     * @Post("/chapter")
     */
    public function postChapterAction(Request $request)
    {

        $chapter = new Chapter();
        $form = $this->createForm(new ChapterType(), $chapter);
        $form->handleRequest($request);


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chapter);
            $em->flush();

            return array("chapter" => $chapter);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Get a chapter by name
     * @param string $name
     * @return array
     *
     * @View()
     * @Get("/chapter/{name}")
     */
    public function getChapterByNameAction($name)
    {

        $chapter = $this->getDoctrine()->getRepository('UsersBundle:Chapter')->findOneBy(['nameChapter' => $name]);
        return array('chapter' => $chapter);
    }


}
