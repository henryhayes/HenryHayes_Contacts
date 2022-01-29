<?php
/**
 * @author      Henry Hayes
 * @copyright   Copyright (c) 2014 HenryHayes
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * 
 * Quick and handy helper that quickly retrieves contact details.
 * 
 * @package HenryHayes
 * @subpackage Contacts
 */
class HenryHayes_Contacts_Helper_Data extends Mage_Core_Helper_Abstract
{
    const CONTACT_GENRAL    = 'general';
    const CONTACT_SALES     = 'sales';
    const CONTACT_SUPPORT   = 'support';
    const CONTACT_CUSTOM1   = 'custom1';
    const CONTACT_CUSTOM2   = 'custom2';
    
    /**
     * An array list of valid contact types.
     * 
     * @var array
     */
    protected $_validContactTypes = array(
        self::CONTACT_GENRAL,
        self::CONTACT_SALES,
        self::CONTACT_SUPPORT,
        self::CONTACT_CUSTOM1,
        self::CONTACT_CUSTOM2,
    );
    
    /**
     * 
     * @param type $contactType
     * 
     * @return string
     */
    protected function _buildContactString($contactType)
    {
        return 'trans_email/ident_' . $contactType;
    }
    
    /**
     * Checks is the given contact type is valid according to the list above.
     * 
     * @param type $contactType
     * 
     * @return boolean
     */
    public function hasContactType($contactType)
    {
        if (in_array($contactType, $this->_validContactTypes)) {
            return true;
        }
        
        return false;
    }
    
    /**
     * Gets contact name by contact type.
     * 
     * Example Use: Mage::helper('henryahyes_contacts')->getContatName(HenryHayes_Contacts_Helper_Data::CONTACT_GENRAL);
     * Example Use: Mage::helper('henryahyes_contacts')->getContatName('general');
     * 
     * @param type $contactType
     * 
     * @return string
     */
    public function getContatName($contactType)
    {
        if (false === $this->hasContactType($contactType)) {
            Mage::throwException('Contact Type "' . $contactType . '" was not found.');
        }
        
        return Mage::getStoreConfig($this->_buildContactString($contactType) . '/name');
    }
    
    /**
     * Gets contact email by contact type.
     * 
     * Example Use: Mage::helper('henryahyes_contacts')->getContatEmail(HenryHayes_Contacts_Helper_Data::CONTACT_GENRAL);
     * Example Use: Mage::helper('henryahyes_contacts')->getContatEmail('general');
     * 
     * @param type $contactType
     * 
     * @return string
     */
    public function getContatEmail($contactType)
    {
        if (false === $this->hasContactType($contactType)) {
            Mage::throwException('Contact Type "' . $contactType . '" was not found.');
        }
        
        return Mage::getStoreConfig($this->_buildContactString($contactType) . '/email');
    }
}
