<?php

/**
 * wpzaro Theme Customizer use Kirki
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!class_exists('Kirki') || class_exists('Kirki') && KIRKI_VERSION < 4)
    return false;

//Layout Panel
new \Kirki\Panel(
    'general_id',
    [
        'priority'    => 10,
        'title'       => esc_html__('General', 'wpzaro'),
        'description' => esc_html__('General theme settings.', 'wpzaro'),
    ]
);
//Container Section
new \Kirki\Section(
    'section_container',
    [
        'title'       => esc_html__('Container', 'wpzaro'),
        'description' => esc_html__('Container settings.', 'wpzaro'),
        'panel'       => 'general_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Dimension(
    [
        'settings'    => 'wpzaro_container_width',
        'label'       => esc_html__('Max width container', 'wpzaro'),
        'description' => esc_html__('Max width container default (px)', 'wpzaro'),
        'section'     => 'section_container',
        'default'     => '1140px',
        'choices'     => [
            'accept_unitless' => true,
        ],
        'output' => array(
            array(
                'element'  => '.container',
                'property' => 'max-width',
            ),
        ),
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_container_type',
        'label'       => esc_html__('Container Type', 'wpzaro'),
        'section'     => 'section_container',
        'default'     => 'container',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose between Theme container and container-fluid', 'wpzaro'),
        'choices'     => [
            'container'       => esc_html__('Fixed width container', 'wpzaro'),
            'container-fluid' => esc_html__('Full width container', 'wpzaro'),
        ],
    ]
);
//Typography Section
new \Kirki\Section(
    'section_typography',
    [
        'title'       => esc_html__('Typography', 'wpzaro'),
        'description' => esc_html__('Typography global settings.', 'wpzaro'),
        'panel'       => 'general_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Typography(
    [
        'settings'    => 'wpzaro_typography_global',
        'label'       => esc_html__('Typography', 'wpzaro'),
        'description' => esc_html__('Select typography options for global', 'wpzaro'),
        'section'     => 'section_typography',
        'priority'    => 10,
        'transport'   => 'auto',
        'default'     => [
            'font-family'     => 'Roboto',
            'variant'         => 'regular',
            'font-style'      => 'normal',
            'font-size'       => '14px',
            'line-height'     => '1.5',
            'letter-spacing'  => '0',
            'text-transform'  => 'none',
            'text-decoration' => 'none',
            'text-align'      => 'left',
        ],
        'output'      => [
            [
                'element' => 'body,.is-root-container',
            ],
        ],
    ]
);
new \Kirki\Field\Multicolor(
    [
        'settings'  => 'wpzaro_typography_color_global',
        'label'     => esc_html__('Typography Color', 'wpzaro'),
        'section'   => 'section_typography',
        'priority'  => 10,
        'choices'   => [
            'color'    => esc_html__('Color', 'wpzaro'),
            'link'     => esc_html__('Link', 'wpzaro'),
            'hover'    => esc_html__('Hover', 'wpzaro'),
            'active'   => esc_html__('Active', 'wpzaro'),
        ],
        'alpha'     => true,
        'default'   => [
            'color'  => '#333333',
            'link'   => '#0063b1',
            'hover'  => '#333333',
            'active' => '#0063b1',
        ],
        'output'    => [
            [
                'choice'    => 'color',
                'element'   => '[data-bs-theme="light"] body,.is-root-container',
                'property'  => 'color',
            ],
            [
                'choice'    => 'link',
                'element'   => '[data-bs-theme="light"] a:not(.btn)',
                'property'  => 'color',
            ],
            [
                'choice'    => 'hover',
                'element'   => '[data-bs-theme="light"] a:not(.btn):hover',
                'property'  => 'color',
            ],
            [
                'choice'    => 'active',
                'element'   => '[data-bs-theme="light"] a:not(.btn):active',
                'property'  => 'color',
            ],
        ],
    ]
);
//Sidebar Section
new \Kirki\Section(
    'section_sidebar',
    [
        'title'       => esc_html__('Sidebar', 'wpzaro'),
        'description' => esc_html__('Sidebar settings.', 'wpzaro'),
        'panel'       => 'general_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_sidebar_position',
        'label'       => esc_html__('Sidebar Positioning', 'wpzaro'),
        'section'     => 'section_sidebar',
        'default'     => 'right',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.', 'wpzaro'),
        'choices'     => [
            'right' => esc_html__('Right sidebar', 'wpzaro'),
            'left'  => esc_html__('Left sidebar', 'wpzaro'),
            'both'  => esc_html__('Left & Right sidebars', 'wpzaro'),
            'none'  => esc_html__('No sidebar', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Slider(
    [
        'settings'    => 'wpzaro_sidebar_width',
        'label'       => esc_html__('Sidebar Width', 'wpzaro'),
        'section'     => 'section_sidebar',
        'default'     => 30,
        'transport'   => 'auto',
        'choices'     => [
            'min'  => 10,
            'max'  => 60,
            'step' => 1,
        ],
        'output' => [
            [
                'element'  => '.widget-area',
                'property' => 'max-width',
                'units'    => '%',
                'media_query' => '@media (min-width: 768px)',
            ],
        ],
    ]
);
new \Kirki\Field\Checkbox_Switch(
    [
        'settings'    => 'wpzaro_widget_classic',
        'label'       => esc_html__('Widget Classic', 'wpzaro'),
        'description' => esc_html__('Use Classic Widget', 'wpzaro'),
        'section'     => 'section_sidebar',
        'default'     => 'off',
        'choices'     => [
            'on'  => esc_html__('Enable', 'wpzaro'),
            'off' => esc_html__('Disable', 'wpzaro'),
        ],
    ]
);

//Background Section
new \Kirki\Section(
    'section_background',
    [
        'title'       => esc_html__('Background', 'wpzaro'),
        'description' => esc_html__('Background settings.', 'wpzaro'),
        'panel'       => 'general_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Background(
    [
        'settings'    => 'wpzaro_background_body',
        'label'       => esc_html__('Background', 'wpzaro'),
        'description' => esc_html__('Background controls for body website', 'wpzaro'),
        'section'     => 'section_background',
        'default'     => [
            'background-color'      => '#ffffff',
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '[data-bs-theme="light"] body',
            ],
        ],
    ]
);

//Header Panel
new \Kirki\Panel(
    'header_id',
    [
        'priority'    => 10,
        'title'       => esc_html__('Header', 'wpzaro'),
        'description' => esc_html__('Theme head layout setting.', 'wpzaro'),
    ]
);
//Navbar Site Identity
new \Kirki\Section(
    'title_tagline',
    [
        'title'       => esc_html__('Site Identity', 'wpzaro'),
        'description' => esc_html__('Site Identity settings.', 'wpzaro'),
        'panel'       => 'header_id',
        'priority'    => 160,
    ]
);

//Navbar layout Section
new \Kirki\Section(
    'section_layout_navbar',
    [
        'title'       => esc_html__('Navbar', 'wpzaro'),
        'description' => esc_html__('Header Navbar settings.', 'wpzaro'),
        'panel'       => 'header_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Repeater(
    [
        'settings' => 'wpzaro_navbar_parts',
        'label'    => esc_html__('Part Navbar', 'wpzaro'),
        'section'  => 'section_layout_navbar',
        'priority' => 10,
        'row_label' => [
            'type'  => 'field',
            'value' => esc_html__('Part', 'wpzaro'),
            'field' => 'part',
        ],
        'fields'   => [
            'part'   => [
                'type'          => 'select',
                'label'         => esc_html__('Part', 'wpzaro'),
                'default'       => 'logo',
                'choices'       => [
                    'logo'          => esc_html__('Logo', 'wpzaro'),
                    'menu'          => esc_html__('Primary Menu', 'wpzaro'),
                    'search'        => esc_html__('Search', 'wpzaro'),
                    'secondarymenu' => esc_html__('Secondary Menu', 'wpzaro'),
                    'offcanvas'     => esc_html__('Offcanvas', 'wpzaro'),
                    'darkmode'      => esc_html__('Darkmode', 'wpzaro'),
                ],
            ],
            'column'   => [
                'type'          => 'radio',
                'label'         => esc_html__('Column', 'wpzaro'),
                'default'       => 'col-md-4',
                'choices'       => [
                    'col-md-1'      => esc_html__('1', 'wpzaro'),
                    'col-md-2'      => esc_html__('2', 'wpzaro'),
                    'col-md-3'      => esc_html__('3', 'wpzaro'),
                    'col-md-4'      => esc_html__('4', 'wpzaro'),
                    'col-md-5'      => esc_html__('5', 'wpzaro'),
                    'col-md-6'      => esc_html__('6', 'wpzaro'),
                    'col-md-7'      => esc_html__('7', 'wpzaro'),
                    'col-md-8'      => esc_html__('8', 'wpzaro'),
                    'col-md-9'      => esc_html__('9', 'wpzaro'),
                    'col-md-10'     => esc_html__('10', 'wpzaro'),
                    'col-md-11'     => esc_html__('11', 'wpzaro'),
                    'col-md-12'     => esc_html__('12', 'wpzaro'),
                    'col-md'        => esc_html__('Auto', 'wpzaro'),
                    'hide'          => esc_html__('Hidden', 'wpzaro'),
                ],
            ],
            'column_small'   => [
                'type'          => 'radio',
                'label'         => esc_html__('Column Small', 'wpzaro'),
                'default'       => 'col-12',
                'choices'       => [
                    'col-1'     => esc_html__('1', 'wpzaro'),
                    'col-2'     => esc_html__('2', 'wpzaro'),
                    'col-3'     => esc_html__('3', 'wpzaro'),
                    'col-4'     => esc_html__('4', 'wpzaro'),
                    'col-5'     => esc_html__('5', 'wpzaro'),
                    'col-6'     => esc_html__('6', 'wpzaro'),
                    'col-7'     => esc_html__('7', 'wpzaro'),
                    'col-8'     => esc_html__('8', 'wpzaro'),
                    'col-9'     => esc_html__('9', 'wpzaro'),
                    'col-10'    => esc_html__('10', 'wpzaro'),
                    'col-11'    => esc_html__('11', 'wpzaro'),
                    'col-12'    => esc_html__('12', 'wpzaro'),
                    'col'       => esc_html__('Auto', 'wpzaro'),
                    'hide'      => esc_html__('Hidden', 'wpzaro'),
                ],
            ],
            'align'   => [
                'type'          => 'radio',
                'label'         => esc_html__('Align', 'wpzaro'),
                'default'       => 'start',
                'choices'       => [
                    'start'     => esc_html__('Left', 'wpzaro'),
                    'center'    => esc_html__('Center', 'wpzaro'),
                    'end'       => esc_html__('Right', 'wpzaro'),
                ],
            ],
        ],
        'default'  => [
            [
                'part'          => 'logo',
                'column'        => 'col-md-2',
                'column_small'  => 'col-10',
                'align'         => 'start',
            ],
            [
                'part'          => 'menu',
                'column'        => 'col-md-9',
                'column_small'  => 'col-2',
                'align'         => 'end',
            ],
            [
                'part'          => 'search',
                'column'        => 'col-md-1',
                'column_small'  => 'hide',
                'align'         => 'end',
            ],
        ],
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_navbar_parts_alignitems',
        'label'       => esc_html__('Align Items', 'wpzaro'),
        'section'     => 'section_layout_navbar',
        'default'     => 'align-items-center',
        'priority'    => 10,
        'choices'     => [
            'align-items-center'    => esc_html__('Center', 'wpzaro'),
            'align-items-start'     => esc_html__('Start', 'wpzaro'),
            'align-items-end'       => esc_html__('End', 'wpzaro'),
            'align-items-stretch'   => esc_html__('Stretch', 'wpzaro'),
        ],
    ]
);

//Navbar Style Section
new \Kirki\Section(
    'section_style_navbar',
    [
        'title'       => esc_html__('Style', 'wpzaro'),
        'description' => esc_html__('Header style settings.', 'wpzaro'),
        'panel'       => 'header_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_navbar_container_type',
        'label'       => esc_html__('Container Type', 'wpzaro'),
        'section'     => 'section_style_navbar',
        'default'     => 'default',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose between Theme container and container-fluid, or default', 'wpzaro'),
        'choices'     => [
            'default'         => esc_html__('Default', 'wpzaro'),
            'container'       => esc_html__('Fixed width container', 'wpzaro'),
            'container-fluid' => esc_html__('Full width container', 'wpzaro'),
            'container-fixed' => esc_html__('Fixed width container & content', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_navbar_sticky',
        'label'       => esc_html__('Sticky Navbar', 'wpzaro'),
        'section'     => 'section_style_navbar',
        'default'     => 'sticky-none',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose sticky for header.', 'wpzaro'),
        'choices'     => [
            'sticky-none'   => esc_html__('No', 'wpzaro'),
            'sticky-top'    => esc_html__('Yes', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_navbar_overlay',
        'label'       => esc_html__('Overlay Navbar', 'wpzaro'),
        'section'     => 'section_style_navbar',
        'default'     => 'disable',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Overlay header with transparent background.', 'wpzaro'),
        'choices'     => [
            'disable'   => esc_html__('No', 'wpzaro'),
            'enable'    => esc_html__('Yes', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Dimension(
    [
        'settings'    => 'wpzaro_header_logo_width',
        'label'       => esc_html__('Logo Width', 'wpzaro'),
        'description' => esc_html__('Max width logo default (px)', 'wpzaro'),
        'section'     => 'section_style_navbar',
        'default'     => '180px',
        'choices'     => [
            'accept_unitless' => true,
        ],
        'output' => array(
            array(
                'element'  => '.navbar-brand img',
                'property' => 'max-width',
            ),
        ),
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_navbar_shadow',
        'label'       => esc_html__('Header Shadow', 'wpzaro'),
        'section'     => 'section_style_navbar',
        'default'     => 'shadow-sm',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose style shadow for header.', 'wpzaro'),
        'choices'     => [
            'shadow-none'   => esc_html__('None', 'wpzaro'),
            'shadow-sm'     => esc_html__('Small', 'wpzaro'),
            'shadow'        => esc_html__('Regular', 'wpzaro'),
            'shadow-lg'     => esc_html__('Larger', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Background(
    [
        'settings'    => 'wpzaro_header_background',
        'label'       => __('Background Color', 'wpzaro'),
        'description' => esc_html__('', 'wpzaro'),
        'section'     => 'section_style_navbar',
        'default'     => [
            'background-color'  => '#ffffff',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'html[data-bs-theme="light"] #main-nav',
            ],
        ],
    ]
);
//Navbar Menu Section
new \Kirki\Section(
    'section_menu_navbar',
    [
        'title'       => esc_html__('Primary Menu', 'wpzaro'),
        'description' => esc_html__('Header menu settings.', 'wpzaro'),
        'panel'       => 'header_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_navbar_type',
        'label'       => esc_html__('Responsive Header Menu Type', 'wpzaro'),
        'section'     => 'section_menu_navbar',
        'default'     => 'offcanvas',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose between an expanding and collapsing navbar or an offcanvas drawer.', 'wpzaro'),
        'choices'     => [
            'collapse'  => esc_html__('Collapse', 'wpzaro'),
            'offcanvas' => esc_html__('Offcanvas', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Typography(
    [
        'settings'    => 'wpzaro_menu_header_typography',
        'label'       => esc_html__('Typography', 'wpzaro'),
        'description' => esc_html__('', 'wpzaro'),
        'section'     => 'section_menu_navbar',
        'priority'    => 10,
        'transport'   => 'auto',
        'default'     => [
            'variant'         => 'regular',
            'font-style'      => 'normal',
            'font-size'       => '14px',
            'line-height'     => '1.5',
            'letter-spacing'  => '0',
            'text-transform'  => 'none',
            'text-decoration' => 'none',
        ],
        'output'      => [
            [
                'element' => '#main-menu .nav-link',
            ],
        ],
    ]
);
new \Kirki\Field\Multicolor(
    [
        'settings'  => 'wpzaro_menu_header_link_color',
        'label'     => esc_html__('Link Color', 'wpzaro'),
        'section'   => 'section_menu_navbar',
        'priority'  => 10,
        'choices'   => [
            'color'    => esc_html__('Color', 'wpzaro'),
            'hover'    => esc_html__('Hover', 'wpzaro'),
            'active'   => esc_html__('Active', 'wpzaro'),
        ],
        'alpha'     => true,
        'default'   => [
            'color'  => '#333333',
            'hover'  => '#9d9a9a',
            'active' => '#333333',
        ],
        'output'    => [
            [
                'choice'    => 'color',
                'element'   => '[data-bs-theme="light"] #main-menu .nav-link,[data-bs-theme="light"] #main-menu .dropdown-item',
                'property'  => 'color',
            ],
            [
                'choice'    => 'hover',
                'element'   => '[data-bs-theme="light"] #main-menu .nav-link:hover,[data-bs-theme="light"] #main-menu .dropdown-item:hover',
                'property'  => 'color',
            ],
            [
                'choice'    => 'active',
                'element'   => '[data-bs-theme="light"] #main-menu .nav-link:active,[data-bs-theme="light"] #main-menu .dropdown-item:active',
                'property'  => 'color',
            ],
        ],
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_menu_header_aligment',
        'label'       => esc_html__('Aligment', 'wpzaro'),
        'section'     => 'section_menu_navbar',
        'default'     => 'ms-auto',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose Aligment for menu header.', 'wpzaro'),
        'choices'     => [
            'ms-auto'   => esc_html__('Right', 'wpzaro'),
            'me-auto'   => esc_html__('Left', 'wpzaro'),
            'mx-auto'   => esc_html__('Center', 'wpzaro'),
        ],
    ]
);

//Navbar Search Section
new \Kirki\Section(
    'section_search_navbar',
    [
        'title'       => esc_html__('Search Form', 'wpzaro'),
        'description' => esc_html__('Header Search Form settings.', 'wpzaro'),
        'panel'       => 'header_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_searchform_header_type',
        'label'       => esc_html__('Type', 'wpzaro'),
        'section'     => 'section_search_navbar',
        'default'     => 'dropdown',
        'placeholder' => esc_html__('Choose type', 'wpzaro'),
        'description' => esc_html__('Choose type form search.', 'wpzaro'),
        'choices'     => [
            'dropdown'  => esc_html__('Dropdown with icon', 'wpzaro'),
            'inline'    => esc_html__('Inline Form', 'wpzaro'),
            'modal'     => esc_html__('Modal with icon', 'wpzaro'),
        ],
    ]
);

//Navbar Secondary Menu Section
new \Kirki\Section(
    'section_secondarymenu_navbar',
    [
        'title'       => esc_html__('Secondary Menu', 'wpzaro'),
        'description' => esc_html__('Secondary menu settings.', 'wpzaro'),
        'panel'       => 'header_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Typography(
    [
        'settings'    => 'wpzaro_secondarymenuheader_typography',
        'label'       => esc_html__('Typography', 'wpzaro'),
        'description' => esc_html__('', 'wpzaro'),
        'section'     => 'section_secondarymenu_navbar',
        'priority'    => 10,
        'transport'   => 'auto',
        'default'     => [
            'variant'         => 'regular',
            'font-style'      => 'normal',
            'font-size'       => '14px',
            'line-height'     => '1.5',
            'letter-spacing'  => '0',
            'text-transform'  => 'none',
            'text-decoration' => 'none',
        ],
        'output'      => [
            [
                'element' => '.navbar-secondary-menu .nav-link',
            ],
        ],
    ]
);
new \Kirki\Field\Multicolor(
    [
        'settings'  => 'wpzaro_secondarymenu_header_link_color',
        'label'     => esc_html__('Link Color', 'wpzaro'),
        'section'   => 'section_secondarymenu_navbar',
        'priority'  => 10,
        'choices'   => [
            'color'    => esc_html__('Color', 'wpzaro'),
            'hover'    => esc_html__('Hover', 'wpzaro'),
            'active'   => esc_html__('Active', 'wpzaro'),
        ],
        'alpha'     => true,
        'default'   => [
            'color'  => '#333333',
            'hover'  => '#9d9a9a',
            'active' => '#333333',
        ],
        'output'    => [
            [
                'choice'    => 'color',
                'element'   => '[data-bs-theme="light"] #secondary-menu .nav-link,[data-bs-theme="light"] #secondary-menu .dropdown-item',
                'property'  => 'color',
            ],
            [
                'choice'    => 'hover',
                'element'   => '[data-bs-theme="light"] #secondary-menu .nav-link:hover,[data-bs-theme="light"] #secondary-menu .dropdown-item:hover',
                'property'  => 'color',
            ],
            [
                'choice'    => 'active',
                'element'   => '[data-bs-theme="light"] #secondary-menu .nav-link:active,[data-bs-theme="light"] #secondary-menu .dropdown-item:active',
                'property'  => 'color',
            ],
        ],
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_secondarymenu_header_aligment',
        'label'       => esc_html__('Aligment', 'wpzaro'),
        'section'     => 'section_secondarymenu_navbar',
        'default'     => 'ms-auto',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose Aligment for secondary menu header.', 'wpzaro'),
        'choices'     => [
            'ms-auto'   => esc_html__('Right', 'wpzaro'),
            'me-auto'   => esc_html__('Left', 'wpzaro'),
            'mx-auto'   => esc_html__('Center', 'wpzaro'),
        ],
    ]
);

//Footer Panel
new \Kirki\Panel(
    'footer_id',
    [
        'priority'    => 10,
        'title'       => esc_html__('Footer', 'wpzaro'),
        'description' => esc_html__('Theme footer layout setting.', 'wpzaro'),
    ]
);
//Footer full
new \Kirki\Section(
    'section_footerfull',
    [
        'title'       => esc_html__('Footer full', 'wpzaro'),
        'description' => esc_html__('Footer full settings.', 'wpzaro'),
        'panel'       => 'footer_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_footerfull_container_type',
        'label'       => esc_html__('Container Type', 'wpzaro'),
        'section'     => 'section_footerfull',
        'default'     => 'default',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose between Theme container and container-fluid, or default', 'wpzaro'),
        'choices'     => [
            'default'         => esc_html__('Default', 'wpzaro'),
            'container'       => esc_html__('Fixed width container', 'wpzaro'),
            'container-fluid' => esc_html__('Full width container', 'wpzaro'),
            'container-fixed' => esc_html__('Fixed width container & content', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Typography(
    [
        'settings'    => 'wpzaro_typography_footerfull',
        'label'       => esc_html__('Typography', 'wpzaro'),
        'description' => esc_html__('', 'wpzaro'),
        'section'     => 'section_footerfull',
        'priority'    => 10,
        'transport'   => 'auto',
        'default'     => [
            'font-size'     => '14px',
            'color'         => '#686868',
            'text-align'    => 'left',
        ],
        'output'      => [
            [
                'element' => '#wrapper-footer-full',
            ],
        ],
    ]
);
new \Kirki\Field\Background(
    [
        'settings'    => 'wpzaro_background_footerfull',
        'label'       => __('Background Color', 'wpzaro'),
        'description' => esc_html__('', 'wpzaro'),
        'section'     => 'section_footerfull',
        'default'     => [
            'background-color'  => '#e9ecef',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '[data-bs-theme="light"] #wrapper-footer-full',
            ],
        ],
    ]
);
//Footer site info
new \Kirki\Section(
    'section_footerinfo',
    [
        'title'       => esc_html__('Footer site info', 'wpzaro'),
        'description' => esc_html__('Footer site info settings.', 'wpzaro'),
        'panel'       => 'footer_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_footersiteinfo_container_type',
        'label'       => esc_html__('Container Type', 'wpzaro'),
        'section'     => 'section_footerinfo',
        'default'     => 'default',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose between Theme container and container-fluid, or default', 'wpzaro'),
        'choices'     => [
            'default'         => esc_html__('Default', 'wpzaro'),
            'container'       => esc_html__('Fixed width container', 'wpzaro'),
            'container-fluid' => esc_html__('Full width container', 'wpzaro'),
            'container-fixed' => esc_html__('Fixed width container & content', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Textarea(
    [
        'settings'    => 'wpzaro_site_info_override',
        'label'       => esc_html__('Footer Site Info', 'wpzaro'),
        'section'     => 'section_footerinfo',
        'default'     => esc_html__('Copyright © {year} {site_title}. All rights reserved.', 'wpzaro'),
        'description' => esc_html__('Override theme site info located at the footer of the page.use {year} {site_title}', 'wpzaro'),
    ]
);
new \Kirki\Field\Typography(
    [
        'settings'    => 'wpzaro_typography_site_info',
        'label'       => esc_html__('Typography', 'wpzaro'),
        'description' => esc_html__('', 'wpzaro'),
        'section'     => 'section_footerinfo',
        'priority'    => 10,
        'transport'   => 'auto',
        'default'     => [
            'font-size'     => '14px',
            'color'         => '#ffffff',
            'text-align'    => 'left',
        ],
        'output'      => [
            [
                'element' => '#wrapper-footer-site-info',
            ],
        ],
    ]
);
new \Kirki\Field\Background(
    [
        'settings'    => 'wpzaro_background_site_info',
        'label'       => __('Background Color', 'wpzaro'),
        'description' => esc_html__('', 'wpzaro'),
        'section'     => 'section_footerinfo',
        'default'     => [
            'background-color'  => '#212529',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '[data-bs-theme="light"] #wrapper-footer-site-info',
            ],
        ],
    ]
);

//Footer scroll to top
new \Kirki\Section(
    'section_scrolltotop',
    [
        'title'       => esc_html__('Scroll to Top', 'wpzaro'),
        'description' => esc_html__('Enable button scroll to top', 'wpzaro'),
        'panel'       => 'footer_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Checkbox_Switch(
    [
        'settings'    => 'wpzaro_scrolltotop_enable',
        'label'       => esc_html__('Enable', 'wpzaro'),
        'section'     => 'section_scrolltotop',
        'default'     => 'on',
        'choices'     => [
            'on'        => esc_html__('Enable', 'wpzaro'),
            'off'       => esc_html__('Disable', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Color(
    [
        'settings'    => 'wpzaro_scrolltotop_color',
        'label'       => esc_html__('Color Button', 'wpzaro'),
        'section'     => 'section_scrolltotop',
        'default'     => '#333333',
        'choices'     => [
            'alpha' => true,
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'choice'    => 'color',
                'element'   => '.footer-scrolltotop .btn',
                'property'  => 'background-color',
            ],
        ],
    ]
);

//Floating Whatsapp
new \Kirki\Section(
    'section_floatwhatsapp',
    [
        'title'       => esc_html__('Whatsapp', 'wpzaro'),
        'description' => esc_html__('Enable button whatsapp', 'wpzaro'),
        'panel'       => 'footer_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Checkbox_Switch(
    [
        'settings'    => 'wpzaro_floatwhatsapp_enable',
        'label'       => esc_html__('Disable', 'wpzaro'),
        'section'     => 'section_floatwhatsapp',
        'default'     => 'off',
        'choices'     => [
            'on'        => esc_html__('Enable', 'wpzaro'),
            'off'       => esc_html__('Disable', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Text(
    [
        'settings'    => 'wpzaro_floatwhatsapp_number',
        'label'       => esc_html__('No Whatsapp', 'wpzaro'),
        'section'     => 'section_floatwhatsapp',
        'default'     => '',
        'choices'     => [
            'min'  => 0,
            'step' => 1,
        ],
    ]
);
new \Kirki\Field\Text(
    [
        'settings'    => 'wpzaro_floatwhatsapp_text',
        'label'       => esc_html__('Text Whatsapp', 'wpzaro'),
        'section'     => 'section_floatwhatsapp',
        'default'     => 'Whatsapp Us',
    ]
);
new \Kirki\Field\Textarea(
    [
        'settings'    => 'wpzaro_floatwhatsapp_message',
        'label'       => esc_html__('Message', 'wpzaro'),
        'section'     => 'section_floatwhatsapp',
        'default'     => 'Hello..',
    ]
);

//Archive Panel
new \Kirki\Panel(
    'archive_id',
    [
        'priority'    => 10,
        'title'       => esc_html__('Archive', 'wpzaro'),
        'description' => esc_html__('Theme Archive layout setting.', 'wpzaro'),
    ]
);
//archive layout column
new \Kirki\Section(
    'section_archivecolumn',
    [
        'title'       => esc_html__('Column', 'wpzaro'),
        'description' => esc_html__('Archive Column settings.', 'wpzaro'),
        'panel'       => 'archive_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Slider(
    [
        'settings'    => 'wpzaro_archive_column',
        'label'       => esc_html__('Number of columns', 'wpzaro'),
        'section'     => 'section_archivecolumn',
        'default'     => 1,
        'transport'   => 'refresh',
        'choices'     => [
            'min'  => 1,
            'max'  => 6,
            'step' => 1,
        ],
    ]
);
new \Kirki\Field\Slider(
    [
        'settings'    => 'wpzaro_archive_column_mobile',
        'label'       => esc_html__('Number of columns in Mobile', 'wpzaro'),
        'section'     => 'section_archivecolumn',
        'default'     => 1,
        'transport'   => 'refresh',
        'choices'     => [
            'min'  => 1,
            'max'  => 6,
            'step' => 1,
        ],
    ]
);
new \Kirki\Field\Checkbox_Switch(
    [
        'settings'    => 'wpzaro_archive_column_equalheight',
        'label'       => esc_html__('Equal Height', 'wpzaro'),
        'description' => esc_html__('Same Height column', 'wpzaro'),
        'section'     => 'section_archivecolumn',
        'default'     => '0',
        'choices'     => [
            '0'     => esc_html__('Enable', 'wpzaro'),
            '1'     => esc_html__('Disable', 'wpzaro'),
        ],
    ]
);
//archive content
new \Kirki\Section(
    'section_archivecontent',
    [
        'title'       => esc_html__('Content', 'wpzaro'),
        'description' => esc_html__('Archive Content settings.', 'wpzaro'),
        'panel'       => 'archive_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Sortable(
    [
        'settings' => 'wpzaro_archive_content_sortable',
        'label'    => __('Sortable', 'wpzaro'),
        'section'  => 'section_archivecontent',
        'default'  => ['title', 'thumbnail', 'meta', 'excerpt', 'tag'],
        'priority' => 10,
        'choices'  => [
            'thumbnail' => esc_html__('Thumbnail', 'wpzaro'),
            'title'     => esc_html__('Title', 'wpzaro'),
            'meta'      => esc_html__('Meta', 'wpzaro'),
            'excerpt'   => esc_html__('Excerpt', 'wpzaro'),
            'morelink'  => esc_html__('More link', 'wpzaro'),
            'tag'       => esc_html__('Tag', 'wpzaro'),
        ],
    ]
);
