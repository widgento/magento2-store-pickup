<?php

declare(strict_types=1);

namespace Widgento\StorePickup\Controller\Adminhtml\StoreLocation;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    private $pageFactory;

    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}
