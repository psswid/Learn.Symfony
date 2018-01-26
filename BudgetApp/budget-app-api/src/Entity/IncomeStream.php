<?php

namespace App\Entity;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name = "income_stream")
 */

class IncomeStream
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * The amount in cents $1.00 = 100 cents
     *
     * @ORM\Column(type="integer") **/
    private $amount;

    /** @ORM\Column(type="string") **/
    private $name;

    /** @ORM\Column(type="integer") **/
    private $frequency;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Budget", inversedBy="incomeStreams")
     * @ORM\JoinColumn(name="budget_id", referencedColumnName="id")
     */
    private $budget;

    /**
     * IncomeStream constructor.
     * @param $amount
     * @param $name
     * @param $frequency
     * @param $budget
     * @var Budget
     */
    public function __construct($amount, $name, $frequency, Budget $budget)
    {
        $this->amount = $amount;
        $this->name = $name;
        $this->frequency = $frequency;
        $this->budget = $budget;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param integer $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return integer
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param integer $frequency
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
    }

    /**
     * @return Budget
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param Budget $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }


}