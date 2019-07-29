<?php
class CustomPostType
{
    private $post_type, $post_options, $taxonomy_name, $taxonomy_options;
    function __construct($post_type = "", $post_options = array(), $taxonomy = "", $taxonomy_options = array(), $tag = "", $tag_options = array())
    {
        $this->post_type = $post_type;
        $this->post_options = $post_options;
        $this->taxonomy = $taxonomy;
        $this->taxonomy_options = $taxonomy_options;
        $this->tag = $tag;
        $this->tag_options = $tag_options;
        $this->init();
    }
    private function init()
    {
        /**
         * Register Custom Post Type
         */
        if ($this->post_type != '') {
            add_action('init', array($this, 'register_custom_post'));
        }

        /**
         * Register Custom Taxonomy
         */
        if ($this->taxonomy != '') {
            add_action('init', array($this, 'register_custom_taxonomy'), 0);
        }

        /** 
         * Register Custom Tags
         */
        if ($this->tag != '') {
            add_action('init', array($this, 'register_custom_tag'), 0);
        }

        /**
         * Add filter in admin for custom post type
         */
        add_action('restrict_manage_posts', array($this, 'add_taxonomy_filter'));
    }
    public function register_custom_post()
    {
        register_post_type($this->post_type, $this->post_options);
    }

    public function register_custom_taxonomy()
    {
        register_taxonomy($this->taxonomy, $this->post_type, $this->taxonomy_options);
    }

    public function register_custom_tag()
    {
        register_taxonomy($this->taxonomy, $this->post_type, $this->taxonomy_options);
    }
    public function add_taxonomy_filter()
    {
        global $typenow;
        $taxonomy = array($this->taxonomy);
        if ($typenow == $this->post_type) {
            foreach ($taxonomy as $tax_slug) {
                $tax_obj = get_taxonomy($tax_slug);
                $tax_name = $tax_obj->labels->name;
                $terms = get_terms($tax_slug);
                if (count($terms) > 0) {
                    echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
                    echo "<option value=''>Show All $tax_name</option>";
                    foreach ($terms as $term) {
                        echo '<option value=' . $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '', '>' . $term->name . ' (' . $term->count . ')</option>';
                    }
                    echo "</select>";
                }
            }
        }
    }
}
