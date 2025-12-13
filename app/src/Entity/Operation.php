<?php

namespace App\Entity;

use App\Model\Calculator;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Definice operace kalkulačky.
 * @package App\Entity
 */
class Operation
{
    /**
     * @var int Operace.
     * @Assert\NotBlank(message = "Tohle pole je povinné.")
     */
    private $operation = Calculator::ADD;

    /**
     * @var int První číslo operace.
     * @Assert\NotBlank(message = "Tohle pole je povinné.")
     * @Assert\Type(
     *     type="int",
     *     message="Hodnota {{ value }} není validní číslo."
     * )
     */
    private $x = 0;

    /**
     * @var int Druhé číslo operace.
     * @Assert\NotBlank(message = "Tohle pole je povinné.")
     * @Assert\Type(
     *     type="int",
     *     message="Hodnota {{ value }} není validní číslo."
     * )
     */
    private $y = 0;

    /**
     * Getter pro operaci.
     * @return int operace
     */
    public function getOperation(): int
    {
        return $this->operation;
    }

    /**
     * Setter pro operaci.
     * @param int $operation operace
     * @return Operation
     */
    public function setOperation(int $operation): self
    {
        $this->operation = $operation;
        return $this;
    }

    /**
     * Getter pro první číslo operace.
     * @return int první číslo operace
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * Setter pro první číslo operace.
     * @param int $x první číslo operace
     * @return Operation
     */
    public function setX(int $x): self
    {
        $this->x = $x;
        return $this;
    }

    /**
     * Getter pro druhé číslo operace.
     * @return int druhé číslo operace
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * Setter pro druhé číslo operace.
     * @param int $y druhé číslo operace
     * @return Operation
     */
    public function setY(int $y): self
    {
        $this->y = $y;
        return $this;
    }

    /**
     * Ošetření dělení nulou.
     * @return bool true jestli se dělí nulou, jinak false
     * @Assert\IsFalse(message = "Nelze dělit nulou.")
     */
    public function isDividedByZero(): bool
    {
        return $this->getOperation() == Calculator::DIVIDE && $this->getY() == 0;
    }
}