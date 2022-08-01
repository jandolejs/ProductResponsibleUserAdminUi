<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\Responsibleuseradminui\Api\Data;

interface ProductResponsibleUserAdminUiInterface
{

    const USER_ID = 'user_id';
    const PRODUCTRESPONSIBLEUSERADMINUI_ID = 'productresponsibleuseradminui_id';

    /**
     * Get productresponsibleuseradminui_id
     * @return string|null
     */
    public function getProductresponsibleuseradminuiId();

    /**
     * Set productresponsibleuseradminui_id
     * @param string $productresponsibleuseradminuiId
     * @return \Aiti\Responsibleuseradminui\ProductResponsibleUserAdminUi\Api\Data\ProductResponsibleUserAdminUiInterface
     */
    public function setProductresponsibleuseradminuiId($productresponsibleuseradminuiId);

    /**
     * Get user_id
     * @return string|null
     */
    public function getUserId();

    /**
     * Set user_id
     * @param string $userId
     * @return \Aiti\Responsibleuseradminui\ProductResponsibleUserAdminUi\Api\Data\ProductResponsibleUserAdminUiInterface
     */
    public function setUserId($userId);
}

