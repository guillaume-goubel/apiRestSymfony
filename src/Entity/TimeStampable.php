<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;

trait TimeStampable{

    /**
     * @var DateTimeInterface
     * @Groups({"user_read", "user_details_read", "article_details_read" , "article_read"})
     * @ORM\column(type="datetime")
     */
    private $createdAt;
    
    /**
     * @var DateTimeInterface
     * @Groups({"user_read", "user_details_read", "article_details_read" , "article_read"})
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

