# [TooFestival.es](http://toofestival.es/) - WordPress

Our [WordPress](https://wordpress.org/) with the most popular [Events Management](http://wp-events-plugin.com/) plugin.

[Events Manager](http://wp-events-plugin.com/)  is a free and feature-filled events plugin for the WordPress platform, providing the ability to publish events, locations and manage bookings among many other features.

Quickly and easily create events, accept bookings, and manage attendees.

## Contents
- [Installation](#installation)
- [REST API](#rest-api)

## Installation

Install and Run [Wamp Server](http://www.wampserver.com/en/)

Enable Apache Modules:  rewrite_module, filter_module

Unzip or Clone the repository into the folder www in wamp.

Create a MySQL database (toofestival.es) using phpMyAdmin.

Import the database from database/tf_schema.sql into the created in the step below. 


## REST API

Access the WordPress site's data through an easy-to-use HTTP REST API.

### REST API Developer Endpoint Reference

|   Resource        |  Base Route                            |
| ----------------- |:--------------------------------------:|
| Events	          | /wp-json/eventsmanager/v1/events/      |
| Events Categories | /wp-json/eventsmanager/v1/categories/  |



|[![WordPress](https://3vdesignmedia.com/wp-content/uploads/2015/09/wordpress-logo1.png "WordPress")](https://wordpress.org/)|[![Events Manager](http://d1mkunav5pg7l3.cloudfront.net/wp-content/themes/wp-events-plugin/images/logo-header.png "Events Manager")](http://wp-events-plugin.com/)|
| ------------- |:-------------:|
