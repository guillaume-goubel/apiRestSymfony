<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ArticleRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *   
 *   collectionOperations = {
 *    "get" = { "normalization_context"={"groups"= {"article_read"}}},
 *    "post",
 *   },
 *  
 *   itemOperations = {
 *    "get" = {"normalization_context"={"groups"= {"article_details_read"}}},
 *    "put",
 *    "patch",
 *    "delete"
 *   }
 * 
 * )
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{   
    use TimeStampable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user_read", "user_details_read", "article_details_read" , "article_read"})
     */
    private $id;

    /**
     * @Groups({"article_read", "article_details_read", "user_details_read"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Groups({"article_read", "article_details_read", "user_details_read"})
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @Groups({"article_details_read"})
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable;
    }

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
}
