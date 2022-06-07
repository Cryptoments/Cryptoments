<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clientes
 *
 * @ORM\Table(name="clientes_colecciones")
 * @ORM\Entity
 */
class clientes_colecciones
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
     * @var int
     *
     * @ORM\Column(name="id_cliente", type="integer", nullable=false)
     */
    private $id_cliente;

    /**
     * @var int
     *
     * @ORM\Column(name="id_coleccion", type="integer", nullable=false)
     */
    private $id_coleccion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId_cliente($id_cliente): ?int
    {
        $this->id_cliente= $id_cliente;

        return $this->id_cliente;
    }

    public function getId_cliente(): ?int
    {
        return $this->id_cliente;
    }

    public function getId_coleccion(): ?string
    {
        return $this->id_coleccion;
    }

    public function setId_coleccion(string $id_coleccion): self
    {
        $this->id_coleccion= $id_coleccion;

        return $this;
    }

    public function getIdCliente(): ?int
    {
        return $this->id_cliente;
    }

    public function setIdCliente(int $id_cliente): self
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }

    public function getIdColeccion(): ?int
    {
        return $this->id_coleccion;
    }

    public function setIdColeccion(int $id_coleccion): self
    {
        $this->id_coleccion = $id_coleccion;

        return $this;
    }

}
