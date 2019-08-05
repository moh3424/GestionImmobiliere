<?php 


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


 class PropertySearch
 {
     /**
      *@var int|null $maxPrice
      *@return PropertySearch
      */
     private $maxPrice;
     
     /**
      *@var int|null 
      *@return PropertySearch
      *@Assert\Range(
     *      min = 10,
     *      max = 400,
     *      minMessage = "Veuillez entrer un nombre entre 10 et 400" ,
     *      maxMessage = "Veuillez entrer un nombre entre 10 et 400" 
     * )
      */
     private $minSurface;

      /**
      *@var string|null
      *@return PropertySearch
      *@Assert\Length(
     *      min = 5,
     *      max = 256
     * )
      */

     private $department;
     
     private $cityId;

     /**
      * @var ArrayCollection 
      */
     private $options;

     public function __construct()
     {
        $this->options = new ArrayCollection();
     }

     public function getMaxPrice()
     {
        return $this->maxPrice;
     }
     public function getMinSurface()
     {
        return $this->minSurface;
     }
     
     public function getDepartment()
      {
         return $this->department;
      }
     public function getCityId()
      {
         return $this->cityId;
      }
     public function setMaxPrice(?int $maxPrice): PropertySearch
     {
        $this->maxPrice = $maxPrice;
        return $this;
     }

     public function setMinSurface(?int $minSurface): PropertySearch
     {
        $this->minSurface = $minSurface;
        return $this;
     }
     public function setDepartment(?string $department): PropertySearch
     {
        $this->department = $department;
        return $this;
     }
     
     public function setCityId(?int $cityId): PropertySearch
     {
        $this->cityId = $cityId;
        return $this;
     }
    

     public function getBlockPrefix()
     {
         return '';  
     }

     /**
     * @return ArrayCollection
     */
    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }

    /**
     * @param ArrayCollection $options
     */
    public function setOptions(ArrayCollection $options): void
    {
        $this->options = $options;
    }

 }