<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientesColecciones
 *
 * @ORM\Table(name="clientes_colecciones", indexes={@ORM\Index(name="id_cliente", columns={"id_cliente"}), @ORM\Index(name="id_coleccion", columns={"id_coleccion"})})
 * @ORM\Entity
 */
class ClientesColecciones
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
     * @var \Colecciones
     *
     * @ORM\ManyToOne(targetEntity="Colecciones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_coleccion", referencedColumnName="id_coleccion")
     * })
     */
    private $idColeccion;

    /**
     * @var \Clientes
     *
     * @ORM\ManyToOne(targetEntity="Clientes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cliente", referencedColumnName="id")
     * })
     */
    private $idCliente;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdColeccion(): ?Colecciones
    {
        return $this->idColeccion;
    }

    public function setIdColeccion(?Colecciones $idColeccion): self
    {
        $this->idColeccion = $idColeccion;

        return $this;
    }

    public function getIdCliente(): ?Clientes
    {
        return $this->idCliente;
    }

    public function setIdCliente(?Clientes $idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }


}
