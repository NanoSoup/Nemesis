<?php

namespace NanoSoup\Nemesis\PostTypes;

/**
 * Class PostTypes
 * @package NanoSoup\Nemesis\PostTypes
 */
class PostTypes
{
    /**
     * @param $name - Post type key
     * @param $singular
     * @param $multiple
     * @param $slug
     * @param $args - Sorry Jez
     */
    public function registerPostType($name, $singular, $multiple, $slug, $args = [])
    {
        $defaults = [
            'public' => true,
            'hierarchical' => false,
            'has_archive' => true,
            'show_in_nav_menus' => true,
        ];

        // Make nice variable names
        extract(array_merge($defaults, $args));

        /**
         * Careers post type
         */
        $args = [
            'labels' => [
                'name' => $multiple,
                'singular_name' => $singular,
                'add_new' => 'Add New',
                'add_new_item' => 'Add New ' . $singular,
                'edit_item' => 'Edit ' . $singular,
                'new_item' => 'New ' . $singular,
                'view_item' => 'View ' . $singular,
                'search_items' => 'Search ' . $multiple,
                'not_found' => 'No ' . $multiple . ' found',
                'not_found_in_trash' => 'No ' . $multiple . ' found in Trash',
                'parent_item_colon' => 'Parent text',
                'all_items' => $multiple,
                'enter_title_here' => 'Enter title here',
            ],
            'public' => $public,
            'hierarchical' => $hierarchical,
            'has_archive' => $has_archive,
            'rewrite' => ['slug' => $slug],
            'show_in_nav_menus' => $show_in_nav_menus,
            'supports' => [
                'title', 'editor', 'thumbnail', 'author',
            ],
        ];

        register_post_type($name, $args);
    }

    /**
     * @param $name
     * @param $singular
     * @param $slug
     * @param array $args
     */
    public function registerCustomTaxonomy($name, $singular, $slug, $args = [])
    {
        $object_types = [$name];

        $defaults = [
            'public' => true,
            'hierarchical' => false,
            'show_ui' => true
        ];

        // Make nice variable names
        extract(array_merge($defaults, $args));

        $args = [
            'icon' => 'admin-post',
            'labels' => [
                'name' => $singular . ' Categories',
                'singular_name' => $singular . ' Category',
                'search_items' => 'Search ' . $singular . ' Categories',
                'popular_items' => 'Popular ' . $singular . ' Categories',
                'all_items' => 'All ' . $singular . ' Categories',
                'parent_item' => 'Parent ' . $singular . ' Category',
                'parent_item_colon' => 'Parent ' . $singular . ' Category:',
                'edit_item' => 'Edit ' . $singular . ' Category',
                'update_item' => 'Update ' . $singular . ' Category',
                'add_new_item' => 'Add New ' . $singular . ' Category',
                'new_item_name' => 'New ' . $singular . ' Category',
                'separate_items_with_commas' => 'Separate ' . $singular . ' Categories with commas',
                'add_or_remove_items' => 'Add or remove ' . $singular . ' Categories',
                'choose_from_most_used' => 'Choose from the most used ' . $singular . ' Categories',
                'menu_name' => $singular . ' Categories'
            ],
            'public' => $public,
            'hierarchical' => $hierarchical,
            'rewrite' => ['slug' => $slug . '/category'],
            'show_ui' => $show_ui
        ];

        register_taxonomy('event-category', $object_types, $args);
        register_taxonomy_for_object_type('event-category', $name);
    }
}