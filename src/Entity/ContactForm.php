<?php

namespace App\Entity;

use App\Repository\ContactFormRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: ContactFormRepository::class)]
class ContactForm
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;
    /**
     * @Assert\Email()
     */

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
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
    /**
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context, $payload)
    {
        if (is_null($this->name) || is_null($this->email) || is_null($this->messageText)) {
            $context->buildViolation('Hiba! Kérjük töltsd ki az összes mezőt!')
                ->atPath('submit')
                ->addViolation();
        }
    }

}
