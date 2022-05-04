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


}
