<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\ProductResponsibleUserAdminUi\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ResponsibleRepositoryInterface
{

    /**
     * Save responsible
     * @param \Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleInterface $responsible
     * @return \Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleInterface $responsible
    );

    /**
     * Retrieve responsible
     * @param string $responsibleId
     * @return \Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($responsibleId);

    /**
     * Retrieve responsible matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete responsible
     * @param \Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleInterface $responsible
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleInterface $responsible
    );

    /**
     * Delete responsible by ID
     * @param string $responsibleId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($responsibleId);
}

