<?php
/**
 * The theme's dynamic strings for WPML translation
 */
 
global $unisphere_options;

wpml_register_string('unisphere', 'Contact Form Error Message', $unisphere_options['email_error']);
wpml_register_string('unisphere', 'Contact Form Success Message', $unisphere_options['email_success']);

wpml_register_string('unisphere', 'Home Page Blog Section Title', $unisphere_options['home_blog_title'] );

wpml_register_string('unisphere', 'Home Page Portfolio Section Title', $unisphere_options['home_portfolio_title'] );

wpml_register_string('unisphere', 'Home Section 4', unisphere_run_shortcode( $unisphere_options['home_section_4'] ) );
wpml_register_string('unisphere', 'Home Section 3', unisphere_run_shortcode( $unisphere_options['home_section_3'] ) );
wpml_register_string('unisphere', 'Home Section 2', unisphere_run_shortcode( $unisphere_options['home_section_2'] ) );
wpml_register_string('unisphere', 'Home Section 1', unisphere_run_shortcode( $unisphere_options['home_section_1'] ) );

?>