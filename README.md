# xss-php
This repository contains an example of an XSS vulnerability, implemented in a example guestbook application. The implementation uses PHP. 

# Application Overview

    [ Guestbook page (index.php) ]
          ^ 
          |
          |
    Fetch data and display it
          |
          |
    [ MySQL Database ]
          ^
          |
          |
    Insert data w/o sanitizing input (Fixed version: w/ sanitizing input) 
          |
          |
    [ Add Comment page (jumbotron-add.php) ] ---------
                                  ^                   |
                                  |                   |
                                  |                   |
                                   --------------------
                                   Submit Form via Post
                                   Page prints inserted comment, if an error occured.
                              
# Vulnerabilities
The vulnerable version of the application tries to store the user input directly into the database. (Stored XSS, as the guestbook page simply prints the values take from the database.) In case the database is not able to store the data, an error is returned and the submitted message is printed. (Reflected XSS, as input leading to an error message will be printed as well and could contain executable code.)

# Fix
In the fixed version of this application `htmlentities( SubmittedValue, ENT_QUOTES )` is used to convert special characters into their html representation. (http://php.net/manual/de/function.htmlentities.php)
