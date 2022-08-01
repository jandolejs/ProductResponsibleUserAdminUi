<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\Responsibleuseradminui\Model;

use Aiti\Responsibleuseradminui\Api\Data\ProductResponsibleUserAdminUiInterface;
use Magento\Framework\Model\AbstractModel;

class ProductResponsibleUserAdminUi extends AbstractModel implements ProductResponsibleUserAdminUiInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Aiti\Responsibleuseradminui\Model\ResourceModel\ProductResponsibleUserAdminUi::class);
    }

    /**
     * @inheritDoc
     */
    public function getProductresponsibleuseradminuiId()
    {
        return $this->getData(self::PRODUCTRESPONSIBLEUSERADMINUI_ID);
    }

    /**
     * @inheritDoc
     */
    public function setProductresponsibleuseradminuiId($productresponsibleuseradminuiId)
    {
        return $this->setData(self::PRODUCTRESPONSIBLEUSERADMINUI_ID, $productresponsibleuseradminuiId);
    }

    /**
     * @inheritDoc
     */
    public function getUserId()
    {
        return $this->getData(self::USER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setUserId($userId)
    {
        return $this->setData(self::USER_ID, $userId);
    }
}

