<?php

namespace Supra\Bundle\MileageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Supra\Bundle\MileageBundle\Entity\Trip;
use Supra\Bundle\MileageBundle\Form\TripType;

/**
 * Trip controller.
 *
 * @Route("/trip")
 */
class TripController extends Controller
{

    /**
     * Lists all Trip entities.
     *
     * @Route("/", name="trip")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SupraMileageBundle:Trip')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Trip entity.
     *
     * @Route("/", name="trip_create")
     * @Method("POST")
     * @Template("SupraMileageBundle:Trip:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Trip();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
 
            $params = $request->request->get("supra_bundle_mileagebundle_trip");

            //extract into a modified entity to selectRoute
            $entity = $this->_calculateDistanceAndTime($entity,$params);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('trip_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Trip entity.
    *
    * @param Trip $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Trip $entity)
    {
        $form = $this->createForm(new TripType(), $entity, array(
            'action' => $this->generateUrl('trip_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Trip entity.
     *
     * @Route("/new", name="trip_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Trip();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Trip entity.
     *
     * @Route("/{id}", name="trip_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SupraMileageBundle:Trip')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trip entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Trip entity.
     *
     * @Route("/{id}/edit", name="trip_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SupraMileageBundle:Trip')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trip entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Trip entity.
    *
    * @param Trip $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Trip $entity)
    {
        $form = $this->createForm(new TripType(), $entity, array(
            'action' => $this->generateUrl('trip_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Trip entity.
     *
     * @Route("/{id}", name="trip_update")
     * @Method("PUT")
     * @Template("SupraMileageBundle:Trip:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SupraMileageBundle:Trip')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trip entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity = $this->_calculateDistanceAndTime($entity);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('trip_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Trip entity.
     *
     * @Route("/{id}", name="trip_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SupraMileageBundle:Trip')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Trip entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('trip'));
    }

    /**
     * Creates a form to delete a Trip entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trip_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }


    /**
     * Select which map route to use
     *
     * @Route("/select_route_ajax", name="trip_select_route_ajax")
     * @Method("POST")
     * @Template("SupraMileageBundle:Trip:select_route_ajax.html.twig")
     */
    public function selectRouteAjaxAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $parsed_locations[] = $request->request->get('l1');

        $parsed_locations[] = $request->request->get('l2');

        foreach($parsed_locations as $location) {

            if(substr($location,0,3) === "id:") {

                $locations[] = $em->getRepository('SupraMileageBundle:Location')->find(substr($location,3));

            } else if(substr($location,0,8) === "address:") {
              
                $locations[] = substr($location,8);
            }
        }

        $response = json_decode(file_get_contents($this->_obtainMapAPIURIWithLocationArray($locations)));

        if($response->status == "OK") {

            $routes = $response->routes;
        }

        return compact('routes');
    }

    /**
    *    BEGIN MAPS API FUNCTIONS HERE
    */

    private function _calculateDistanceAndTime(Trip $entity,$params)
    {

        $selectRoute = false;

        if(is_null($entity->getMileage()) || is_null($entity->getTravelTime())) { 

            $response = json_decode(file_get_contents($this->_obtainMapAPIURI($entity)));

            if($response->status == "OK") {

                $selected_route = (isset($params['selected_route']))?$params['selected_route']:0;

                $legs = $response->routes[$selected_route]->legs[0];

                if(is_null($entity->getMileage())) $entity->setMileage($legs->distance->text);

                if(is_null($entity->getTravelTime())) $entity->setTravelTime(((int)$legs->duration->value / 60));
            }
        }

        return $entity;
    }

    private function _obtainMapAPIURI(Trip $entity) 
    {
        $locations = $entity->getLocations();

        return $this->_obtainMapAPIURIWithLocationArray($locations);
    }

    private function _obtainMapAPIURIWithLocationArray($locations) {

        $maps_api_url = "http://maps.googleapis.com/maps/api/directions/json?origin=";

        $maps_api_url .= urlencode((string)$locations[0]) . '&destination=' . urlencode((string)$locations[1]);

        $maps_api_url .= '&sensor=false&alternatives=true';

        return $maps_api_url;
    }


    /**
     * Select which map route to use
     *
     * @Route("/calculate_distance_and_time_ajax", name="trip_calculate_distance_and_time_ajax")
     * @Method("POST")
     */
    public function calculateDistanceAndTimeAjaxAction(Request $request)
    {

        $routes = $this->selectRouteAjaxAction($request);
        $route = $routes['routes'][$request->request->get('selected')];

        $legs = $route->legs[0];

        $mileage = (float) $legs->distance->text;

        $duration = ((float)$legs->duration->value / 60);

        echo json_encode(compact('mileage','duration')); die(); 
    }
}
