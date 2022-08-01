<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Aiti\Responsibleuseradminui\Controller\Adminhtml\ProductResponsibleUserAdminUi;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('productresponsibleuseradminui_id');
        
            $model = $this->_objectManager->create(\Aiti\Responsibleuseradminui\Model\ProductResponsibleUserAdminUi::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Productresponsibleuseradminui no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        
            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Productresponsibleuseradminui.'));
                $this->dataPersistor->clear('aiti_responsibleuseradminui_productresponsibleuseradminui');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['productresponsibleuseradminui_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Productresponsibleuseradminui.'));
            }
        
            $this->dataPersistor->set('aiti_responsibleuseradminui_productresponsibleuseradminui', $data);
            return $resultRedirect->setPath('*/*/edit', ['productresponsibleuseradminui_id' => $this->getRequest()->getParam('productresponsibleuseradminui_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

