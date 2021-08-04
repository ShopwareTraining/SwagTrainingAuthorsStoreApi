<?php declare(strict_types=1);

namespace SwagTraining\AuthorsStoreApi\Core\Content\Author\SalesChannel;

use Shopware\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;
use Shopware\Core\Framework\Struct\ArrayStruct;
use Shopware\Core\System\SalesChannel\StoreApiResponse;

class AuthorStoreApiRouteResponse extends StoreApiResponse
{
    /**
     * @var ArrayStruct
     */
    protected $object;

    /**
     * @param EntitySearchResult $object
     */
    public function __construct(EntitySearchResult $object)
    {
        parent::__construct($object);
    }
}
