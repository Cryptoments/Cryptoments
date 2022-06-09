<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Drops
 *
 * @ORM\Table(name="drops", indexes={@ORM\Index(name="coleccion", columns={"coleccion"})})
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

    /**
     * @var \Colecciones
     *
     * @ORM\ManyToOne(targetEntity="Colecciones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="coleccion", referencedColumnName="id_coleccion")
     * })
     */
    private $coleccion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getRareza(): ?string
    {
        return $this->rareza;
    }

    public function setRareza(string $rareza): self
    {
        $this->rareza = $rareza;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getEnlace(): ?string
    {
        return $this->enlace;
    }

    public function setEnlace(?string $enlace): self
    {
        $this->enlace = $enlace;

        return $this;
    }

    public function getColeccion(): ?Colecciones
    {
        return $this->coleccion;
    }

    public function setColeccion(?Colecciones $coleccion): self
    {
        $this->coleccion = $coleccion;

        return $this;
    }


}
