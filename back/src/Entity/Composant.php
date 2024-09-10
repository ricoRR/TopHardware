<?php

namespace App\Entity;

use App\Repository\ComposantRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComposantRepository::class)]
class Composant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;  
    
  

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 2555)]
    private ?string $caractéristique = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $photo = null;

    #[ORM\Column(length: 255)]
    private ?string $pp = null; 
    
    #[ORM\Column(length: 2555)]
    private ?string $details = null;     
    
    #[ORM\Column(length: 255)]
    private ?string $stripeid = null;   
    
    #[ORM\Column]
    private ?int $amount = null;
    
    #[ORM\Column( nullable: true)]
    private ?int $reduction = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $highlight = null;

    #[ORM\ManyToOne(inversedBy: 'composants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;

    #[ORM\Column(options: ["default" => 0])]
    private ?int $views = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }  
      public function getStripeId(): ?string
    {
        return $this->stripeid;
    }

    public function setStripeId(?string $stripeId): static
    {
        $this->stripeid = $stripeId;

        return $this;
    }

    public function getCaractéristique(): ?string
    {
        return $this->caractéristique;
    }

    public function setCaractéristique(string $caractéristique): static
    {
        $this->caractéristique = $caractéristique;

        return $this;
    }

    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    public function setPhoto(?array $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPp(): ?string
    {
        return $this->pp;
    }

    public function setPp(string $pp): static
    {
        $this->pp = $pp;

        return $this;
    }   
    
    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): static
    {
        $this->details = $details;

        return $this;
    } 
    
    public function getHighlight():  ?array
    {
        return $this->highlight;
    }

    public function setHightlight(?array $highlight): static
    {
        $this->highlight = $highlight;

        return $this;
    }   
    
    
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(string $amount): static
    {
        $this->amount = $amount;

        return $this;
    } 
    
    public function getReduction(): ?int
    {
        return $this->reduction;
    }

    public function setReduction(int $reduction): static
    {
        $this->reduction = $reduction;

        return $this;
    } 

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(int $views=0): static
    {
        $this->views = $views;

        return $this;
    }

}
