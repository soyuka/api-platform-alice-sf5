<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Dto\SomeInput;
use ApiPlatform\Core\Action\NotFoundAction;

/**
 * @ORM\Entity()
 */
 #[ApiResource(collectionOperations: [
        "post" => ["status" => 202, "messenger" => "input", "input" => SomeInput::class, "output" => false]
    ], itemOperations: [
        "get" => ["controller" => NotFoundAction::class, "read" => false, "status" => 404]
    ]
)]
class Car
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
    private $name;

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
}
