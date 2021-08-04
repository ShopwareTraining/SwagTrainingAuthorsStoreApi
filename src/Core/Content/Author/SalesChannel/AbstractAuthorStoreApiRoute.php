<?php declare(strict_types=1);

namespace SwagTraining\AuthorsStoreApi\Core\Content\Author\SalesChannel;

use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\System\SalesChannel\SalesChannelContext;

abstract class AbstractAuthorStoreApiRoute
{
    abstract public function getDecorated(): AbstractAuthorStoreApiRoute;

    abstract public function getAuthorData(Criteria $criteria, SalesChannelContext $context): AuthorStoreApiRouteResponse;
}
