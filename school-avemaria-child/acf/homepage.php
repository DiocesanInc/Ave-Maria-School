<?php

//Load the hero tab
load_acf_file("tabs/hero");

//get acf fields for the hero
$fields = acf_hero();

//if a custom section order for the homepage is set in template settings
if (have_rows("section_order", "options")) :

    //iterate through the sections set in the template settings
    while (have_rows("section_order", "options")) : the_row();

        //get section name
        $section = get_sub_field("section");
        //load according acf tab file
        load_acf_file("tabs/$section");
        //store section name as a variable function name
        $func = "acf_$section";
        //execute variable function to get the acf fields for the corresponding section
        $new_tab = $func();
        //merge array. append new acf fields to the ones that already exist
        $fields = array_merge($fields, $new_tab);

    endwhile;

else :
    //load default order of sections if no custom order is set
    load_acf_file("tabs/banner");
    load_acf_file("tabs/stats");
    load_acf_file("tabs/social_banner");
    load_acf_file("tabs/lower_banner");
    load_acf_file("tabs/calendar");

    $fields = array_merge($fields, acf_banner(), acf_stats(), acf_social_banner(), acf_lower_banner(), acf_calendar());

endif;


if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(
        array(
            'key' => 'group_5e7cae3363c01',
            'title' => 'Homepage',
            "fields" => $fields, //set the custom order here
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'templates/page-homepage.php',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        )
    );

endif;