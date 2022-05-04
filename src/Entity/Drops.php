<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Drops
 *
 * @ORM\Table(name="drops")
 * @ORM\Entity
 */
class Drops
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="coleccion", type="string", length=50, nullable=false)
     */
    private $coleccion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="rareza", type="string", length=50, nullable=false)
     */
    private $rareza;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=100, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="enlace", type="string", length=100, nullable=true)
     */
    private $enlace;


}
