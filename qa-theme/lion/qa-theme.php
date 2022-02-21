<?php
/**
 * Created by Q2A Market.
 * http://www.q2amarket.com
 *
 * Project: lion
 * File: qa-theme.php
 * Description:
 */

// restrict the direct access
if ( ! defined('QA_VERSION')) {
    header('Location: /');
    exit;
}
// base constants
define('LION_DIR', dirname(__FILE__));
define('LION_URL', qa_opt('site_url') . 'qa-theme/' . qa_get_site_theme());

include_once LION_DIR . '/core/functions.php';
include_once LION_DIR . '/core/Theme.php';

// register language phrases
qa_register_phrases(LION_DIR . '/language/lion-lang-*.php', 'lion');


// debug function
function do_print($data)
{
    echo '<pre > ', print_r($data, TRUE), '</pre > ';
}