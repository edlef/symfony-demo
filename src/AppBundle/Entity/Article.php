<?php


namespace AppBundle\Entity;

use AppBundle\Entity\Traits\TimestampableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 */
class Article
{

    use TimestampableTrait;

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @var string $code
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=false)
     */
    private $code;

    /**
     * @Assert\NotBlank()
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @Assert\NotBlank()
     * @var datetime $releaseDate
     *
     * @ORM\Column(name="release_date", type="datetime", nullable=true)
     */
    private $releaseDate;

    /**
     * @var float $length
     *
     * @ORM\Column(name="length", type="integer", nullable=true)
     */
    private $length;

    /**
     * @Assert\NotBlank()
     * @var datetime $duration
     *
     * @ORM\Column(name="duration", type="integer", nullable=true)
     */
    private $duration;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @Assert\NotBlank()
     * @var float $price
     *
     * @ORM\Column(name="price", type="float", nullable=true)
     */
    private $price;


    /**
     * @var float $dvd
     *
     * @ORM\Column(name="dvd", type="boolean", options={"default":false})
     */
    private $dvd;

    /**
     * @var float $blueray
     *
     * @ORM\Column(name="blueray", type="boolean", options={"default":false})
     */
    private $blueray;

    /**
     * @ORM\ManyToOne(targetEntity="ArticleType", inversedBy="articles")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="articles")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @ORM\ManyToMany(targetEntity="Actor", cascade={"persist"})
     * @ORM\JoinTable(name="articles_actors")
     */
    private $actors;

    public function __construct()
    {
        $this->actors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;

    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param Author $author
     * @return $this
     */
    public function setAuthor(Author $author)
    {
        $this->author = $author;

        return $this;

    }

    /**
     * @return datetime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param $releaseDate
     * @return $this
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;

    }

    /**
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param float $length
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;

    }

    /**
     * @return datetime
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param datetime $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;

    }

    /**
     * @return text
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;

    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;

    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param ArticleType $type
     * @return $this
     */
    public function setType(ArticleType $type)
    {
        $this->type = $type;

        return $this;

    }

    /**
     * @return mixed
     */
    public function getActors()
    {
        return $this->actors;
    }

    public function addActor(Actor $actor)
    {
        $this->actors->add($actor);
    }

    public function removeTag(Actor $actor)
    {
        $this->actors->remove($actor);
    }

    /**
     * @return mixed
     */
    public function isDvd()
    {
        return $this->dvd;
    }

    /**
     * @param mixed $dvd
     */
    public function setDvd($dvd)
    {
        $this->dvd = $dvd;
    }

    /**
     * @return mixed
     */
    public function isBlueray()
    {
        return $this->blueray;
    }

    /**
     * @param mixed $blueray
     */
    public function setBlueray($blueray)
    {
        $this->blueray = $blueray;
    }

}
