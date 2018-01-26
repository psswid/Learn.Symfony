<?php

namespace App\Entity;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name = "expense")
 */

class Expense
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

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Budget", inversedBy="expenses")
     * @ORM\JoinColumn(name="budget_id", referencedColumnName="id")
     */
    private $budget;

    /**
     * Expense constructor.
     * @param $amount
     * @param $name
     *
     * @var Budget
     */
    public function __construct($amount, $name, Budget $budget)
    {
        $this->amount = $amount;
        $this->name = $name;
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