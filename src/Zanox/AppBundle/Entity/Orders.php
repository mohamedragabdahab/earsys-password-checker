<?php

namespace Zanox\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="merchant_id", columns={"merchant_id"})})
 * @ORM\Entity(repositoryClass="Zanox\AppBundle\Entity\OrdersRepository")
 */
class Orders
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", precision=10, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="currency_code", type="string", length=5, nullable=false)
     */
    private $currencyCode;

    /**
     * @var string
     *
     * @ORM\Column(name="currency_symbol", type="string", length=20, nullable=false)
     */
    private $currencySymbol;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \Merchants
     * 
     * @ORM\Column(name="merchant_id", type="integer", nullable=false)
     * 
     * @ORM\ManyToOne(targetEntity="Zanox\AppBundle\Entity\Merchants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="merchant", referencedColumnName="id")
     * })
     */
    private $merchant;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Orders
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     * @return Orders
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Get currencyCode
     *
     * @return string 
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Set currencySymbol
     *
     * @param string $currencySymbol
     * @return Orders
     */
    public function setCurrencySymbol($currencySymbol)
    {
        $this->currencySymbol = $currencySymbol;

        return $this;
    }

    /**
     * Get currencySymbol
     *
     * @return string 
     */
    public function getCurrencySymbol()
    {
        return $this->currencySymbol;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Orders
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set merchant
     *
     * @param \Zanox\AppBundle\Entity\Merchants $merchant
     * @return Orders
     */
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;

        return $this;
    }

    /**
     * Get merchant
     *
     * @return \Zanox\AppBundle\Entity\Merchants 
     */
    public function getMerchant()
    {
        return $this->merchant;
    }
}
