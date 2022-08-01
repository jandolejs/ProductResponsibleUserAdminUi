<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\Responsibleuseradminui\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ProductResponsibleUserAdminUiRepositoryInterface
{

    /**
     * Save ProductResponsibleUserAdminUi
     * @param \Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiInterface $productResponsibleUserAdminUi
     * @return \Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiInterface $productResponsibleUserAdminUi
    );

    /**
     * Retrieve ProductResponsibleUserAdminUi
     * @param string $productresponsibleuseradminuiId
     * @return \Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($productresponsibleuseradminuiId);

    /**
     * Retrieve ProductResponsibleUserAdminUi matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete ProductResponsibleUserAdminUi
     * @param \Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiInterface $productResponsibleUserAdminUi
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiInterface $productResponsibleUserAdminUi
    );

    /**
     * Delete ProductResponsibleUserAdminUi by ID
     * @param string $productresponsibleuseradminuiId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($productresponsibleuseradminuiId);
}

