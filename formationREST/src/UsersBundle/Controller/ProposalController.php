<?php

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
use UsersBundle\Entity\Proposal;
use UsersBundle\Entity\Question;
use UsersBundle\Form\ProposalType;
use UsersBundle\Form\QuestionType;



/**
 * Proposal controller.
 *
 */
class ProposalController extends FOSRestController
{
    /**
     * Create a new proposal
     * @var Request $request
     * @return View|array
     *
     * @View()
     * @Post("/addProposal")
     */
    public function postProposalsAction(Request $request)
    {


        $proposal = new Proposal();
        $form = $this->createForm(new ProposalType(), $proposal);

        $form->handleRequest($request);


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proposal);
            $em->flush();

            return array("proposal" => $proposal);
        }

        return array(
            'form' => $form,
        );
    }
}
