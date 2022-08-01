<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\Responsibleuseradminui\Api\Data;

interface ProductResponsibleUserAdminUiSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get ProductResponsibleUserAdminUi list.
     * @return \Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiInterface[]
     */
    public function getItems();

    /**
     * Set user_id list.
     * @param \Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

