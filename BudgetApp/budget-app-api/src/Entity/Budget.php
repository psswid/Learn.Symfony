<?php

namespace App\Entity;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name = "budget")
 */

class Budget
{
    /**
 * @ORM\Id
 * @ORM\GeneratedValue
 * @ORM\Column(type="integer")
 */
    private $id;
    /**
     * One Product has Many Features.
     *
     * @ORM\OneToMany(targetEntity="IncomeStream", mappedBy="budget", cascade="persist")
     * @var array
     */
    private $incomeStreams = array();

    /**
     * One Product has Many Features.
     *
     * @ORM\OneToMany(targetEntity="Expense", mappedBy="budget", cascade="persist")
     * @var array
     */
    private $expenses = array();

    public function __construct() {
        $this->incomeStreams = new ArrayCollection();
        $this->expenses = new ArrayCollection();
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
     * @return IncomeStream[]
     */
    public function getIncomeStreams()
    {
        return $this->incomeStreams->toArray();
    }

    /**
     * @param array $incomeStreams
     */
    public function setIncomeStreams(array $incomeStreams)
    {
        $this->incomeStreams = new ArrayCollection($incomeStreams);
    }

    /**
     * @return Expense[]
     */
    public function getExpenses()
    {
        return $this->expenses->toArray();
    }

    /**
     * @param array $expenses
     */
    public function setExpenses(array $expenses)
    {
        $this->expenses = new ArrayCollection($expenses);
    }


}