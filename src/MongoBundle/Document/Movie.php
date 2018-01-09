<?php

namespace MongoBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * MongoBundle\Document\Movie
 *
 * @ODM\Document
 * @ODM\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 */
class Movie
{
    /**
     * @var MongoId $id
     *
     * @ODM\Id(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @ODM\Field(name="name", type="string")
     */
    protected $name;

    /**
     * @var string $synopsis
     *
     * @ODM\Field(name="synopsis", type="string")
     */
    protected $synopsis;

    /**
     * @var string $duration
     *
     * @ODM\Field(name="duration", type="string")
     */
    protected $duration;

    /**
     * @var string $releasedate
     *
     * @ODM\Field(name="releasedate", type="string")
     */
    protected $releasedate;


    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     * @return $this
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string $synopsis
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set duration
     *
     * @param string $duration
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * Get duration
     *
     * @return string $duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set releasedate
     *
     * @param string $releasedate
     * @return $this
     */
    public function setReleasedate($releasedate)
    {
        $this->releasedate = $releasedate;
        return $this;
    }

    /**
     * Get releasedate
     *
     * @return string $releasedate
     */
    public function getReleasedate()
    {
        return $this->releasedate;
    }
}
