<?php

namespace App\Controller;

use App\Entity\User;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\RequestBody;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api', name: 'app_api_')]
class SecurityController extends AbstractController
{
    public function __construct(
        private SerializerInterface $serializer,
        private EntityManagerInterface $manager,
        
    ) {
  
    }
    #[Route('/registration', name: 'registration', methods: 'POST')]
    #[Post(
        path: '/api/registration',
        description: "Inscription d'un nouvel utilisateur",
        summary: "Inscription d'un nouvel utilisateur",
        requestBody: new RequestBody(
            content: new JsonContent(
                properties: [
                    new \OpenApi\Attributes\Property(
                        "firstname",
                        example: "Jhon"
                    ),
                    new \OpenApi\Attributes\Property(
                        "lastname",
                        example: "Doe"
                    ),
                    new \OpenApi\Attributes\Property(
                        "email",
                        example: "jhon.doe@mail.fr"
                    ),
                    new \OpenApi\Attributes\Property(
                        "guestNumber",
                        example: "0"),
                    new \OpenApi\Attributes\Property(
                        "allergy",
                        example: "Aucune")
                ]
            )
        )
    )]
    #[\OpenApi\Attributes\Response(
        response: "201",
        description: "Inscription réussie"
    )]
    #[\OpenApi\Attributes\Response(
        response: "400",
        description: "La requête n'est pas correcte."
    )]
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        $user = $this->serializer->deserialize($request->getContent(), User::class, 'json');
        $user->setPassword($passwordHasher->hashPassword($user, $user->getPassword()));
        $user->setCreatedAt(new DateTimeImmutable());

        $this->manager->persist($user);
        $this->manager->flush();
        
        return $this->json($user,201,[],[]);
    }

    // …

    #[Route('/login', name: 'login', methods: 'POST')]
    public function login(#[CurrentUser] ?User $user): JsonResponse
    {
        if (null === $user) {
            return new JsonResponse(['message' => 'Missing credentials'], 
            Response::HTTP_UNAUTHORIZED);
        }

        return new JsonResponse([
            'user'  => $user->getUserIdentifier(),
            'apiToken' => $user->getApiToken(),
            'roles' => $user->getRoles(),
        ]);
    }

}