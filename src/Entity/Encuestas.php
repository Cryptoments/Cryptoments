<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Encuestas
 *
 * @ORM\Table(name="encuestas")
 * @ORM\Entity
 */
class Encuestas
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEncuesta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idencuesta;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=500, nullable=false)
     */
    private $descripcion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="si", type="integer", nullable=true)
     */
    private $si;

    /**
     * @var int|null
     *
     * @ORM\Column(name="no", type="integer", nullable=true)
     */
    private $no;

    public function getIdencuesta(): ?int
    {
        return $this->idencuesta;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getSi(): ?int
    {
        return $this->si;
    }

    public function setSi(?int $si): self
    {
        $this->si = $si;

        return $this;
    }

    public function getNo(): ?int
    {
        return $this->no;
    }

    public function setNo(?int $no): self
    {
        $this->no = $no;

        return $this;
    }


}
