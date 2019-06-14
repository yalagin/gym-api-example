<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/Thing Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Thing")
 */
class WorkoutPlan extends AbstractThing
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(type="guid")
     * @Assert\Uuid
     */
    private $id;

    /**
     * @var Person|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Person")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owned;

    /**
     * @var DaysOfWorkout
     *
     * @ORM\OneToOne(targetEntity="App\Entity\DaysOfWorkout")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $daysOfWorkout;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     * @Assert\NotNull
     */
    private $isCurrent;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setOwned(?Person $owned): void
    {
        $this->owned = $owned;
    }

    public function getOwned(): ?Person
    {
        return $this->owned;
    }

    public function setDaysOfWorkout(DaysOfWorkout $daysOfWorkout): void
    {
        $this->daysOfWorkout = $daysOfWorkout;
    }

    public function getDaysOfWorkout(): DaysOfWorkout
    {
        return $this->daysOfWorkout;
    }

    public function setIsCurrent(bool $isCurrent): void
    {
        $this->isCurrent = $isCurrent;
    }

    public function getIsCurrent(): bool
    {
        return $this->isCurrent;
    }
}