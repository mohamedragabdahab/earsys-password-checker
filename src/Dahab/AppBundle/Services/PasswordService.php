<?php

namespace Dahab\AppBundle\Services;

use Doctrine\ORM\EntityManager;

/**
 * @description PasswordService class the operates check validation on password 
 * @author Mohamed Ragab Dahab <eng.mohamed.dahab@gmail.com>
 * 
 * @property array $_passwordRules a set of rules that check the validity of a given password
 * @property Doctrine\ORM\EntityManager $_entityManager
 * 
 * @copyright
 * Dahab 1.0
 * Copyright © 2015 by Dahab
 * https://github.com/mohamedragabdahab
 */
class PasswordService {

    /**
     *
     * @var array a set of rules that check the validity of a given password
     */
    private $_passwordRules;

    /**
     *
     * @var Doctrine\ORM\EntityManager 
     */
    private $_entityManager;

    public function __construct($passwordRules, EntityManager $entityManager) {
        $this->_passwordRules = $passwordRules;
        $this->_entityManager = $entityManager;
    }

    /**
     * Check if the given password is valid or not comparing to password checking criteria 
     * @author Mohamed Ragab Dahab <eng.mohamed.dahab@gmail.com>
     * 
     * @param string $password
     * 
     * @return array response of the valication
     */
    public function check($password) {

        //Response initial value
        $response = [
            'status' => true,
            'message' => 'Valid Password'
        ];
        
        $passwordEntity = $this->_entityManager->getRepository('DahabAppBundle:Passwords')->findOneBy(['password'=>$password]);

        //iterate through the password rules and validate the given password
        foreach ($this->_passwordRules as $rule) {
            if ($rule['include']) {
                //in case the password does not match one the the rules
                if (!preg_match($rule['regex'], $password)) {

                    $response['status'] = false;
                    $response['message'] = $rule['err_msg'];
                    
                    //just break, one or the rules does not match
                    break;
                }
            }

            if (!$rule['include']) {
                //in case the password does not match one the the rules
                if (preg_match($rule['regex'], $password)) {

                    $response['status'] = false;
                    $response['message'] = $rule['err_msg'];
            
                    //just break, one or the rules does not match
                    break;
                }
            }
            
            //password is valid
            $passwordEntity->setValid(1);
            
            $this->_entityManager->persist($passwordEntity);
            $this->_entityManager->flush($passwordEntity);
            $this->_entityManager->refresh($passwordEntity);
        }

        return $response;
    }

}
