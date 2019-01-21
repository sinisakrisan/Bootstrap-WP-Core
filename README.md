# Core; Bootstrap 4 Theme, for WordPress 5

#### Version 1.0

**Forked from:** B4ST https://github.com/SimonPadbury/b4st

**Third Party Scripts Used:**
- WP Bootstrap Navwalker https://github.com/wp-bootstrap/wp-bootstrap-navwalker

## Description
Core Theme is a simple, Gutenberg-compatible WordPress starter theme loaded with Bootstrap 4 and Font Awesome 5.

### Dependencies
- Bootstrap 4 enqueued and served from the theme
- jQuery and Modernizr enqueued and served from the WordPress
- Bootstrap 4 and Popper javascripts engueued and served from the theme
- Font Awesome 5 – enqueued and served by *use.fontawesome.com*

### Bootstrap Integration
- Bootstrap navbar with WordPress menu and search
- Navbar dropdowns (child menus) are handled by a third-party walker nav menu class.
- Bootstrap customized comments and feedback response form.
- Bootstrap pagination for:
  * Blog index and blog category pages
  * Bootstrap pagination for posts/pages if split over a series of 'pages'

### Gutenberg Compatibility

    Gutenberg editor stylesheet – into which has been copy-pasted the typography styles from Bootstrap 4’s Reboot CSS (see http://getbootstrap.com/docs/4.1/content/reboot/).
        Note: Blog post and page content in theme’s frontend are controlled by Bootstrap’s columnar grid layout – not by the Gutenberg editor CSS. This means that b4st does not support Gutenberg’s extra-wide image blocks.

Child-Theme Friendly

    Many functions are pluggable.
        Note: Although b4st was originally intended as a simple starter theme (hence the name b4st), several developers wanted child theme capability. So the functions have been made ‘pluggable’. (However, b4st can still be used as a starter theme.)

    Theme hooks – paired before and after the navbar, post/page main, (optional sidebar) and footer. Parent theme hooks are able to recieve actions from a child theme.

    Also, the navbar brand, navbar search form and sub-footer “bottomline” are inserted using pluggable hooks. So, a child theme can override these.

    Documentation on b4st theme hooks can be found in the wiki.

