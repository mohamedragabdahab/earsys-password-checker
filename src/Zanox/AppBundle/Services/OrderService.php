<?php

namespace Zanox\AppBundle\Services;

use Doctrine\ORM\EntityManager;
use Exception;

/**
 * Description of OrderService
 *
 * @author Mohamed Ragab Dahab <mdahab@treze.co.uk>
 * 
 * @property Doctrine\ORM\EntityManager $_em Doctrine Entity Manager Service
 */
class OrderService {

    /**
     * @var Doctrine\ORM\EntityManager 
     */
    protected $_em;

    /**
     * Constrauctor used to inject dependancies
     * @author Mohamed Ragab Dahab <mdahab@treze.co.uk>
     * @access public
     * 
     * @param Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em) {
        $this->_em = $em;
    }
    
    /**
     * 
     * @author Mohamed Ragab Dahab <mdahab@treze.co.uk>
     * @access public
     * @param int $id
     * 
     * @return array Merchant Orders
     *
     * @throws Exception "Merchant ID is required"
     * @throws Exception "Merchant ID is invalid"
     * @throws Exception "Merchant not found"
     * 
     */
    public function getMerchantOrders($id) {

        //Check if Merchant ID is given
        if (empty($id)) {
            throw new Exception('Merchant ID is required');
        }

        //Check if Merchat Id valid type
        if (!is_numeric($id)) {
            throw new Exception('Merchant ID is invalid');
        }
        
        //select from merchant by ID
        $merchant = $this->_em->getRepository('ZanoxAppBundle:Merchants')->findOneBy(['id' => $id]);
        //Check if merchant exists
        if(empty($merchant)){
            throw new Exception('Merchant not found');
        }
        $reportsRepo = $this->_em->getRepository('ZanoxAppBundle:Orders');

        $orders = $reportsRepo->findBy(['merchant' => $id]);
        
        return $orders;
    }

}
