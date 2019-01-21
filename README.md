Bootstrap WP Core – A Bootstrap 4 Core Theme, for WordPress 5

Version 1.0

https://github.com/SimonPadbury/b4st

b4st is a simple, Gutenberg-compatible WordPress starter theme loaded with Bootstrap 4 and Font Awesome 5.
Basic features

    UNLICENCE (open source).

    Simple, intuitive, clean code. Theme CSS and JS, functions and loops are organized into different folders.

    A starter CSS theme – /theme/css/b4st.css, enqueued. (Note: do not put your styles in styles.css, because that is not enqueued.)

    Sidebar-widget-area is optional. If no widgets are dropped into the sidebar, then the sidebar will not be shown on the frontend (and so the main column is automatically the full width of the Bootstrap .container).

Dependencies

    jQuery and Modernizr – enqueued (served from the WordPress core).

    Bootstrap 4.1.3 CSS – enqueued (served by cdnjs.com CDN).

    Bootstrap 4.1.3 and Popper 1.14.3 bundle JS – enqueued (served by cdnjs.com CDN). Popper is needed by Bootstrap popovers, tooltips and collapsed navbar “hamburger” action.

    Font Awesome 5.6.1 – enqueued (CSS served by use.fontawesome.com CDN).

Bootstrap Integration

    Bootstrap navbar with WordPress menu and search.
        Navbar dropdowns (child menus) are handled by a custom walker nav menu class.

    Bootstrap customized comments and feedback response form.

    Bootstrap pagination for:
        blog index and blog category pages
        Bootstrap pagination for posts/pages if split over a series of 'pages'

Gutenberg Compatibility

    Gutenberg editor stylesheet – into which has been copy-pasted the typography styles from Bootstrap 4’s Reboot CSS (see http://getbootstrap.com/docs/4.1/content/reboot/).
        Note: Blog post and page content in theme’s frontend are controlled by Bootstrap’s columnar grid layout – not by the Gutenberg editor CSS. This means that b4st does not support Gutenberg’s extra-wide image blocks.

Child-Theme Friendly

    Many functions are pluggable.
        Note: Although b4st was originally intended as a simple starter theme (hence the name b4st), several developers wanted child theme capability. So the functions have been made ‘pluggable’. (However, b4st can still be used as a starter theme.)

    Theme hooks – paired before and after the navbar, post/page main, (optional sidebar) and footer. Parent theme hooks are able to recieve actions from a child theme.

    Also, the navbar brand, navbar search form and sub-footer “bottomline” are inserted using pluggable hooks. So, a child theme can override these.

    Documentation on b4st theme hooks can be found in the wiki.

