<?php

/**
 * Header Navbar Search
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$type_form  = wpzaro_theme_setting('wpzaro_searchform_header_type', 'dropdown');

?>

<?php if ($type_form == 'inline') : ?>

    <div class="header-search">
        <form class="d-flex" role="search" method="GET" action="<?php echo esc_url(home_url('/')); ?>">
            <input class="form-control me-2" name="s" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </form>
    </div>

<?php elseif ($type_form == 'modal') : ?>

    <div class="header-search d-none d-md-inline-block">
        <span class="nav-link px-2" data-bs-toggle="modal" data-bs-target="#searchNavbarModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </span>
    </div>

    <?php add_action('wp_footer', 'search_navbar_modal'); ?>
    <?php function search_navbar_modal()
    { ?>
        <!-- Modal -->
        <div class="modal fade" id="searchNavbarModal" tabindex="-1" aria-labelledby="searchNavbarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content mt-5">
                    <div class="modal-body">
                        <form class="d-flex" role="search" method="GET" action="<?php echo esc_url(home_url('/')); ?>">
                            <input class="form-control me-2" name="s" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-dark" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<?php else : ?>

    <div class="header-search">
        <div class="nav-item dropdown nav-search dropdown-toggle-icon-none">
            <a class="nav-link pe-0 dropdown-toggle-none" role="button" href="#" id="navbarSearch" data-bs-toggle="dropdown" aria-expanded="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow rounded p-2" aria-labelledby="navbarSearch" style="min-width: 15em;" data-bs-popper="none">
                <form class="input-group" method="GET" action="<?php echo esc_url(home_url('/')); ?>">
                    <input class="form-control" name="s" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-secondary m-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

<?php endif; ?>