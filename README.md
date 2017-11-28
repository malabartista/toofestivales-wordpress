# [TooFestival.es](http://toofestival.es/) - WordPress

Our [WordPress](https://wordpress.org/) with the most popular [Events Management](http://wp-events-plugin.com/) plugin.

[Events Manager](http://wp-events-plugin.com/)  is a free and feature-filled events plugin for the WordPress platform, providing the ability to publish events, locations and manage bookings among many other features.

Quickly and easily create events, accept bookings, and manage attendees.

Access the WordPress site's data through an easy-to-use HTTP REST API.

## Contents
- [Installation](#installation)
- [REST API](#rest-api)

## Installation

## REST API

The WordPress REST API is organized around REST, and is designed to have predictable, resource-oriented URLs and to use HTTP response codes to indicate API errors. The API uses built-in HTTP features, like HTTP authentication and HTTP verbs, which can be understood by off-the-shelf HTTP clients, and supports cross-origin resource sharing to allow you to interact securely with the API from a client-side web application.

The REST API uses JSON exclusively as the request and response format, including error responses. While the REST API does not completely conform to the HAL standard, it does implement HAL’s ._links and ._embedded properties for linking API resources, and is fully discoverable via hyperlinks in the responses.

### REST API Developer Endpoint Reference

|   Resource        |  Base Route                            |
| ----------------- |:--------------------------------------:|
| Events	          | /wp-json/eventsmanager/v1/events/      |
| Events Categories | /wp-json/eventsmanager/v1/categories/  |



|[![WordPress](https://3vdesignmedia.com/wp-content/uploads/2015/09/wordpress-logo1.png "WordPress")](https://wordpress.org/)|[![Events Manager](http://d1mkunav5pg7l3.cloudfront.net/wp-content/themes/wp-events-plugin/images/logo-header.png "Events Manager")](http://wp-events-plugin.com/)|
| ------------- |:-------------:|
