<?php declare(strict_types=1);

namespace SwagTraining\AuthorsStoreApi\Core\Content\Author\SalesChannel;

use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Plugin\Exception\DecorationPatternException;
use Shopware\Core\Framework\Routing\Annotation\Entity;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Shopware\Core\Framework\Routing\Annotation\Since;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

/**
 * @RouteScope(scopes={"store-api"})
 */
class AuthorStoreApiRoute extends AbstractAuthorStoreApiRoute
{
    private EntityRepositoryInterface $authorRepository;

    public function __construct(EntityRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function getDecorated(): AbstractAuthorStoreApiRoute
    {
        throw new DecorationPatternException(self::class);
    }

    /**
     * @Since("6.4.0.0")
     * @OA\Post(
     *      path="/swag-training/author-store-api-route",
     *      summary="Get author data in return",
     *      operationId="retrieve.author.data",
     *      tags={"Store API","SWAG Training Author"},
     *      @OA\Response(
     *          response="200",
     *          description="ArbitraryData",
     *          @OA\JsonContent(type="array")
     *     )
     * )
     * @Route("/store-api/swag-training/author-store-api-route", name="store-api.swag-training.author-store-api-route", methods={"GET","POST"})
     * @Entity("author")
     */
    public function getAuthorData(Criteria $criteria, SalesChannelContext $context): AuthorStoreApiRouteResponse
    {
        $authors = $this->authorRepository->search($criteria, $context->getContext());

        return new AuthorStoreApiRouteResponse($authors);
    }
}
