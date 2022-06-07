<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Colecciones
 *
 * @ORM\Table(name="colecciones")
 * @ORM\Entity
 */
class Colecciones
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_coleccion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idColeccion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_coleccion", type="string", length=250, nullable=false)
     */
    private $nombreColeccion;

    public function getIdColeccion(): ?int
    {
        return $this->idColeccion;
    }

    public function getNombreColeccion(): ?string
    {
        return $this->nombreColeccion;
    }

    public function setNombreColeccion(string $nombreColeccion): self
    {
        $this->nombreColeccion = $nombreColeccion;

        return $this;
    }


}
