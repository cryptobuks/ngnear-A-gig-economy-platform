<?php
/**
 * Created by Q2A Market
 * http://q2amarket.com
 *
 * Project: lion
 * File: css-init.php
 * Description: Required file for dynamic CSS
 */

header('Content-type: text/css');
require_once '../../../qa-include/qa-base.php';
require_once QA_INCLUDE_DIR . 'qa-db.php';
require_once QA_INCLUDE_DIR . 'qa-app-users.php';

$prefix = 'lion_';

$primary_color          = '#7A532E';
$secondary_color        = '#CB8D4F';
$light_color            = '#fff';
$action_color           = '#9D4405';
$success_color          = '#009688';
$danger_color           = '#FF4646';
$body_text              = '#2A2A2A';
$body_bg                = '#e8e8e8';
$body_bg_mobile         = '#FFFFFF';
$subnav_bg_mobile       = $primary_color;
$subnav_text_mobile     = $light_color;
$cat_q_green            = $success_color;
$button_success         = $success_color;
$fb_color               = '#3B5998';
$notice_bar_color       = '#ECEC5B';
$footer_bg              = '#333134';
$gray_darker            = '#000';
$gray_dark              = '#747474';
$gray                   = '#999999';
$gray_light             = '#e6e6e6';
$gray_lighter           = '#e7e7e7';
$gray_lightest          = '#f4f4f4';
$text_light             = $light_color;
$text_dark              = $body_text;
$link_color             = $action_color;
$button_primary         = $primary_color;
$button_secondary       = $secondary_color;
$button_text_color      = $text_light;
$header_bg              = $primary_color;
$comment_odd_bg         = $gray_lighter;
$comment_even_bg        = '#f3f3f3';
$menu_bg                = $light_color;
$menu_item_color        = $text_dark;
$menu_item_hover_color  = '#000000';
$menu_selected_bg       = '#E7E7E7';
$menu_selected_text     = $primary_color;
$q_list_title_color     = $gray_darker;
$q_list_a_counter_color = $action_color;
$q_list_icon_color      = $gray_dark;
$selected_color         = '#009688';

/**
 * @param      $key      string option key
 * @param      $default  string default color hex value
 *
 * @param bool $set_mobile
 *
 * @return mixed
 */
function get_lion_option($key, $default)
{
    global $prefix;

    return qa_opt($prefix . $key) ? qa_opt($prefix . $key) : $default;
}

/**
 * @param $key
 * @param $default
 *
 * @return void
 */
function lion_option($key, $default)
{
    echo get_lion_option($key, $default);
}

/**
 * @param $color
 *
 * @return mixed
 */
function get_lion_color($color)
{
    return $color;
}

/**
 * @param $color
 *
 * @return void
 */
function lion_color($color)
{
    echo get_lion_color($color);
}

/**
 * @return bool
 */
function is_mobile()
{
    return (qa_is_mobile_probably()) ? TRUE : FALSE;
}

// setting up variables to use in css
$primary_color_option   = get_lion_option('primary_color', $primary_color);
$secondary_color_option = get_lion_option('secondary_color', $secondary_color);
$success_color_option   = get_lion_option('success_color', $success_color);
$danger_color_option    = get_lion_option('danger_color', $danger_color);
$body_bg_option         = get_lion_option('body_bg', $body_bg);
$body_text_option       = get_lion_option('body_text', $body_text);
$tag_bg_option          = get_lion_option('tag_bg', $gray_lightest);
$tag_text_option        = get_lion_option('tag_text', $body_text);
//mobile device
$body_bg_mobile_option     = get_lion_option('body_bg_mobile', $body_bg_mobile);
$subnav_bg_mobile_option   = get_lion_option('sub_nav_bg_mobile', $subnav_bg_mobile);
$subnav_text_mobile_option = get_lion_option('sub_nav_text_mobile', $subnav_text_mobile);