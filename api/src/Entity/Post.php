<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;


/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 *
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"list"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"list","detail"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     *@Serializer\Groups({"list","detail"})
     */
    private $message;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Groups({"list","detail"})
     */
    private $date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Serializer\Groups({"list","detail"})
     */
    private $auteur;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAuteur(): int
    {
        return $this->auteur;
    }

    public function setAuteur(
        int $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }
}
