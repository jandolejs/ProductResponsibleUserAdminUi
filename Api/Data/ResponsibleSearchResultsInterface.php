<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\ProductResponsibleUserAdminUi\Api\Data;

interface ResponsibleSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get responsible list.
     * @return \Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleInterface[]
     */
    public function getItems();

    /**
     * Set user_id list.
     * @param \Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

