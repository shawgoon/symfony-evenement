<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mariage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $batheme;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $kermesse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $brocante;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $feteForaine;

    /**
     * @ORM\ManyToOne(targetEntity=Event::class, inversedBy="Category")
     */
    private $event;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMariage(): ?string
    {
        return $this->mariage;
    }

    public function setMariage(?string $mariage): self
    {
        $this->mariage = $mariage;

        return $this;
    }

    public function getBathême(): ?string
    {
        return $this->batheme;
    }

    public function setBathême(?string $batheme): self
    {
        $this->batheme = $batheme;

        return $this;
    }

    public function getKermesse(): ?string
    {
        return $this->kermesse;
    }

    public function setKermesse(?string $kermesse): self
    {
        $this->kermesse = $kermesse;

        return $this;
    }

    public function getBrocante(): ?string
    {
        return $this->brocante;
    }

    public function setBrocante(?string $brocante): self
    {
        $this->brocante = $brocante;

        return $this;
    }

    public function getFeteForaine(): ?string
    {
        return $this->feteForaine;
    }

    public function setFeteForaine(?string $feteForaine): self
    {
        $this->feteForaine = $feteForaine;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }
}
