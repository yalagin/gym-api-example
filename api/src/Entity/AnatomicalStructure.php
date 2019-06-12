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
class AnatomicalStructure extends AbstractThing
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
     * @var ExercisePlan
     *
     * @ORM\OneToOne(targetEntity="App\Entity\ExercisePlan")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $ExercisePlan;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setExercisePlan(ExercisePlan $ExercisePlan): void
    {
        $this->ExercisePlan = $ExercisePlan;
    }

    public function getExercisePlan(): ExercisePlan
    {
        return $this->ExercisePlan;
    }
}