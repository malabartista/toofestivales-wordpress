=== Couchsurfing API ===
Contributors: dfactory
Donate link: http://www.dfactory.eu/
Tags: cookie, cookies, notice, notification, notify, cookie, cookie compliance, cookie law, eu cookie, privacy, privacy directive, consent, Bootstrap
Requires at least: 3.3
Tested up to: 4.6
Stable tag: 1.2.36.1
License: MIT License
License URI: http://opensource.org/licenses/MIT

Couchsurfing API allows you to connect to Couchsurfing Rest Api to get information.

== Description ==

[Couchsurfing API](http://www.dfactory.eu/plugins/cookie-notice/) allows you to elegantly inform users that your site uses cookies and to comply with the EU cookie law regulations.

For more information, check out plugin page at [dFactory](http://www.dfactory.eu/) or plugin [support forum](http://www.dfactory.eu/support/forum/cookie-notice/).

= Features include: =

* Customize the cookie message
* Redirect users to specified page for more cookie information
* Set cookie expiry
* Link to more info page
* Option to accept cookies on scroll
* Option to set on scroll offset
* Option to refuse functional cookies
* Select the position of the cookie message box
* Animate the message box after cookie is accepted
* Select bottons style from None, WordPress and Bootstrap
* Set the text and bar background colors
* WPML and Polylang compatible
* .pot file for translations included

= Usage: =

If you'd like to code a functionality depending on the cookie notice value use the function below:

`if ( function_exists('cn_cookies_accepted') && cn_cookies_accepted() ) {
	// Your third-party non functional code here
}`

= Get involved =

Feel free to contribute to the source code on the [dFactory GitHub Repository](https://github.com/dfactoryplugins).

== Installation ==

1. Install Cookie Notice either via the WordPress.org plugin directory, or by uploading the files to your server
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to the Cookie Notice settings and set your options.

== Frequently Asked Questions ==

No questions yet.

== Screenshots ==

1. screenshot-1.png

== Changelog ==

= 1.2.36.1 =
* Fix: Repository upload issue with 1.2.36

= 1.2.36 =
* Fix: String translation support for WMPL 3.2+ 
* Fix: Global var possible conflict with other plugins
* Tweak: Add $options array to "cn_cookie_notice_output" filter, thanks to [chesio](https://github.com/chesio).
* Tweak: Removed local translation files in favor of WP repository translations.