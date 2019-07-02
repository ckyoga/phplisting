<?php # User.php
// This script defines the User class.

/*  Class User.
 *  The class contains six attributes: id, userType, username, email, pass, and dateAdded.
 *  The attributes match the corresponding database columns.
 *  The class contains four methods: 
 *  - getId()
 *  - isAuthor()
 *  - canEditPage()
 *  - canCreatePage()
 */
class User {
    
    // All attributes correspond to database columns.
    // All attributes are protected.
    protected $id = null;
    protected $userType = null;
    protected $username = null;
    protected $email = null;
    protected $pass = null;
    protected $dateAdded = null;
    
    // Method returns the user ID:
    function getId() {
        return $this->id;
    }
    
    // Method returns a Boolean if the user is an author:
    function isAuthor() {

        // Add in check later, right now all logged in users can author
        return true;
    }
    
    // Method returns a Boolean indicating if the user is an administrator
    // or if the user is the original author of the provided page:
    function canEditListing() {
        return ($this->isAuthor());
    }
    
    // Method returns a Boolean indicating if the user is an administrator or an author:
    function canCreateListing() {
        return ($this->isAuthor());
    }
    
} // End of User class.