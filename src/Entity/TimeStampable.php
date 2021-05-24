<?php

declare(strict_types=1);

namespace App\Entity;

trait TimeStampable{

    /**
     * @var DateTimeInterface
     * @ORM\column(type="datetime")
     */
    private $createdAt;
    
    /**
     * @var DateTimeInterface
     * @ORM\column(type="datetime" , nullable="true")
     */
    private $updatedAt;

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
    
}

