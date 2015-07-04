<?php

namespace Zanox\AppBundle\Services;

use Doctrine\ORM\EntityManager;
use Exception;

/**
 * Description of ReportService
 *
 * @author Mohamed Ragab Dahab <mdahab@treze.co.uk>
 * 
 * @property Doctrine\ORM\EntityManager $_em Doctrine Entity Manager Service
 *
 */
class ReportService {

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
     * @author Mohamed Ragab Dahab <mdahab@treze.co.uk>
     * @param type $id
     * @return type
     */
    public function getMerchantReport($id) {

        //Check if Merchant ID is given
        if (empty($id)) {
            throw new Exception('Merchant ID is required');
        }

        //Check if Merchat Id valid type
        if (!is_numeric($id)) {
            throw new Exception('Merchant ID is invalid');
        }

        
        
        return $orders;
    }

}
