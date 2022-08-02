<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\ProductResponsibleUserAdminUi\Model;

use Aiti\ProductResponsibleUserAdminUi\Api\Data\ResponsibleInterface;
use Magento\Framework\Model\AbstractModel;

class Responsible extends AbstractModel implements ResponsibleInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Aiti\ProductResponsibleUserAdminUi\Model\ResourceModel\Responsible::class);
    }

    /**
     * @inheritDoc
     */
    public function getResponsibleId()
    {
        return $this->getData(self::RESPONSIBLE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setResponsibleId($responsibleId)
    {
        return $this->setData(self::RESPONSIBLE_ID, $responsibleId);
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

