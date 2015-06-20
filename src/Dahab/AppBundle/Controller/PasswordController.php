<?php

namespace Dahab\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * PasswordController
 * @author Mohamed Ragab Dahab <eng.mohamed.dahab@gmail.com>
 * 
 * @copyright
 * Dahab 1.0
 * Copyright © 2015 by Dahab
 * https://github.com/mohamedragabdahab
 */
class PasswordController extends Controller {

    /**
     * list all password
     * @author Mohamed Ragab Dahab <eng.mohamed.dahab@gmail.com>
     * @access public
     * 
     * @Route("/password/list", name="password-list")
     * 
     * @return array response
     */
    public function listAction() {

        //Select all passwords from password table
        $passwords = $this->getDoctrine()->getRepository('DahabAppBundle:Passwords')->findAll();

        //render the suitable view and pass to it the selected passwords
        return $this->render('DahabAppBundle:Password:list.html.twig', ['passwords' => $passwords]);
    }

    /**
     * check if password is valid or not
     * @author Mohamed Ragab Dahab <eng.mohamed.dahab@gmail.com>
     * @access public
     * 
     * @Route("/password/check", name="password-check",  options={"expose"=true})
     * @Method({"Post"})
     * 
     * @return string json object
     */
    public function checkAction(Request $request) {

        //get password from request
        $password = $request->request->get('password');

        //Password Service
        $passwordService = $this->get('dahab.app.PasswordService');

        //check if the password is valid or not
        $response = $passwordService->check($password);

        //return json object that holds the password validation information
        return new JsonResponse($response);
    }

}
