<?php
/**
 * Created by Q2A Market.
 * http://q2amarket.com
 *
 * Project: lion
 * File: Theme.php
 * Description: The base theme class file
 */

use Q2AMarket\Lion\Components\Components;

/**
 * Class qa_html_theme
 *
 * @TODO: add doc blocks
 */
class qa_html_theme extends qa_html_theme_base
{

    /**
     * @var \Q2AMarket\Lion\Components\Components
     */
    public $components;
    /**
     * @var bool
     */
    protected $ranking_block_layout = TRUE;
    /**
     * @var string
     */
    private $js_dir = 'js';

    // use new block layout in rankings
    /**
     * @var
     */
    private $lion;

    /**
     * qa_html_theme constructor.
     *
     * @param $template
     * @param $content
     * @param $rooturl
     * @param $request
     */
    public function __construct($template, $content, $rooturl, $request)
    {
        require 'Lion.php';

        global $Lion;
        $this->lion       = $Lion;
        $this->components = new Components();

        parent::__construct($template, $content, $rooturl, $request);
    }

    /**
     * Adding required elements for mobile theme.
     * Added dynamic color for the address bar.
     */
    public function head_metas()
    {
        $manifest = rtrim(qa_opt('site_url'), '/') . '/lion-launcher/mainfest.json';
        $favicon  = $this->rooturl . '/images/favicon.png';
        $app_icon = rtrim(qa_opt('site_url'), '/') . '/lion-launcher/launcher-icon-4x.png';

        $this->output_array($this->components->head_metas($manifest, $favicon, $app_icon));
        parent::head_metas();
    }

    /**
     *
     */
    public function head_css()
    {

        $this->content[ 'css_src' ][] = $this->rooturl . 'css/' . $this->lion->get_css($this->isRTL);
        $this->content[ 'css_src' ][] = $this->rooturl . 'css/' . $this->lion->get_colors_css();

        if (qa_request_part(1) == 'lion-options') {
            $this->content[ 'css_src' ][] = $this->rooturl . 'css/' . $this->lion->get_admin_css();
        }

        parent::head_css();

        $this->head_inline_css();

    }

    /**
     * @return mixed
     */
    public function version()
    {
        return $this->lion->version();
    }

    /**
     *
     */
    private function head_inline_css()
    {

        if ($this->template == 'question') {

            $content = @$this->content[ 'q_view' ][ 'content' ];
            preg_match_all('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', $content, $matches);

            if ( ! empty($matches[ 0 ])) {
                $image = $matches[ 1 ][ 0 ];
            } else {
                $image = $this->rooturl . '/images/q-header-default.jpg';
            }

            $css   = ['<style>'];
            $css[] = '.qa-q-feature-image {';
            $css[] = '    background-image: url("' . html_entity_decode($image) . '")';
            $css[] = '}';
            $css[] = '</style>';

            $this->output_array($css);
        }

    }

    /**
     *
     */
    public function head_script()
    {
        parent::head_script(); // TODO: Change the autogenerated stub

        //Mel: 15/01/22
        $this->output('<script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>');
        $this->output('<script src="https://unpkg.com/moralis/dist/moralis.js"></script>');
        $this->output('<script src="https://cdnjs.cloudflare.com/ajax/libs/ethers/5.5.3/ethers.umd.min.js"></script>');
        $this->output('<!-- The legacy-web3 script must run BEFORE your other scripts. -->
    <script src="https://unpkg.com/@metamask/legacy-web3@latest/dist/metamask.web3.min.js"></script>');

    }

    /**
     *
     */
    public function body_tags()
    {
        $user_subpage = qa_request_part(1);

        $class = 'qa-template-' . qa_html($this->template);
        $class .= ($this->template == 'users' && isset($user_subpage)) ? ' ' . qa_html($this->template) . '-' . qa_request_part(1) : '';
        $class .= (qa_request_part(1) == 'lion-options') ? ' lion-options' : NULL;
        $class .= empty($this->theme) ? '' : ' qa-theme-' . qa_html($this->theme);

        if (isset($this->content[ 'categoryids' ])) {
            foreach ($this->content[ 'categoryids' ] as $categoryid) {
                $class .= ' qa-category-' . qa_html($categoryid);
            }
        }

        $this->output('class="' . $class . ' qa-body-js-off"');
    }

    /**
     *
     */
    public function body_footer()
    {
        $this->output($this->components->floating_button($this->template));

        $jsUrl = $this->rooturl . $this->js_dir . '/' . $this->lion->get_js();

        //Mel: 15/01/22, Fix "//" bug
        $this->output('<script src="' . $this->rooturl . 'third-party/pushy/js/pushy.min.js?' . $this->version() . '"></script>');
        //$this->output('<script src="' . $this->rooturl . '/third-party/pushy/js/pushy.min.js?' . $this->version() . '"></script>');

        //Mel: 15/01/22
        $this->output('<script src="' . $this->rooturl . 'js/web3-eth-accounts.js"></script>');
        $this->output('<script src="' . $this->rooturl . 'js/web3-connector.js"></script>');

        if ($this->lion->is_options()) {
            $this->output('<script src="' . $this->rooturl . '/third-party/materialcolorpicker/picker.js?' . $this->version() . '"></script>');
        }

        $this->output('<script src="' . $jsUrl . '"></script>');
        parent::body_footer(); // TODO: Change the autogenerated stub
    }

    /**
     * Fixed markup / schema issue.
     */
    public function body_content()
    {
        $this->body_prefix();
        $this->nav_drawer();

        $extratags = isset($this->content[ 'wrapper_tags' ]) ? $this->content[ 'wrapper_tags' ] : '';
        $this->output('<div class="qa-body-wrapper"' . $extratags . '>', '');

        // lion element
        $this->topbar();
        //end lion element

        $this->notices();

        $this->widgets('full', 'top');
        $this->header();
        $this->widgets('full', 'high');

        if ($this->lion->is_desktop()) {
            $this->output('<div class="qa-main-desktop clearfix">');
        }
        $this->main();
        $this->sidepanel();

        if ($this->lion->is_desktop()) {
            $this->output('</div><!-- qa=main-desktop -->');
        }

        $this->widgets('full', 'low');
        $this->footer();
        $this->widgets('full', 'bottom');

        $this->output('</div> <!-- END body-wrapper -->');

        $this->body_suffix();
    }

    /**
     *
     */
    public function nav_drawer()
    {
        $push_direction = ($this->isRTL) ? 'right' : 'left';

        $this->output('<!-- Pushy Menu -->');
        $this->output('<nav class="pushy pushy-' . $push_direction . '">');
        $this->output('<div class="pushy-content">');
        $this->output($this->components->main_nav_user_box());
        $this->nav('main');
        $this->output('</div><!-- End pussy-content -->');
        $this->output('</nav><!-- End: pussy-left -->');
        $this->output('<! -- Site Overlay -->');
        $this->output('<div class="site-overlay" ></div >');
    }

    /***************************************************
     * Additional theme elements
     **************************************************/

    /**
     *
     */
    public function topbar()
    {

        $this->output('<div class="topbar">');

        $this->search();

        $this->output('<div class="menu menu-btn">');
        $this->output('<i class="material-icons">menu</i>');
        $this->output('</div>');

        $this->output('<div class="qa-logo">');

        if ($this->template != 'question') {
            $this->output('<div class="topbar-favorite">');
            $this->qa_q_view_favorite();
            $this->output('</div><!-- End topbar-favorite -->');
        }

        if ($this->template == 'qa' && (empty(qa_request_part(0)))) {
            $this->output($this->content[ 'logo' ]);
        } elseif ($this->template == 'question') {
            $this->output(qa_lang_html('lion/page_question'));
        } elseif (($this->template == 'qa') && ( ! empty(qa_request_part(0)))) {
            $this->title();
        } else {
            $this->title();
        }
        $this->output('</div><!-- End qa-logo -->');

        $this->login_component();

        $this->output('<div class="search">');
        $this->output('<i class="material-icons">search</i>');
        $this->output('</div>');
        $this->output('</div><!-- topbar -->');

        $this->output('<div class="qa-sub-nav-wrapper">');
        $this->sub_nav();
        $this->output('</div><!--qa-sub-nav-wrapper-->');
    }

    /**
     *
     */
    public function login_component(){
        if ( ! qa_is_logged_in()) {
            $this->output('<ul class="auth">');
            $this->output('<li class="auth-power">');
            $this->output('<i class="material-icons">power_settings_new</i>');
            $this->output('<ul class="qa-auth-box">');
            $this->output('<li class="qa-auth-box-items">');
            $this->qa_auth_form();
            $this->output('<li><!-- qa-auth-box-items -->');
            $this->output('</ul><!-- qa-auth-box -->');
            $this->output('</li><!-- qa-auth-box-items -->');
            $this->output('</ul><!-- auth-power -->');
        }
    }

    /**
     *
     */
    public function qa_auth_form()
    {
        if ( ! qa_is_logged_in()) {
            if (isset($this->content[ 'navigation' ][ 'user' ][ 'login' ]) && ! QA_FINAL_EXTERNAL_USERS) {
                $login = $this->content[ 'navigation' ][ 'user' ][ 'login' ];
                $this->output(
                    '<form action="' . $login[ 'url' ] . '" method="post">',
                    '<input type="text" name="emailhandle" dir="auto" placeholder="' . trim(qa_lang_html(qa_opt('allow_login_email_only') ? 'users/email_label' : 'users/email_handle_label'),
                                                                                            ':') . '"/>',
                    '<input type="password" name="password" dir="auto" placeholder="' . trim(qa_lang_html('users/password_label'),
                                                                                             ':') . '"/>',
                    '<div class="checkbox"><input type="checkbox" name="remember" id="qa-rememberme" value="1"/>',
                    '<label for="qa-rememberme">' . qa_lang_html('users/remember') . '</label></div>',
                    '<input type="hidden" name="code" value="' . qa_html(qa_get_form_security_code('login')) . '"/>',
                    '<input type="submit" value="' . $login[ 'label' ] . '" class="qa-form-tall-button qa-form-tall-button-login" name="dologin"/>',
                    '</form>'
                );

                // remove regular navigation link to log in page
                unset($this->content[ 'navigation' ][ 'user' ][ 'login' ]);
            }
        }
        $this->nav('user');
    }

    /**
     *
     */
    public function search()
    {
        $search = $this->content[ 'search' ];

        $this->output(
            '<div class="qa-search">',
            '<form ' . $search[ 'form_tags' ] . '>',
            @$search[ 'form_extra' ]
        );

        $this->output('<span class="close-search"><i class="material-icons">close</i></span>');
        $this->search_field($search);
        $this->search_button($search);

        $this->output(
            '</form>',
            '</div>'
        );
    }

    /**
     *
     */
    public function qa_q_view_favorite()
    {

        $favorite = isset($this->content[ 'favorite' ]) ? $this->content[ 'favorite' ] : NULL;

        if (isset($favorite)) {
            $this->output('<form ' . $favorite[ 'form_tags' ] . '>');
        }

        $this->output('<div class="qa-main-heading">');
        $this->favorite();
        $this->output('</div>');

        if (isset($favorite)) {
            $formhidden = isset($favorite[ 'form_hidden' ]) ? $favorite[ 'form_hidden' ] : NULL;
            $this->form_hidden_elements($formhidden);
            $this->output('</form>');
        }

    }

    /**
     *
     */
    public function sub_nav()
    {
        $this->nav('sub');
    }

    /**
     *
     */
    public function header()
    {
        qa_is_logged_in();

        $this->output('<div class="qa-header">');

        $this->header_clear();

        $this->output('</div> <!-- END qa-header -->', '');
    }

    /**
     *
     */
    public function main()
    {
        $content   = $this->content;
        $hidden    = ! empty($content[ 'hidden' ]) ? ' qa-main-hidden' : '';
        $extratags = isset($this->content[ 'main_tags' ]) ? $this->content[ 'main_tags' ] : '';

        $this->output('<div class="qa-main' . $hidden . '"' . $extratags . '>');
        $this->widgets('main', 'top');

        if (isset($this->content[ 'success' ])) {
            $this->success($this->content[ 'success' ]);
        }
        if (isset($this->content[ 'error' ])) {
            $this->error($this->content[ 'error' ]);
        }

        $this->widgets('main', 'high');

        $this->main_parts($content);

        $this->widgets('main', 'low');

        $this->page_links();
        $this->suggest_next();

        $this->widgets('main', 'bottom');

        $this->output('</div> <!-- END qa-main -->', '');
    }

    /**
     * Added $suffix to the nav_link() to add icon dynamically to the main nav
     *
     * @param      $key
     * @param      $navlink
     * @param      $class
     * @param null $level
     */
    public function nav_item($key, $navlink, $class, $level = NULL)
    {
        $suffix = strtr($key, [ // map special character in navigation key
                                '$' => '',
                                '/' => '-',
        ]);

        // remove "-" from categories on the category page
        if ($class == 'browse-cat') {
            if (isset($navlink[ 'note' ]) && ! empty($navlink[ 'note' ])) {
                $search            = [' - <', '> - '];
                $replace           = [' <', '> '];
                $navlink[ 'note' ] = str_replace($search, $replace, $navlink[ 'note' ]);
            }
        }

        $this->output('<li class="' . ($class == 'nav-main' ? 'pushy-link' : '') . ' qa-' . $class . '-item' . (@$navlink[ 'opposite' ] ? '-opp' : '') .
                      (@$navlink[ 'state' ] ? (' qa-' . $class . '-' . $navlink[ 'state' ]) : '') . ' qa-' . $class . '-' . $suffix . '">');
        $this->nav_link($navlink, $class, $suffix);

        if (count(@$navlink[ 'subnav' ])) {
            $this->nav_list($navlink[ 'subnav' ], $class, 1 + $level);
        }

        $this->output('</li>');
    }

    /**
     * Added custom icon tag and some logic to add icons dynamically based on the nav item
     *
     * @param      $navlink
     * @param      $class
     * @param bool $suffix
     */
    public function nav_link($navlink, $class, $suffix = FALSE)
    {

        if ($class == 'nav-main') {

            if (isset($navlink[ 'url' ])) {

                if ($suffix == '') {
                    $suffix = 'home';
                } elseif (strpos($suffix, 'custom-') !== FALSE) {
                    $suffix = strstr($suffix, '-', TRUE);
                }

                $this->output(
                    '<a href="' . $navlink[ 'url' ] . '" class="qa-' . $class . '-link' .
                    (@$navlink[ 'selected' ] ? (' qa-' . $class . '-selected') : '') .
                    (@$navlink[ 'favorited' ] ? (' qa-' . $class . '-favorited') : '') .
                    '"' . (strlen(@$navlink[ 'popup' ]) ? (' title="' . $navlink[ 'popup' ] . '"') : '') .
                    (isset($navlink[ 'target' ]) ? (' target="' . $navlink[ 'target' ] . '"') : '') . '>' .
                    '<i class="material-icons">' . $this->components->nav_main($suffix) . '</i>' . $navlink[ 'label' ] .
                    '</a>'
                );
            } else {
                $this->output(
                    '<span class="qa-' . $class . '-nolink' . (@$navlink[ 'selected' ] ? (' qa-' . $class . '-selected') : '') .
                    (@$navlink[ 'favorited' ] ? (' qa-' . $class . '-favorited') : '') . '"' .
                    (strlen(@$navlink[ 'popup' ]) ? (' title="' . $navlink[ 'popup' ] . '"') : '') .
                    '>' . $navlink[ 'label' ] . '</span>'
                );
            }

            if (strlen(@$navlink[ 'note' ])) {
                $this->output('<span class="qa-' . $class . '-note">' . $navlink[ 'note' ] . '</span>');
            }


        } else {
            parent:: nav_link($navlink, $class);
        }
    }

    /**
     * @param $q_item
     */
    public function q_list_item($q_item)
    {
        $this->output('<div class="qa-q-list-item' . rtrim(' ' . @$q_item[ 'classes' ]) . '" ' . @$q_item[ 'tags' ] . '>');
        $this->q_item_main($q_item);
        $this->q_item_clear();

        $this->output('</div> <!-- END qa-q-list-item -->', '');
    }

    /**
     * @param $q_item
     */
    public function q_item_main($q_item)
    {
        $this->output('<div class="qa-q-item-main">');

        $this->q_item_updates($q_item); // custom element
        $this->q_item_title($q_item);
        $this->q_item_answer($q_item);
        $this->output('</div><!-- END qa-q-item-main -->');

        $this->output('<div class="q-item-moderate-content">');
        $this->q_item_content($q_item);
        $this->q_item_buttons($q_item);
        $this->output('</div>');

        $this->qa_item_metabox($q_item);
    }

    /**
     * @param $q_item
     */
    public function q_item_updates($q_item)
    {

        $updates_data = $this->components->q_item_what_icon($q_item);

        $this->output('<div class="list-updates">');
        $this->avatar($q_item, 'qa-q-item');
        $this->output(
            '<a href="#" title="' . $updates_data[ 'event' ] . '">
				<i class="material-icons">' . $updates_data[ 'icon' ] . '</i>
			</a></div><!-- END list-updates -->'
        );
    }

    /**
     * @param bool $q_item
     */
    public function q_item_answer($q_item = FALSE)
    {
        $this->output(
            '<div class="ans-box">
            	<div class="ans-count">' . $q_item[ 'raw' ][ 'acount' ] . '</div>
				<span class="q-more-btn"><i class="material-icons meta-info-btn">keyboard_arrow_down</i></span>
            </div><!-- END ans-box -->'
        );
    }

    /**
     * @param $q_item
     */
    public function qa_item_metabox($q_item)
    {

        $this->output('<div class="q-item-meta-data">');

        $this->output('<div class="metas">');
        $this->voting($q_item);
        $this->output('<div class="update-info">');
        $this->post_meta($q_item, 'qa-q-item');
        $this->output('</div><!-- End update-info -->');
        $this->view_count($q_item);
        $this->output('</div><!-- End metas -->');
        $this->post_tags($q_item, 'qa-q-item');
        $this->output('</div><!-- End q-item-meta-data -->');

    }

    /**
     * @param $q_view
     */
    public function q_view($q_view)
    {
        if ( ! empty($q_view)) {
            $this->output('<div class="qa-q-view' . (@$q_view[ 'hidden' ] ? ' qa-q-view-hidden' : '') . rtrim(' ' . @$q_view[ 'classes' ]) . '"' . rtrim(' ' . @$q_view[ 'tags' ]) . '>');

            $this->q_view_header($q_view);

            $this->output('<div class="qa-q-view-main-wrapper">');
            $this->q_view_main($q_view);
            $this->q_view_clear();

            $this->output('</div> <!-- END qa-q-view-main-wrapper --></div> <!-- END qa-q-view -->');
        }
    }

    /**
     * @param $q_view
     */
    public function q_view_header($q_view)
    {

        $this->output('<div class="qa-q-view-header">');
        $this->output('<div class="qa-q-feature-image"></div>');
        $this->output('<div class="qa-q-view-q-details">');

        //title
        $this->output('<h1 class="qa-q-view-title">');
        $this->title();
        $this->output('</h1>');

        // post meta
        $this->post_meta_where($q_view, 'qa-q-view');

        // avatar and who
        $this->output('<div class="qa-q-view-avatar-when">');
        $this->avatar($q_view, 'qa-q-view');
        $this->post_meta_who($q_view, 'qa-q-view');

        $this->output('<div class="qa-q-view-what-when">');
        $this->post_meta_what($q_view, 'qa-q-view');
        $this->post_meta_when($q_view, 'qa-q-view');
        $this->output('</div><!-- End qa-q-view-what-when --> </div><!-- End qa-q-view-actions -->');


        // actions and stats
        $this->output('<div class="qa-q-view-actions">');

        $this->output('<div class="qa-q-view-actions-vote">');
        if (isset($q_view[ 'main_form_tags' ])) {
            $this->output('<form ' . $q_view[ 'main_form_tags' ] . '>'); // form for question voting buttons
        }

        $this->voting($q_view);

        if (isset($q_view[ 'main_form_tags' ])) {
            $this->form_hidden_elements(@$q_view[ 'voting_form_hidden' ]);
            $this->output('</form>');
        }
        $this->output('</div><!-- End qa-q-view-actions-vote -->');

        $this->output('<div class="qa-q-view-actions-favorite">');
        $this->qa_q_view_favorite();
        $this->output('</div><!-- End qa-q-view-actions-favorite -->');

        $this->output('<div class="qa-q-view-actions-view">');
        $this->view_count($q_view);
        $this->output('</div><!-- End qa-q-view-actions-view -->');

        $this->output('</div><!-- End qa-q-view-actions -->');

        $this->output('</div><!-- End q-view-q-details -->');
        $this->output(
            '<div class="q-view-overlay"></div><!-- End q-view-overlay -->
			</div><!-- End q-view-header-->'
        );
    }

    /**
     * @param $q_view
     */
    public function q_view_main($q_view)
    {

        $this->output('<div class="qa-q-view-main">');

        if (isset($q_view[ 'main_form_tags' ])) {
            $this->output('<form ' . $q_view[ 'main_form_tags' ] . '>'); // form for buttons on question
        }

        $this->q_view_content($q_view);
        $this->q_view_extra($q_view);
        $this->q_view_follows($q_view);
        $this->q_view_closed($q_view);
        $this->post_tags($q_view, 'qa-q-view');

        $this->output('<div class="qa-q-view-footer">');
        $this->output('<div class="qa-q-view-footer-inner">');
        $this->q_action_buttons($q_view);

        if (qa_is_logged_in()) {
            $this->output('<div class="qa-q-more-buttons" data-id="' . get_the_id($q_view) . '"><i class="material-icons">more_horiz</i></div>');
        }
        $this->output('</div><!-- End: qa-q-view-footer-inner -->');

        $this->output('<div class="qa-q-additional-buttons-model" id="' . get_the_id($q_view) . '">');
        $this->q_additional_buttons($q_view);
        $this->output('</div><!-- End: qa-q-additional-buttons-model -->');

        $this->output('</div><!-- End: qa-q-view-footer -->');

        if (isset($q_view[ 'main_form_tags' ])) {
            $this->form_hidden_elements(@$q_view[ 'buttons_form_hidden' ]);
            $this->output('</form>');
        }

        $this->c_list(@$q_view[ 'c_list' ], 'qa-q-view');
        $this->c_form(@$q_view[ 'c_form' ]);

        $this->output('</div> <!-- END qa-q-view-main -->');
    }

    /**
     * @param $q_view
     */
    public function q_action_buttons($q_view)
    {

        if (isset($q_view[ 'form' ])) {

            foreach ($q_view[ 'form' ][ 'buttons' ] as $key => $val) {
                if ( ! in_array($key, ['answer', 'comment'])) {
                    unset($q_view[ 'form' ][ 'buttons' ][ $key ]);
                }
            }
        }

        $this->q_view_buttons($q_view);
    }

    /**
     * @param $q_view
     */
    public function q_additional_buttons($q_view)
    {

        if (isset($q_view[ 'form' ])) {

            foreach ($q_view[ 'form' ][ 'buttons' ] as $key => $val) {
                if (in_array($key, ['answer', 'comment'])) {
                    unset($q_view[ 'form' ][ 'buttons' ][ $key ]);
                }
            }
        }

        $this->q_view_buttons($q_view);
    }

    /**
     * @param $a_item
     */
    public function a_list_item($a_item)
    {
        $extraclass = @$a_item[ 'classes' ] . ($a_item[ 'hidden' ] ? ' qa-a-list-item-hidden' : ($a_item[ 'selected' ] ? ' qa-a-list-item-selected' : ''));

        $this->output('<div class="qa-a-list-item ' . $extraclass . '" ' . @$a_item[ 'tags' ] . '>');

        $this->a_item_main($a_item);
        $this->a_item_clear();

        $this->output('</div> <!-- END qa-a-list-item -->', '');
    }

    /**
     * @param $a_item
     */
    public function a_item_main($a_item)
    {

        $this->output('<div class="qa-a-item-main">');

        if ($a_item[ 'hidden' ]) {
            $this->output('<div class="qa-a-item-hidden">');
        } elseif ($a_item[ 'selected' ]) {
            $this->output('<div class="qa-a-item-selected">');
        }

        $this->post_avatar_meta($a_item, 'qa-a-item');

        $this->output('<div class="a-vote-select-box">');

        // vote button from a_list_item
        if (isset($a_item[ 'main_form_tags' ])) {
            $this->output('<form ' . $a_item[ 'main_form_tags' ] . '>'); // form for answer voting buttons
        }

        $this->voting($a_item);

        if (isset($a_item[ 'main_form_tags' ])) {
            $this->form_hidden_elements(@$a_item[ 'voting_form_hidden' ]);
            $this->output('</form>');
        } // vote from a_list_item end

        if (isset($a_item[ 'main_form_tags' ])) {
            $this->output('<form ' . $a_item[ 'main_form_tags' ] . '>'); // form for buttons on answer
        }

        $this->a_selection($a_item);

        if (isset($a_item[ 'main_form_tags' ])) {
            $this->form_hidden_elements(@$a_item[ 'buttons_form_hidden' ]);
            $this->output('</form>');
        }

        $this->output('</div><!-- End a-vote-select-box -->');

        if (isset($a_item[ 'main_form_tags' ])) {
            $this->output('<form ' . $a_item[ 'main_form_tags' ] . '>'); // form for buttons on answer
        }

        $this->error(@$a_item[ 'error' ]);
        $this->a_item_content($a_item);


        if ($a_item[ 'hidden' ] || $a_item[ 'selected' ]) {
            $this->output('</div>');
        }

        $this->output('<div class="a-item-footer">');

        $this->output('<div class="a-item-footer-inner">');
        $this->a_action_buttons($a_item);
        $this->output('<div class="qa-q-more-buttons" data-id="' . get_the_id($a_item) . '"><i class="material-icons">more_horiz</i></div>');
        $this->output('</div><!-- End: a-item-footer-inner -->');

        $this->output('<div class="qa-q-additional-buttons-model" id="' . get_the_id($a_item) . '">');
        $this->a_additional_buttons($a_item);
        $this->output('</div>');
        $this->output('</div><!-- End: a-item-footer -->');


        if (isset($a_item[ 'main_form_tags' ])) {
            $this->form_hidden_elements(@$a_item[ 'buttons_form_hidden' ]);
            $this->output('</form>');
        }

        $this->c_list(@$a_item[ 'c_list' ], 'qa-a-item');
        $this->c_form(@$a_item[ 'c_form' ]);

        $this->output('</div> <!-- END qa-a-item-main -->');
    }

    /**
     * @param $a_item
     */
    public function a_action_buttons($a_item)
    {

        if (isset($a_item[ 'form' ])) {

            foreach ($a_item[ 'form' ][ 'buttons' ] as $key => $val) {
                if ( ! in_array($key, ['comment'])) {
                    unset($a_item[ 'form' ][ 'buttons' ][ $key ]);
                }
            }
        }

        $this->c_item_buttons($a_item);
    }

    /**
     * @param $a_item
     */
    public function a_additional_buttons($a_item)
    {

        if (isset($a_item[ 'form' ])) {

            foreach ($a_item[ 'form' ][ 'buttons' ] as $key => $val) {
                if (in_array($key, ['comment'])) {
                    unset($a_item[ 'form' ][ 'buttons' ][ $key ]);
                }
            }
        }

        $this->c_item_buttons($a_item);
    }

    /**
     * @param $c_item
     */
    public function c_item_main($c_item)
    {

        if (isset($c_item[ 'main_form_tags' ])) {
            $this->output('<form ' . $c_item[ 'main_form_tags' ] . '>'); // form for buttons on comment
        }

        $this->error(@$c_item[ 'error' ]);

        $this->post_avatar_meta($c_item, 'qa-c-item');

        if (isset($c_item[ 'expand_tags' ])) {
            $this->c_item_expand($c_item);
        } elseif (isset($c_item[ 'url' ])) {
            $this->c_item_link($c_item);
        } else {
            $this->c_item_content($c_item);
        }

        $this->output('<div class="qa-c-item-footer">');

        $this->output('<div class="qa-c-item-footer-inner">');
        $this->c_action_buttons($c_item);
        $this->output('<div class="qa-q-more-buttons" data-id="' . get_the_id($c_item) . '"><i class="material-icons">more_horiz</i></div>');
        $this->output('</div><!-- End: qa-c-item-footer-inner -->');

        $this->output('<div class="qa-q-additional-buttons-model" id="' . get_the_id($c_item) . '">');
        $this->c_additional_buttons($c_item);
        $this->output('</div>');
        $this->output('</div><!-- End qa-c-item-footer -->');

        if (isset($c_item[ 'main_form_tags' ])) {
            $this->form_hidden_elements(@$c_item[ 'buttons_form_hidden' ]);
            $this->output('</form>');
        }
    }

    /**
     * @param $c_item
     */
    public function c_action_buttons($c_item)
    {

        if (isset($c_item[ 'form' ])) {

            foreach ($c_item[ 'form' ][ 'buttons' ] as $key => $val) {
                if ( ! in_array($key, ['comment'])) {
                    unset($c_item[ 'form' ][ 'buttons' ][ $key ]);
                }
            }
        }

        $this->c_item_buttons($c_item);
    }

    /**
     * @param $c_item
     */
    public function c_additional_buttons($c_item)
    {

        if (isset($c_item[ 'form' ])) {

            foreach ($c_item[ 'form' ][ 'buttons' ] as $key => $val) {
                if (in_array($key, ['comment'])) {
                    unset($c_item[ 'form' ][ 'buttons' ][ $key ]);
                }
            }
        }

        $this->c_item_buttons($c_item);
    }

    /**
     * Overload to set custom users page layout with 1 + 2-3 + all
     *
     * @param $ranking
     */
    public function ranking($ranking)
    {
        $this->part_title($ranking);


        if ( ! isset($ranking[ 'type' ])) {
            $ranking[ 'type' ] = 'items';
        }
        $class = 'qa-top-' . $ranking[ 'type' ];

        if ( ! $this->ranking_block_layout) {
            // old, less semantic table layout
            $this->ranking_table($ranking, $class);
        } else {
            // new block layout
            foreach ($ranking[ 'items' ] as $item) {

                $userrank_class = NULL;

                if ($this->template == 'users') {

                    $userid   = $item[ 'raw' ][ 'userid' ];
                    $handle   = $item[ 'raw' ][ 'handle' ];
                    $rank     = $this->get_user_rank($userid, $handle);
                    $userrank = $rank[ 'userrank' ];

                    $userrank_class = in_array($userrank, [1, 2, 3]) ? ' userrank-' . $userrank : NULL;

                }

                $this->output('<span class="qa-ranking-item ' . $class . '-item' . $userrank_class . '">');
                $this->ranking_item($item, $class);
                $this->output('</span>');
            }
        }

        $this->part_footer($ranking);
    }

    /**
     * @param $userid
     * @param $handle
     *
     * @return array
     */
    public function get_user_rank($userid, $handle)
    {
        $identifier = QA_FINAL_EXTERNAL_USERS ? $userid : $handle;

        list($useraccount, $userprofile, $userpoints, $userrank) =
            qa_db_select_with_pending(
                QA_FINAL_EXTERNAL_USERS ? NULL : qa_db_user_account_selectspec($handle, FALSE),
                QA_FINAL_EXTERNAL_USERS ? NULL : qa_db_user_profile_selectspec($handle, FALSE),
                qa_db_user_points_selectspec($identifier),
                qa_db_user_rank_selectspec($identifier)
            );

        $userrank = ['userrank' => $userrank];

        return $userrank;
    }

    /**
     *
     */
    public function attribution()
    {

        // floated right
        $this->output($this->lion->credits());
        parent::attribution();
    }

    /**
     *
     */
    public function logo() { }
}