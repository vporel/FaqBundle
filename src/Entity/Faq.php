<?php
namespace FaqBundle\Entity;

use RootBundle\Entity\Entity;
use RootBundle\Entity\Trait\TimestampsTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Frequent asked question
 * @ORM\Entity
 * @ORM\Table(name="faqs")
 * @author Vivian NKOUANANG (https://github.com/vporel) <dev.vporel@gmail.com>
 */
class Faq extends Entity{

    use TimestampsTrait;

    /**
     * @var FaqGroup
     * @ORM\ManyToOne(targetEntity="FaqGroup", inversedBy="questions")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    private $group;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    #[Serializer\Groups(['faq_group:read'])]
    private $question;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    #[Serializer\Groups(['faq_group:read'])]
    private $answer;
    
    public function getGroup(): ?FaqGroup
    {
        return $this->group;
    }

    public function setGroup(FaqGroup $group): self
    {
        $this->group = $group;

        return $this;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;

        return $this;
    }
}