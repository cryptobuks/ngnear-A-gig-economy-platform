<?php
/**
 * Created by Q2A Market.
 * http://q2amarket.com
 *
 * Project: lion
 * File: Lion.php
 * Description: The main theme class file
 */

namespace Q2AMarket\Lion;

/**
 * Class Lion. It contains all required theme registration memebers and methods.
 *
 * @package   Q2AMarket\Lion
 * @version   1.1
 * @since     1.0.0-beta
 * @author    Jatin Soni<contact@jatinsoni.me>
 * @copyright Copyright (c) 2017 Q2A Market
 *
 * @TODO      : add doc blocks
 */

use function qa_is_mobile_probably;
use function qa_request;
use function qa_request_part;

/**
 * Class Lion
 *
 * @package Q2AMarket\Lion
 */
class Lion
{

    /**
     * The lion theme version
     *
     * @var string
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */
    private $_version;

    /**
     * The lion theme name
     *
     * @var string
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.3-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */
    private $_db_version;
    /**
     * The lion theme name
     *
     * @var string
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */
    private $_name;
    /**
     * The lion theme slug
     *
     * @var string
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */
    private $_slug;
    /**
     * The developer link
     * Usually for the credits
     *
     * @var string
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */
    private $_developer_link;
    /**
     * The developer name
     * Usually for the credits
     *
     * @var string
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */
    private $_developer;
    /**
     * Theme mode
     * Development mode or Production mode. This will use to switch some source and content
     *
     * @var string
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */
    private $_mode;
    /**
     * Set the css root directory
     *
     * @var string
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */
    private $_css;
    /**
     * Set the script root directory
     *
     * @var string
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */
    private $_js;

    /**
     * Set the css root directory
     *
     * @var string
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */

    /**
     * Check if is mobile or desktop
     *
     * @var       bool|false
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.1-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */
    private $_is_mobile;

    /**
     * Ignore all other device and consider only mobile. This is basically for the development purpose where you can
     * switch the mobile and desktop theme quickly in browser.
     *
     * @var bool
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.2-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2018 Q2A Market
     */
    private $_ignore_device;

    /**
     * Lion constructor.
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */
    private function __construct()
    {

        $this->_mode           = 'production';
        $this->_ignore_device  = FALSE;
        $this->_name           = 'Lion';
        $this->_slug           = 'lion';
        $this->_version        = '1.0.5-beta';
        $this->_db_version     = '1.0';
        $this->_developer_link = 'http://q2amarket.com';
        $this->_developer      = 'Q2A Market';

    }

    /**
     * This is the singleton method made to reduce the memory allocation for the theme.
     *
     * @param
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     * @return null|\Q2AMarket\Lion\Lion
     */
    public static function instance()
    {
        // Store the instance locally to avoid private static replication
        static $instance = NULL;
        // Only run these methods if they haven't been run previously
        if (NULL === $instance) {
            $instance = new Lion;
            $instance->version();
            $instance->includes();
        }

        // Always return the instance
        return $instance;
        // The last metroid is in captivity. The galaxy is at peace.
    }

    /**
     * Get the theme version
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     * @return string
     */
    public function version()
    {
        return $this->_version;
    }

    /**
     * Includes all require files
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     */
    public function includes()
    {
        include 'Components.php';
    }

    /**
     * Get the theme database version
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.3-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     * @return string
     */
    public function db_version()
    {
        return $this->_db_version;
    }

    /**
     * Get the theme lifecycle mode
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     * @return string
     */
    public function get_mode()
    {
        return $this->_mode;
    }

    /**
     * Get the theme name
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     * @return string
     */
    public function name()
    {
        return $this->_name;
    }

    /**
     * Get the developer link
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     * @return string
     */
    public function developer_link()
    {
        return $this->_developer_link;
    }

    /**
     * Get the developer name
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     * @return string
     */
    public function developer()
    {
        return $this->_developer;
    }

    /**
     * Get the theme slug
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     * @return string
     */
    public function slug()
    {
        return $this->_slug;
    }

    /**
     * Check if the current page is theme option page
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.3-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     * @return bool return true if is option page else false
     */
    public function is_options()
    {
        if (qa_request_part(1) == 'lion-options') {
            return TRUE;
        }

        return FALSE;
    }


    /**
     * Get the require css resources
     *
     * @param bool|false $is_rlt Check the site language direction RTL or LTR
     *
     * @package   Q2AMarket\Lion
     * @version   1.1
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     *
     * @return bool|string
     */
    public function get_css($is_rlt = FALSE)
    {
        // @since 1.0.2-beta
        $rtl_css = ($is_rlt) ? '-rtl' : NULL;

        if ($this->_mode == 'dev' && $this->_ignore_device) {
            $this->_css = $this->_slug . $rtl_css;

            return $this->_css . '.css?' . $this->_version . '-dev';
        } else {

            if ($this->is_mobile()) {
                $this->_css = $this->_slug . $rtl_css;
            } else {
                $this->_css = $this->_slug . '-large' . $rtl_css;
            }

            if ($this->_mode == 'dev') {
                return $this->_css . '.css?' . $this->_version . '-dev';
            } elseif ($this->_mode == 'production') {
                return $this->_css . '.min.css?' . $this->_version;
            }

        }

        return FALSE;
    }

    /**
     * @return bool
     */
    public function is_mobile()
    {
        if (qa_is_mobile_probably()) {
            return $this->_is_mobile = TRUE;
        }

        return FALSE;
    }

    public function get_colors_css()
    {
        $file_type  = '.php';
        $this->_css = $this->_slug;

        return $this->_css . '-colors' . $file_type . '?' . $this->_version;
    }

    public function get_admin_css($is_rlt = FALSE)
    {
        if (qa_request_part(1) == 'lion-options') {

            $rtl_css    = ($is_rlt) ? '-rtl' : NULL;
            $this->_css = $this->_slug . '-admin' . $rtl_css;

            if ($this->_mode == 'dev') {
                return $this->_css . '.css?' . $this->_version . '-dev';
            } elseif ($this->_mode == 'production') {
                return $this->_css . '.min.css?' . $this->_version;
            }
        }

        return FALSE;
    }

    /**
     * Get the require script resources
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     * @return bool|string
     */
    public function get_js()
    {

        if ($this->is_mobile()) {
            $this->_js = $this->_slug . '-script';
        } else {
            $this->_js = $this->_slug . '-script-desktop';
        }

        if ($this->_mode == 'dev') {
            return $this->_js . '.js?' . $this->_version . '-dev';
        } elseif ($this->_mode == 'production') {
            return $this->_js . '.min.js?' . $this->_version;
        }

        return FALSE;
    }

    /**
     * @return bool
     */
    public function is_desktop()
    {
        if ( ! $this->is_mobile()) {
            return TRUE;
        }

        return FALSE;
    }

    /**
     * Display the credit
     *
     * @package   Q2AMarket\Lion
     * @version   1.0
     * @since     1.0.0-beta
     * @author    Jatin Soni<contact@jatinsoni.me>
     * @copyright Copyright (c) 2017 Q2A Market
     * @return string
     */
    public function credits()
    {

        $credits = '<div class="qa-attribution">';
        //Mel:02/02/19: To remove Q2AMarket credit
		//$credits .= $this->_name . ' by <a href="' . $this->_developer_link . '">' . $this->_developer . '</a>';
        $credits .= '</div>';

        return $credits;
    }

}

/**
 * Instance of the lion theme
 *
 * @package   Q2AMarket\Lion
 * @version   1.0
 * @since     1.0.0-beta
 * @author    Jatin Soni<contact@jatinsoni.me>
 * @copyright Copyright (c) 2017 Q2A Market
 * @return null|\Q2AMarket\Lion\Lion
 */
function lion()
{
    return Lion::instance();
}

$GLOBALS[ 'Lion' ] = lion();