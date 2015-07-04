<?php

namespace Zanox\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * 
 * @author Mohamed Ragab Dahab <mdahab@treze.co.uk>
 * 
 * @Route("merchant")
 */
class MerchantController extends Controller
{
    /**
     * List all available merchants
     * @author Mohamed Ragab Dahab <mdahab@treze.co.uk>
     * @access public
     * 
     * @Route("/list", name="merchant-list")
     * 
     * @return type
     */
    public function indexAction()
    {
        //Merchant Service
        $merchantService = $this->get('zanox_app.merchantService');
        
        //get all available merchants through merchant service
        $merchants = $merchantService->listMerchants();
            
        //Render stuitable view and pass merchants array to it
        return $this->render('ZanoxAppBundle:Merchant:index.html.twig', ['merchants' => $merchants]);
    }
    
}
