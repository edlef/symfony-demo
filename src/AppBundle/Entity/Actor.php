<?php


namespace AppBundle\Entity;

use AppBundle\Entity\Traits\NamingTrait;
use AppBundle\Entity\Traits\TimestampableTrait;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="actor")
 * @ORM\Entity
 */
class Actor
{
    use TimestampableTrait;
    use NamingTrait;

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
