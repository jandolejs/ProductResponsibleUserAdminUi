<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\ProductResponsibleUserAdminUi\Api\Data;

interface ResponsibleInterface
{

    const USER_ID = 'user_id';
    const RESPONSIBLE_ID = 'responsible_id';

    /**
     * Get responsible_id
     * @return string|null
     */
    public function getResponsibleId();

    /**
     * Set responsible_id
     * @param string $responsibleId
     * @return \Aiti\ProductResponsibleUserAdminUi\Responsible\Api\Data\ResponsibleInterface
     */
    public function setResponsibleId($responsibleId);

    /**
     * Get user_id
     * @return string|null
     */
    public function getUserId();

    /**
     * Set user_id
     * @param string $userId
     * @return \Aiti\ProductResponsibleUserAdminUi\Responsible\Api\Data\ResponsibleInterface
     */
    public function setUserId($userId);
}

