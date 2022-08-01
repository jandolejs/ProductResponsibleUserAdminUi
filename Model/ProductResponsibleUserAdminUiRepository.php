<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\Responsibleuseradminui\Model;

use Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiInterface;
use Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiInterfaceFactory;
use Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiSearchResultsInterfaceFactory;
use Aiti\Responsibleuseradminui\Api\ProductResponsibleUserAdminUiRepositoryInterface;
use Aiti\Responsibleuseradminui\Model\ResourceModel\ProductResponsibleUserAdminUi as ResourceProductResponsibleUserAdminUi;
use Aiti\Responsibleuseradminui\Model\ResourceModel\ProductResponsibleUserAdminUi\CollectionFactory as ProductResponsibleUserAdminUiCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductResponsibleUserAdminUiRepository implements ProductResponsibleUserAdminUiRepositoryInterface
{

    /**
     * @var ResourceProductResponsibleUserAdminUi
     */
    protected $resource;

    /**
     * @var ProductResponsibleUserAdminUiInterfaceFactory
     */
    protected $productResponsibleUserAdminUiFactory;

    /**
     * @var ProductResponsibleUserAdminUiCollectionFactory
     */
    protected $productResponsibleUserAdminUiCollectionFactory;

    /**
     * @var ProductResponsibleUserAdminUi
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceProductResponsibleUserAdminUi $resource
     * @param ProductResponsibleUserAdminUiInterfaceFactory $productResponsibleUserAdminUiFactory
     * @param ProductResponsibleUserAdminUiCollectionFactory $productResponsibleUserAdminUiCollectionFactory
     * @param ProductResponsibleUserAdminUiSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceProductResponsibleUserAdminUi $resource,
        ProductResponsibleUserAdminUiInterfaceFactory $productResponsibleUserAdminUiFactory,
        ProductResponsibleUserAdminUiCollectionFactory $productResponsibleUserAdminUiCollectionFactory,
        ProductResponsibleUserAdminUiSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->productResponsibleUserAdminUiFactory = $productResponsibleUserAdminUiFactory;
        $this->productResponsibleUserAdminUiCollectionFactory = $productResponsibleUserAdminUiCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        ProductResponsibleUserAdminUiInterface $productResponsibleUserAdminUi
    ) {
        try {
            $this->resource->save($productResponsibleUserAdminUi);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the productResponsibleUserAdminUi: %1',
                $exception->getMessage()
            ));
        }
        return $productResponsibleUserAdminUi;
    }

    /**
     * @inheritDoc
     */
    public function get($productResponsibleUserAdminUiId)
    {
        $productResponsibleUserAdminUi = $this->productResponsibleUserAdminUiFactory->create();
        $this->resource->load($productResponsibleUserAdminUi, $productResponsibleUserAdminUiId);
        if (!$productResponsibleUserAdminUi->getId()) {
            throw new NoSuchEntityException(__('ProductResponsibleUserAdminUi with id "%1" does not exist.', $productResponsibleUserAdminUiId));
        }
        return $productResponsibleUserAdminUi;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->productResponsibleUserAdminUiCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(
        ProductResponsibleUserAdminUiInterface $productResponsibleUserAdminUi
    ) {
        try {
            $productResponsibleUserAdminUiModel = $this->productResponsibleUserAdminUiFactory->create();
            $this->resource->load($productResponsibleUserAdminUiModel, $productResponsibleUserAdminUi->getProductresponsibleuseradminuiId());
            $this->resource->delete($productResponsibleUserAdminUiModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the ProductResponsibleUserAdminUi: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($productResponsibleUserAdminUiId)
    {
        return $this->delete($this->get($productResponsibleUserAdminUiId));
    }
}

