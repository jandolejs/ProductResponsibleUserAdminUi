<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\ProductResponsibleUserAdminUi\Model\ResourceModel\Responsible;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'responsible_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Aiti\ProductResponsibleUserAdminUi\Model\Responsible::class,
            \Aiti\ProductResponsibleUserAdminUi\Model\ResourceModel\Responsible::class
        );
    }
}

