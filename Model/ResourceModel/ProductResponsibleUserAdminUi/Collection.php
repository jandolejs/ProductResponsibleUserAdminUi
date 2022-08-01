<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\Responsibleuseradminui\Model\ResourceModel\ProductResponsibleUserAdminUi;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'productresponsibleuseradminui_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Aiti\Responsibleuseradminui\Model\ProductResponsibleUserAdminUi::class,
            \Aiti\Responsibleuseradminui\Model\ResourceModel\ProductResponsibleUserAdminUi::class
        );
    }
}

