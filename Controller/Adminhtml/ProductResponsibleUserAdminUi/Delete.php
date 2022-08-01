<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\Responsibleuseradminui\Controller\Adminhtml\ProductResponsibleUserAdminUi;

class Delete extends \Aiti\Responsibleuseradminui\Controller\Adminhtml\ProductResponsibleUserAdminUi
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('productresponsibleuseradminui_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Aiti\Responsibleuseradminui\Model\ProductResponsibleUserAdminUi::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Productresponsibleuseradminui.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['productresponsibleuseradminui_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Productresponsibleuseradminui to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

