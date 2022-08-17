<?php

namespace App\Entity;

use App\Repository\ContactFormRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Config\Framework\Validation;

#[ORM\Entity(repositoryClass: ContactFormRepository::class)]
class ContactForm
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @Assert\NotBlank()
     */
    #[ORM\Column(length: 255,nullable: true)]

    private ?string $name = null;
    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */

    #[ORM\Column(length: 255,nullable: true)]

    private ?string $email = null;
    /**
     * @Assert\NotBlank()
     */

    #[ORM\Column(type: Types::TEXT,nullable: true)]
    private ?string $messageText = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessageText(): ?string
    {
        return $this->messageText;
    }

    public function setMessageText(string $messageText): self
    {
        $this->messageText = $messageText;

        return $this;
    }
}
