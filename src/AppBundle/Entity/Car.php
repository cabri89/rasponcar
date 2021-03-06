<?php
// src/AppBundle/Entity/Car.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use AppBundle\Entity\Common\IdTrait;

/**
* @ORM\Entity
*/
class Car
{
    use idTrait;

    /**
    * @ORM\Column(type="guid")
    * @ORM\GeneratedValue(strategy="UUID")
    */
    private $uuid;

    /**
    * @ORM\Column(type="string", length=255, unique=false)
    * @Assert\NotBlank()
    */
    private $marque;

    /**
    * @ORM\Column(type="string", length=255, unique=false)
    * @Assert\NotBlank()
    */
    private $modele;

    /**
    * @ORM\Column(type="date", length=255, unique=false)
    * @Assert\NotBlank()
    * @Assert\Date()
    */
    private $premiereImmat;

    /**
    * @ORM\Column(type="string", length=255, unique=false)
    */
    private $plaque;

    /**
    * @ORM\Column(type="integer", length=255, unique=false)
    */
    private $kilometres;

    /**
    * @ORM\Column(type="string", length=255, unique=false)
    */
    private $couleur;

    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="cars")
    */
    private $user;

    /**
    * @ORM\OneToMany(targetEntity="Maintenance", mappedBy="car")
    */
    private $Maintenances;

    /**
    * @ORM\OneToMany(targetEntity="Stat", mappedBy="car")
    */
    private $stats;

    /**
    * Set uuid
    *
    * @param string $uuid
    *
    * @return Car
    */
    public function setUuid()
    {
        $this->uuid = uniqid();

        return $this;
    }

    /**
    * Get uuid
    *
    * @return string
    */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
    * Set marque
    *
    * @param string $marque
    *
    * @return Car
    */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
    * Get marque
    *
    * @return string
    */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
    * Set modele
    *
    * @param string $modele
    *
    * @return Car
    */
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
    * Get modele
    *
    * @return string
    */
    public function getModele()
    {
        return $this->modele;
    }

    /**
    * Set premiereImmat
    *
    * @return Car
    */
    public function setPremiereImmat($premiereImmat)
    {
        $this->premiereImmat = $premiereImmat;

        return $this;
    }

    /**
    * Get premiereImmat
    *
    */
    public function getPremiereImmat()
    {
        return $this->premiereImmat;
    }

    /**
    * Set plaque
    *
    * @param string $plaque
    *
    * @return Car
    */
    public function setPlaque($plaque)
    {
        $this->plaque = $plaque;

        return $this;
    }

    /**
    * Get plaque
    *
    * @return string
    */
    public function getPlaque()
    {
        return $this->plaque;
    }

    /**
    * Set kilometres
    *
    * @param \int $kilometres
    *
    * @return Car
    */
    public function setKilometres($kilometres)
    {
        $this->kilometres = $kilometres;

        return $this;
    }

    /**
    * Get kilometres
    *
    * @return \integer
    */
    public function getKilometres()
    {
        return $this->kilometres;
    }

    /**
    * Set couleur
    *
    * @param string $couleur
    *
    * @return Car
    */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
    * Get couleur
    *
    * @return string
    */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
    * Set user
    *
    * @param \AppBundle\Entity\User $user
    *
    * @return Car
    */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
    * Get user
    *
    * @return \AppBundle\Entity\User
    */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Maintenances = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Stats = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add maintenance
     *
     * @param \AppBundle\Entity\Maintenance $maintenance
     *
     * @return Car
     */
    public function addMaintenance(\AppBundle\Entity\Maintenance $maintenance)
    {
        $this->Maintenances[] = $maintenance;

        return $this;
    }

    /**
     * Remove maintenance
     *
     * @param \AppBundle\Entity\Maintenance $maintenance
     */
    public function removeMaintenance(\AppBundle\Entity\Maintenance $maintenance)
    {
        $this->Maintenances->removeElement($maintenance);
    }

    /**
     * Get maintenances
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMaintenances()
    {
        return $this->Maintenances;
    }

    /**
    * {@inheritdoc}
    */
    public function __toString()
    {
        return $this->getMarque().' '.$this->getModele().' '.$this->getCouleur();
    }

    /**
     * Add stat
     *
     * @param \AppBundle\Entity\Maintenance $stat
     *
     * @return Car
     */
    public function addStat(\AppBundle\Entity\Maintenance $stat)
    {
        $this->stats[] = $stat;

        return $this;
    }

    /**
     * Remove stat
     *
     * @param \AppBundle\Entity\Maintenance $stat
     */
    public function removeStat(\AppBundle\Entity\Maintenance $stat)
    {
        $this->stats->removeElement($stat);
    }

    /**
     * Get stats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStats()
    {
        return $this->stats;
    }
}
