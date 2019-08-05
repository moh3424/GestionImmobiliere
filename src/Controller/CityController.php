<?php

namespace App\Controller;

use App\Entity\City;
use App\Entity\Property;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Repository\CityRepository;
use App\Repository\PropertyRepository;
use Doctrine\Common\Collections\Collection;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CityController extends AbstractController
{
     /**
     * @var CityRepository
     */

    private $repository;
    
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(CityRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }
    /**
     * @Route("/department", name="city.index")
     * @param CityRepository $repository
     * @return Response
     */
    public function index(CityRepository $repository, Request $request): Response
    {
      
       
        $cities = $this->repository->findAll();
        return $this->render('department/index.html.twig', [ 
            'cities'     => $cities,
            
          
        ]);
        
    }

    /**
      * @Route("/department/{id}", name="city.property.index")
      *  @param Cityrepository $repository
      * @return Response
      */
     public function showPropertiesCity(PaginatorInterface $paginator, Request $request, $id)
     {
         $search = new PropertySearch();
         $form = $this->createForm(PropertySearchType::class, $search);
         $form->handleRequest($request); 
         $city = $this->getDoctrine()
                      ->getRepository(City::class)
                       ->find($id);
        $properties = $paginator->paginate($city->getProperties($search),   
            $request->query->getInt('page', 1),
            6 /*limit per page*/);
        return $this->render('department/department.html.twig', [
             'properties'=> $properties,
             'city'      => $city,
             'form'     => $form->createView()
            
         ]);
     }

    
    
  
  
}
  
  
  
  
  
  
  
  
  