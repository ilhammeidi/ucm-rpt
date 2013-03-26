UC Merced Research Process Tutorial
=======
This tutorial is based on a tutorial hosted at the [UC Irvine Libraries] (http://www.lib.uci.edu/uc-research-tutorial/begin.html). UC Merced Library staff have transferred the tutorial content to Drupal. Primary changes have included converting much of the content from Flash to HTML5, using CSS to format content display, and including quizzes for each module from which participation rates and scores can be recorded and retrieved. 

INSTALLATION
--------
1. Download [Drupal 6] (http://drupal.org/project/drupal). 
  * We are using Drupal 6 because the [Quiz Module] (http://drupal.org/project/quiz) is not fully compatible with Drupal 7 yet.
2. Unarchive the Drupal 6 package to your web server.
3. Create a blank database for the Drupal installation.
4. Import the ucm-rpt.sql into the database.
5. Update the database information in sites/default/settings.php
6. Clone this repository into your Drupal 6 root directory: `$ git clone https://github.com/ucmlibrary/ucm-rpt.git /path/to/drupal6`. 
  * Or download the [Zip File] (https://github.com/ucmlibrary/ucm-rpt/archive/master.zip) and unzip it into your Drupal 6 root directory.
7. Browse to `http://yoursite.tld/user/`. 
  * Username is `rptadmin`. _*Change the username if desired.*_
  * Password is `ChangeMePlease!`. _*Change the password.*_

CUSTOMIZATON
---------
* THEME. We are using a customized version of the Minelli theme. The CSS files are located in [sites/all/themes/ucmrpt-fluid/ucmrpt-fixed/](sites/all/themes/ucmrpt-fluid/ucmrpt-fixed/).
* HEADER LINKS. The links to the different libraries are in the headers are in a custom HTML block at `http://yoursite.tld/admin/build/block/configure/block/1`. Admin login is required.
* SECTION LINKS. The links for the main sections are in the same block as the Header links.
* SUBSECTION LINKS. The links for the different subsections are found at `http://yoursite.tld/admin/build/menu` under the each main section.
* QUIZ LINKS. The links to the quizzes are in the menu labled "Quizzes."
* FOOTER LINKS. The links at the bottom of pages are located in the block named "Navigation for bottom of RPT pages."
* SOCIAL LINKS. The Facebook, Google+, and Twitter buttons are located in the same block as the footer links.
* FEEDBACK LINK. The feedback link uses the [Feedback module] (http://drupal.org/project/feedback). Feedback messages are recorded at `http://yoursite.tld/admin/reports/feedback`.

----
<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.en_US"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">University of California (UC) Libraries "Begin Research Tutorial" is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.en_US"> Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License</a>.
Please contact us through GitHub for reuse of the content that falls outside the scope of this license.
