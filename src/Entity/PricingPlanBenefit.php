<?php

namespace App\Entity;

use App\Repository\PricingPlanBenefitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PricingPlanBenefitRepository::class)]
class PricingPlanBenefit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $PricingPlan = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'benefits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?self $pricingPlanBenefit = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'pricingPlanBenefit')]
    private Collection $benefits;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'pricingPlanBenefits')]
    private Collection $features;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'features')]
    private Collection $pricingPlanBenefits;

    public function __construct()
    {
        $this->benefits = new ArrayCollection();
        $this->features = new ArrayCollection();
        $this->pricingPlanBenefits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPricingPlan(): ?string
    {
        return $this->PricingPlan;
    }

    public function setPricingPlan(string $PricingPlan): static
    {
        $this->PricingPlan = $PricingPlan;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getPricingPlanBenefit(): ?self
    {
        return $this->pricingPlanBenefit;
    }

    public function setPricingPlanBenefit(?self $pricingPlanBenefit): static
    {
        $this->pricingPlanBenefit = $pricingPlanBenefit;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getBenefits(): Collection
    {
        return $this->benefits;
    }

    public function addBenefit(self $benefit): static
    {
        if (!$this->benefits->contains($benefit)) {
            $this->benefits->add($benefit);
            $benefit->setPricingPlanBenefit($this);
        }

        return $this;
    }

    public function removeBenefit(self $benefit): static
    {
        if ($this->benefits->removeElement($benefit)) {
            // set the owning side to null (unless already changed)
            if ($benefit->getPricingPlanBenefit() === $this) {
                $benefit->setPricingPlanBenefit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getFeatures(): Collection
    {
        return $this->features;
    }

    public function addFeature(self $feature): static
    {
        if (!$this->features->contains($feature)) {
            $this->features->add($feature);
        }

        return $this;
    }

    public function removeFeature(self $feature): static
    {
        $this->features->removeElement($feature);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getPricingPlanBenefits(): Collection
    {
        return $this->pricingPlanBenefits;
    }

    public function addPricingPlanBenefit(self $pricingPlanBenefit): static
    {
        if (!$this->pricingPlanBenefits->contains($pricingPlanBenefit)) {
            $this->pricingPlanBenefits->add($pricingPlanBenefit);
            $pricingPlanBenefit->addFeature($this);
        }

        return $this;
    }

    public function removePricingPlanBenefit(self $pricingPlanBenefit): static
    {
        if ($this->pricingPlanBenefits->removeElement($pricingPlanBenefit)) {
            $pricingPlanBenefit->removeFeature($this);
        }

        return $this;
    }
}
