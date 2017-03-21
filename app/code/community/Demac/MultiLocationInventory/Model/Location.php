<?php

/**
 * Class Demac_MultiLocationInventory_Model_Location
 */
class Demac_MultiLocationInventory_Model_Location extends Mage_Core_Model_Abstract
{
    /**
     * Model event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'multilocationinventory_location';

    /**
     * Name of the event object
     *
     * @var string
     */
    protected $_eventObject = 'location';
    
    /**
     * Init model
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('demac_multilocationinventory/location');
    }
}
