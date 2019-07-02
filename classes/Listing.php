<?php # Listing.php
// This script defines the Listing class.

/*  Class Page.
 *  The class contains fifteen attributes: mlsNumber, address, address2, city, state, zipcode, area, salesPrice,
 *      dateListed, bedrooms, bathrooms, garageSize, squareFeet, lotSize, description
 *  The attributes match the corresponding database columns.
 *  The class contains fifteen methods:
 *  - getMlsNumber()
 *  - getAddress()
 *  - getAddress2()
 *  - getCity()
 *  - getState()
 *  - getZipCode()
 *  - getArea()
 *  - getSalesPrice()
 *  - getDateListed()
 *  - getBedrooms()
 *  - getBathrooms()
 *  - getGarageSize()
 *  - getSquareFeet()
 *  - getLotSize()
 *  - getDescription()
 */
class Listing {
    
    // All attributes correspond to database columns.
    // All attributes are protected.
    protected $mlsNumber = null;
    protected $address = null;
    protected $address2 = null;
    protected $city = null;
    protected $state = null;
    protected $zipcode = null;
    protected $area = null;
    protected $salesPrice = null;
    protected $dateListed = null;
    protected $bedrooms = null;
    protected $bathrooms = null;
    protected $garageSize = null;
    protected $squareFeet = null;
    protected $lotSize = null;
    protected $description = null;
    
    // No need for a constructor!

    // Six methods for returning attribute values:
    function getMlsNumber() {
        return $this->mlsNumber;
    }   
    function getAddress() {
        return $this->address;
    }
    function getAddress2() {
        return $this->address2;
    }
    function getCity() {
        return $this->city;
    }
    function getState() {
        return $this->state;
    }
    function getZipCode() {
        return $this->zipcode;
    }   
    function getArea() {
        return $this->area;
    }
    function getSalesPrice() {
        return $this->salesPrice;
    }
    function getDateListed() {
        return $this->dateListed;
    }
    function getBedrooms() {
    return $this->bedrooms;
}
    function getBathrooms() {
        return $this->bathrooms;
    }
    function getGarageSize() {
        return $this->garageSize;
    }

    function getSquareFeet() {
        return $this->squareFeet;
    }
    function getLotSize() {
        return $this->lotSize;
    }
    function getDescription() {
        return $this->description;
    }
    
} // End of Listing class.