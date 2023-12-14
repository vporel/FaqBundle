<?php
namespace FaqBundle\Entity;

use RootBundle\Entity\Trait\TimestampsTrait;
use RootBundle\Entity\Entity;
use RootBundle\Library\Slugger;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use RootBundle\Entity\Attribute\Slug;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Advertisement
 * @ORM\Entity
 * @ORM\Table(name="faqs_groups")
 * @author Vivian NKOUANANG (https://github.com/vporel) <dev.vporel@gmail.com>
 */
#[ApiResource(uriTemplate: "/faq", shortName: "FAQ"), GetCollection(description: "Les questions de la FAQ par groupes", normalizationContext: ["groups" => ["default", "faq_group:read"]])]
class FaqGroup extends Entity{

    use TimestampsTrait;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    #[Serializer\Groups(['faq_group:read'])]
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    #[Slug('name')]
    #[Serializer\Groups(['faq_group:read'])]
    private $slug;

    /**
     * @var Collection<Faq>
     * @ORM\OneToMany(targetEntity="Faq", mappedBy="group", cascade={"persist", "remove"})
     */
    #[Serializer\Groups(['faq_group:read'])]
    private $questions;

    public function __construct(){
        $this->questions = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    public function setName(string $name): self{
        $this->name = $name;
        return $this;
    }

     /**
     * @return Collection<Faq>
     */
    public function getQuestions(): Collection{
        return $this->questions;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

}