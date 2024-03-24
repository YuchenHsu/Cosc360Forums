# Cosc360Forums

360 project on making a forum like reddit.

## Proposal

### Details of team members (name, student number, and github username)

* Ethan Hsu 43371855 YuchenHsu
* Beth Ralston 18799312 mblackbeak
* Jacob Tizel 75492660 jacobtizel

### Project description and details:

### Use snake case for all variables, file names, and github branches (everything!)

#### Provide a description of the project you are going to undertake

* MyDiscussionForum Website: The MyDiscussionForum website will allow registered users to engage in online discussions and unregistered users to view discussions similar to forums such as Reddit. The goal is to produce a similar type service that allows users to register, post stories and make comments on items.   Additionally, unregistered users must be able to search and view the content but will not be able to edit or comment on posts. Registered users should be able to leave comments/feedback. Functionality must exist for searching/categorizing items.

#### Requirements list of what (at a minimum) your site will do (you will need to explore existing sites to understand their functional offerings). You should be able to understand from reading this document exactly what a user/administrator will be able to do on the site.  You will receive feedback on this so that you can direct the efforts of your project accordingly.

* General:
  * Pinned post (patch notes)
  * View posts
  * Posts preview
  * Login, register.
  * Search posts
  * Post recommendations
  * View user page (post and comment history)
  * Top posts
  * Collapsible items/threads without page reloading
* Logged in:
  * Notifications
  * Make a post (text, image, videos)
  * Editing the post
  * Replying to the post (comment)
  * Edit profile
  * Positively/negatively engage with posts (upvote, downvote)
* Admin:
  * System analysis (filterting)
  * Moderate/resolve issues
  * Usage reports
  * Search for user by name
  * Edit/remove posts items or complete posts
  * Enable/disable users
  * Visual display of updates, site usage charts, etc

## Minimal Core Functionality Milestone
* [Posted on cosc360.ok.ubc.ca](https://cosc360.ok.ubc.ca/jtizel)

* Client-side security -  Can be seen in the javascript folder
  * Prevents the default submit
  * Checks if text inputs are empty
  * Checks if at least one check box is checked
  * Checks that the expected file upload is an image
  * Checks that inputs are recieving the expected data
  * Displays alert errors if anything fails to be correct and does not submit the forms

* Server-side security - Php files are in the html folder
  * Checks that the expected server Request Method is correct
  * Checks if the server variables are set
  * Checks if any of the input is empty
  * Checks the expected input is correct
    * Checks format of usernames, passwords, images
  * Checks the image size
  * Gives errors and fails to update the database if any check does not pass

* Server-side scripting with PHP 
  * See html folder
  * All functions are implemented using php, javascript, and html
* Data storage in MySQL 
  * All of the websites information and database is stored on the cosc 360 server.
  * You can view the basic database structure in the sql folder
  * User images (thumbnail) and profile stored in a database
  * Discussion thread storage in database
* Asynchronous updates - See javascript files to see how things are loaded with ajax
  * All toggling of website pages and loading of page information such as posts, and profile is loaded using ajax
* Core functional components operational (see baseline objectives)
  * Browse discussions without registering
Search for items/posts by keyword without registering
    * posts.php, search.php and commonjq_new.js
    * Please try the 'seach bar' on the top bar of our website
  * Register at the site by providing their name, e-mail and image
    * register.php, reg_function.php, and commonjq_new.js
    * Please try registering on our website by click on the 'Register' Button
  * Allow user login by providing user id and password
    * lgoin.php, login_function.php, commonjq_new.js
    * Please try logging in on our website after creating an account by clicking on the 'Login' Button
  * Create and comment when logged into the site
    * comments.php, comment_function.php, commonjq_new.js
    * Please try commenting on a post once logged in by typing a comment and clicking 'Post Comment'
  * Users are required to be able to view/edit their profile
    * edit_profile_function.php, profile.php, profile_posts.php, edit_post.php, edit_post_function.php, commonjq_new.js
    * Please try by going to the profile by clicking the 'Profile' Button and edit by clicking the 'Edit Profile' Button
  * Website administrator’s objectives:
    * Search for user by name, email or post
    * Enable/disable users
    * Edit/remove posts items or complete posts 
    * admin_analytics.php, admin_ban_users.php, admin_conflicts.php, admin_delete_posts.php, amdin_enable_users.php, admin_moderation.php, admin_post.php, admin_reported_posts.php, admin_reports.php, admin_resolve_conflicts.php, admin_search.php, admin_user.php, admin.php, edit_post.php, edit_post_function.php, commonjq_new.js, admin.js
    * Please see by logging in as an Admin and going to the Admin page by clicking the 'Admin' Button
* Hand-styled layout with contextual menus (i.e. when a user has logged on to the site, menus reflect the change). Layout frameworks are not permitted other than Bootstrap (see above).
  * Please see the topbar differences
* 2 or 3-column layout using appropriate design principles (i.e. highlighting nav links when hovered over, etc) responsive design
  * Please see admin page
* Site must maintain state (user state being logged on, etc)
  * Implemented using cookies and sessions
* Responsive design philosophy (minimum requirements for different non-mobile display sizes)
  * Please view the css in the css folder
* Simple discussion (topics) grouping and display
  * Can search through posts by choosing a category from a dropdown menu
* Navigation breadcrumb strategy (i.e. users can determine where they are in threads)
  * Can be seen at the top of each page
  * Please reference commonjq_new.js
* Error handling (bad navigation)
  * All pages are loaded using ajax from the base.php file, this allows for it to be next to impossible to naviagate without using buttons