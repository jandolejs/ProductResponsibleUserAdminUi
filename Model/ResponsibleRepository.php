<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\ProductResponsibleUserAdminUi\Model;

use Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleInterface;
use Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleInterfaceFactory;
use Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleSearchResultsInterfaceFactory;
use Aiti\ProductResponsibleUserAdminUi\Api\ResponsibleRepositoryInterface;
use Aiti\ProductResponsibleUserAdminUi\Model\ResourceModel\Responsible as ResourceResponsible;
use Aiti\ProductResponsibleUserAdminUi\Model\ResourceModel\Responsible\CollectionFactory as ResponsibleCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class ResponsibleRepository implements ResponsibleRepositoryInterface
{

    /**
     * @var ResourceResponsible
     */
    protected $resource;

    /**
     * @var ResponsibleInterfaceFactory
     */
    protected $responsibleFactory;

    /**
     * @var ResponsibleCollectionFactory
     */
    protected $responsibleCollectionFactory;

    /**
     * @var Responsible
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceResponsible $resource
     * @param ResponsibleInterfaceFactory $responsibleFactory
     * @param ResponsibleCollectionFactory $responsibleCollectionFactory
     * @param ResponsibleSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceResponsible $resource,
        ResponsibleInterfaceFactory $responsibleFactory,
        ResponsibleCollectionFactory $responsibleCollectionFactory,
        ResponsibleSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->responsibleFactory = $responsibleFactory;
        $this->responsibleCollectionFactory = $responsibleCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(ResponsibleInterface $responsible)
    {
        try {
            $this->resource->save($responsible);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the responsible: %1',
                $exception->getMessage()
            ));
        }
        return $responsible;
    }

    /**
     * @inheritDoc
     */
    public function get($responsibleId)
    {
        $responsible = $this->responsibleFactory->create();
        $this->resource->load($responsible, $responsibleId);
        if (!$responsible->getId()) {
            throw new NoSuchEntityException(__('responsible with id "%1" does not exist.', $responsibleId));
        }
        return $responsible;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->responsibleCollectionFactory->create();
        
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
    public function delete(ResponsibleInterface $responsible)
    {
        try {
            $responsibleModel = $this->responsibleFactory->create();
            $this->resource->load($responsibleModel, $responsible->getResponsibleId());
            $this->resource->delete($responsibleModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the responsible: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($responsibleId)
    {
        return $this->delete($this->get($responsibleId));
    }
}

