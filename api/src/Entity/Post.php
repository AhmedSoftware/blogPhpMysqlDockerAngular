<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $message;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $toLike;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $toDislike;

    public function getId(): ?integer
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getToLike(): ?int
    {
        return $this->toLike;
    }

    public function setToLike(?int $toLike): self
    {
        $this->toLike = $toLike;

        return $this;
    }

    public function getToDislike(): ?int
    {
        return $this->toDislike;
    }

    public function setToDislike(?int $toDislike): self
    {
        $this->toDislike = $toDislike;

        return $this;
    }
}
