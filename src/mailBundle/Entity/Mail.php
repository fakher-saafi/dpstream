<?php
/**
 * Created by PhpStorm.
 * User: hafedh
 * Date: 10/12/2017
 * Time: 10:37
 */
namespace mailBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Mail
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="Mail")
 * @ORM\Entity
 */
class Mail
{
    /**
     *
     * @ORM\Column(type="integer",name="id",nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=2000,nullable=true)
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=2000,nullable=true)
     */
    private $prenom;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=2000,nullable=true)
     */
    private $email;
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=2000,nullable=true)
     */
    private $text;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}