<?php
namespace Magenest\Junior\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddToCartAction implements ObserverInterface{
    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $infoBuyRequest = $product->getCustomOptions()['info_buyRequest']->getData();
        $params = json_decode($infoBuyRequest['value'],true);
        $params['super_attribute'][113] = "2019-13-26";
        $infoBuyRequest['value'] = json_encode($params);
        $product->getCustomOptions()['info_buyRequest']->setData('value', $infoBuyRequest);
    }
}