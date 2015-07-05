<?php

namespace Zanox\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Exception;

/**
 * 
 * @author Mohamed Ragab Dahab <mdahab@treze.co.uk>
 * 
 * @Route("merchant")
 * 
 */
class ReportController extends Controller {

    /**
     * 
     * @author Mohamed Ragab Dahab <mdahab@treze.co.uk>
     * @access public
     * 
     * @Route("/{id}/report", name="merchant-report")
     * 
     * @param int $id
     * @return type
     */
    public function showAction($id) {
        try {

            //Order Service
            $orderService = $this->get('zanox_app.orderService');

            //merchant Orders
            $orders = $orderService->getMerchantOrders($id);

            //render view and pass orders array
            return $this->render('ZanoxAppBundle:Report:show.html.twig', ['orders' => $orders]);
        } catch (Exception $e) {
            //log errors
        }
    }

}
