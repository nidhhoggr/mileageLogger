<?php

namespace Supra\Bundle\MileageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $trips = $em->getRepository('SupraMileageBundle:Trip')->findAll();

        $totalMileage = $totalDuration = 0;

        foreach($trips as $trip) {

            $totalMileage += $trip->getMileage();
            $totalDuration += $trip->getTravelTime();
        }

        return compact('totalMileage','totalDuration');
    }

    
}
