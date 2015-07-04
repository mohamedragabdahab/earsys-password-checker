<?php

namespace Zanox\AppBundle\Services;

use Doctrine\ORM\EntityManager;

/**
 * Description of ReportService
 * @author Mohamed Ragab Dahab <mdahab@treze.co.uk>
 * @property Doctrine\ORM\EntityManager $_em Doctrine Entity Manager Service
 * 
 */
class MerchantService {

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
     * Find all merchants' details from merchants table
     * @author Mohamed Ragab Dahab <mdahab@treze.co.uk>
     * @access public
     * 
     * @return array all merchants' details
     */
    public function listMerchants() {
        //Get Mechant Repository using entity manager service
        $merchantRepo = $this->_em->getRepository('ZanoxAppBundle:Merchants');
        
        //Select all from merchants
        $merchants = $merchantRepo->findAll();

        return $merchants;
    }

}
