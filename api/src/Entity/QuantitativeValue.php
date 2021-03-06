<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A point value or interval for product characteristics and other purposes.
 *
 * @see http://schema.org/QuantitativeValue Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/QuantitativeValue")
 */
class QuantitativeValue extends AbstractDate
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
     * @var float|null The value of the quantitative value or property value node.
     *
     *    - For [QuantitativeValue](http://schema.org/QuantitativeValue) and [MonetaryAmount](http://schema.org/MonetaryAmount), the recommended type for values is 'Number'.
     *    - For [PropertyValue](http://schema.org/PropertyValue), it can be 'Text;', 'Number', 'Boolean', or 'StructuredValue'.
     *    - Use values from 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather than superficially similiar Unicode symbols.
     *    - Use '.' (Unicode 'FULL STOP' (U+002E)) rather than ',' to indicate a decimal point. Avoid using these symbols as a readability separator.
     *
     * @ORM\Column(type="float", nullable=true)
     * @ApiProperty(iri="http://schema.org/value")
     */
    private $value;

    /**
     * @var string|null The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/unitCode")
     */
    private $unitCode;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param float|null $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return float|null
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setUnitCode(?string $unitCode): void
    {
        $this->unitCode = $unitCode;
    }

    public function getUnitCode(): ?string
    {
        return $this->unitCode;
    }
}
