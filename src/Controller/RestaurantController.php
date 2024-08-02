<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Repository\RestaurantRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\RequestBody;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/restaurant', name: 'app_api_restaurant_')]
#[Post(
    path: '/api/restaurant/',
    description: "Ajout d'un restaurant.",
    summary: 'Ajouter un nouveau restaurant',
    requestBody: new RequestBody(
        content: new JsonContent(
            properties: [
                new \OpenApi\Attributes\Property(
                    "name",
                    example: "Quai Antique"
                ),
                new \OpenApi\Attributes\Property(
                    "description",
                    example: "Restaurant du chef Michant"
                ),
                new \OpenApi\Attributes\Property(
                    "maxGuest",
                    example: "40"
                )
            ]
        )
    )
)]
#[\OpenApi\Attributes\Response(
    response: "201",
    description: "Restaurant ajouté"
)]
#[\OpenApi\Attributes\Response(
    response: "400",
    description: "La requête n'est pas correcte."
)]
class RestaurantController extends AbstractController
{

    public function __construct(
        private EntityManagerInterface $manager,
        private RestaurantRepository $repository,
        private SerializerInterface $serializer,
    ) {

    }
    #[Route('/',name: 'showAll',methods:'GET')]
    public function showAll(): JsonResponse
    {
        // ... met à jour le restaurant
        $restaurantList = $this->repository->findAll();
        return $this->json($restaurantList,200,[],[]);
    }

    #[Route('/{id}',name: 'show',methods:'GET')]
    public function show(int $id): JsonResponse
    {
        // ... met à jour le restaurant
        $restaurant = $this->repository->findOneBy(['id'=>$id]);
        $code_http = Response::HTTP_NOT_FOUND;

        if($restaurant){
            $code_http = Response::HTTP_OK;
        }
        return $this->json($restaurant,$code_http,[],[]);
    }


    #[Route('/',name: 'new',methods:'POST')]
    public function new(Request $request): JsonResponse
    {
        $restaurant_new =$this->serializer->deserialize($request->getContent(),Restaurant::class,'json',[]);
        //recherche si le restaurant existe déjà
        $restaurant = $this->repository->findOneBy(['name'=>$restaurant_new->getName()]);
        $code_http = Response::HTTP_CREATED;

        if($restaurant){
            $code_http = Response::HTTP_CONFLICT;
            $restaurant_new = $restaurant;
        }
        else{
            $restaurant_new->setCreatedAt(new DateTimeImmutable());
            $this->manager->persist($restaurant_new);
            $this->manager->flush();

        }
        return $this->json($restaurant_new,$code_http,[],[]);
    }

}