<?php
declare(strict_types=1);

namespace Aiti\ProductResponsibleUserAdminUi\Ui\DataProvider\ProductResponsibleUser;

use Aiti\ProductResponsibleUserApi\Api\Data\ProductResponsibleUserApiInterface;
use Aiti\ProductResponsibleUserApi\Api\ProductResponsibleUserApiRepositoryInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\ReportingInterface;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider;
use Magento\Ui\DataProvider\SearchResultFactory;

class ListingDataProvider extends DataProvider {

    private SearchResultFactory $searchResultFactory;
    private ProductResponsibleUserApiRepositoryInterface $productResponsibleUserRepository;

    /**
     * @inheridoc
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        ReportingInterface $reporting,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        RequestInterface $request,
        FilterBuilder $filterBuilder,
        SearchResultFactory $searchResultFactory,
        ProductResponsibleUserApiRepositoryInterface $productResponsibleUserRepository,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $reporting,
            $searchCriteriaBuilder,
            $request,
            $filterBuilder,
            $meta,
            $data
        );

        $this->searchResultFactory = $searchResultFactory;
        $this->productResponsibleUserRepository = $productResponsibleUserRepository;
    }

    /**
     * @inheridoc
     */
    public function getSearchResult()
    {
        $searchCriteria = $this->getSearchCriteria();
        $result = $this->productResponsibleUserRepository->getList($searchCriteria);

        return $this->searchResultFactory->create(
            $result->getItems(),
            $result->getTotalCount(),
            $searchCriteria,
            ProductResponsibleUserApiInterface::USER_ID
        );
    }

}
