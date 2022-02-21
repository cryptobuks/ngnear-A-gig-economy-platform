<?php
/**
 * Created by Q2A Market
 * http://q2amarket.com
 *
 * Project: lion
 * File: lion-colors.php
 * Description: Lion theme dynamic css for color settings
 */
require_once 'css-init.php';
?>

    .primary-color-bg, .topbar, .qa-page-links ul li.qa-page-links-item .qa-page-selected, .qa-sidepanel .qa-sidebar, .button-primary, .qa-form-tall-button, .qa-form-wide-button, .qa-form-basic-button, .floating-btn a {
    background-color: <?php lion_color($primary_color_option) ?>;
    }

    .secondary-color-bg, .qa-template-tags .qa-part-ranking .qa-top-tags-count {
    background-color: <?php lion_color($primary_color_option) ?>;
    }

    .primary-color, .qa-nav-sub .qa-nav-sub-list .qa-nav-sub-item .qa-nav-sub-link, .qa-sidepanel .qa-activity-count .qa-activity-count-item {
    color: <?php lion_color($primary_color_option) ?>;
    }

    .primary-color-border, .qa-nav-sub .qa-nav-sub-list .qa-nav-sub-item .qa-nav-sub-link:hover, .qa-nav-sub .qa-nav-sub-list .qa-nav-sub-item .qa-nav-sub-link.qa-nav-sub-selected, input:focus, textarea:focus, select:focus {
    border-style: solid;
    border-color: <?php lion_color($primary_color_option) ?>;
    border-width: 0 0 1px 0;
    }

    .activity-widget-border, .qa-sidepanel .qa-activity-count .qa-activity-count-item:nth-child(1), .qa-sidepanel .qa-activity-count .qa-activity-count-item:nth-child(2), .qa-sidepanel .qa-activity-count .qa-activity-count-item:nth-child(3) {
    border-color: <?php lion_color($primary_color_option) ?>26;
    }

    body, html {
    background-color: <?php lion_color($body_bg_option) ?>;
    color: <?php lion_color($body_text_option) ?>;
    }

    a {
    color: <?php lion_color($primary_color_option) ?>;
    text-decoration: none;
    }

    .chip {
    color: rgba(0, 0, 0, 0.6);
    background-color: #e7e7e7;
    }

    .tag, .qa-tag-link, .qa-sidepanel .qa-widget-side > div > a {
    background-color: <?php lion_color($tag_bg_option) ?>;
    color: <?php lion_color($tag_text_option) ?>;
    }

    /*****************************
    header section
    ****************************/
    .topbar .qa-search .qa-search-button {
    background: <?php lion_color($primary_color_option) ?> url('../images/icons/search.svg?1533979654') no-repeat center;
    background-size: 24px;
    }

    /*****************************
    sub nav section
    ****************************/
    .qa-nav-sub .qa-nav-sub-list .qa-nav-sub-item .qa-nav-sub-link:hover {
    border-width: 0 0 1px 0;
    }
    .qa-nav-sub .qa-nav-sub-list .qa-nav-sub-item .qa-nav-sub-link.qa-nav-sub-selected {
    border-width: 0 0 1px 0;
    }

    /*****************************
    question list section
    ****************************/
    .qa-q-list-item .ans-box .ans-count {
    color: <?php lion_color($primary_color_option) ?>
    }


    /*****************************
    sidebar and widgets section
    ****************************/
    .qa-sidepanel .qa-sidebar {
    color: rgba(255, 255, 255, 0.7);
    }
    .qa-sidepanel .qa-sidebar a {
    color: #fff;
    }
    .qa-sidepanel .qa-activity-count .qa-activity-count-item {
    background-color: rgba(255, 255, 255, 0.8);
    }
    .qa-sidepanel .qa-widget-side h2 {
    background-color: #f4f4f4;
    border-color: #e7e7e7;
    }
    .qa-sidepanel .qa-nav-cat-link {
    color: #2A2A2A;
    }
    .qa-sidepanel .qa-nav-cat-note {
    color: #dddddd;
    }
    .qa-sidepanel .qa-related-q-list .qa-related-q-item a {
    color: #2A2A2A;
    }

    .qa-q-view .qa-q-view-header .qa-q-view-where .qa-q-view-where-data {
    background-color: <?php lion_color($success_color_option) ?>;
    }

    /*****************************
    answer section
    ****************************/
    .qa-a-list .qa-a-list-item.qa-a-list-item-selected {
    border-color: <?php lion_color($success_color_option) ?>;
    }

    /*************************************
    tags section
    *************************************/
    .qa-template-tags .qa-part-ranking .qa-top-tags-count {
    color: #fff;
    }
    .qa-template-tags .qa-part-ranking .qa-top-tags-count:before {
    background-color: rgba(255, 255, 255, 0.25);
    background: linear-gradient(to top, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.2) 100%);
    }
    .qa-template-tags .qa-part-ranking .qa-top-tags-label .qa-tag-link {
    background: #e7e7e7;
    }

    /*******************************
    categories section
    *******************************/
    .qa-template-categories .qa-part-nav-list .qa-browse-cat-list .qa-browse-cat-item .qa-browse-cat-link, .qa-template-categories .qa-part-nav-list .qa-browse-cat-list .qa-browse-cat-item .qa-browse-cat-nolink {
    color: #000;
    }
    .qa-template-categories .qa-part-nav-list .qa-browse-cat-list .qa-browse-cat-item .qa-browse-cat-note a {
    background-color: #f4f4f4;
    }
    .qa-template-categories .qa-part-nav-list .qa-browse-cat-list .qa-browse-cat-closed .qa-browse-cat-link, .qa-template-categories .qa-part-nav-list .qa-browse-cat-list .qa-browse-cat-closed .qa-browse-cat-nolink {
    background-color: #e7e7e7;
    }
    .qa-template-categories .qa-part-nav-list .qa-browse-cat-list .qa-browse-cat-open {
    border-color: #c5a788;
    }
    .qa-template-categories .qa-part-nav-list .qa-browse-cat-list .qa-browse-cat-open .qa-browse-cat-link, .qa-template-categories .qa-part-nav-list .qa-browse-cat-list .qa-browse-cat-open .qa-browse-cat-nolink {
    background-color: <?php lion_color($primary_color_option) ?>;
    }

    /*******************************
    form fields and table section
    *******************************/
    .button-default, .qa-auth-box .qa-form-tall-button-login, .qa-auth-box .qa-nav-user-register .qa-nav-user-link {
    background: #fff;
    }

    .button-primary, .qa-form-tall-button, .qa-form-wide-button, .qa-form-basic-button {
    color: #fff;
    }

    .button-secondary {
    background: <?php lion_color($secondary_color_option) ?>;
    color: #fff;
    }

    .button-success, .qa-form-tall-button-save, .qa-form-wide-button-save, .qa-form-wide-button-saverecalc, .qa-form-tall-button-ask, .qa-form-tall-button-answer, .qa-form-wide-button-change, .qa-form-tall-button-comment, .qa-form-tall-button-send, .qa-auth-box .qa-form-tall-button-login {
    background: <?php lion_color($success_color_option) ?>;
    color: #fff;
    }

    .button-gray, .qa-auth-box .qa-nav-user-register .qa-nav-user-link {
    background: #e7e7e7;
    color: #000;
    }

    .button-danger, .qa-form-tall-button-cancel, .qa-form-wide-button-cancel {
    background: #FF4646;
    color: #fff;
    }

    /*------[ forms ]------*/
    .qa-form-tall-ok, .qa-form-wide-ok {
    background-color: <?php lion_color($success_color_option) ?>;
    color: #fff;
    }

    .qa-form-wide-error, .qa-form-tall-error {
    color: <?php lion_color($danger_color_option) ?>;
    }

    .qa-form-tall-help, .qa-form-wide-help {
    background-color: <?php lion_color($secondary_color_option) ?>;
    color: #fff;
    }

    .qa-ask-similar-title {
    background: <?php lion_color($secondary_color_option) ?>;
    color: #fff;
    }

    /*******************************
    login form modal section
    *******************************/
    .qa-auth-box input[type="text"]:focus, .qa-auth-box input[type="email"]:focus, .qa-auth-box input[type="password"]:focus {
    border-color: <?php lion_color($secondary_color_option) ?>;
    }

    /*******************************
    footer section
    *******************************/
    .qa-footer {
    background-color: #333134;
    color: rgba(255, 255, 255, 0.6);
    }
    .qa-footer a {
    color: #fff;
    }
    .qa-footer .qa-attribution {
    border-color: rgba(203, 141, 79, 0.1);
    }

    /*******************************
    miscellaneous section
    *******************************/
    .qa-error, .qa-form-tall-error {
    background-color: #FF4646;
    color: rgba(255, 255, 255, 0.8);
    }
    .qa-error a, .qa-form-tall-error a {
    color: #fff;
    }

    .qa-notice {
    background-color: #ECEC5B;
    color: #000;
    }
    .qa-notice a {
    color: #000;
    }

    /*****************************
    buttons section
    ****************************/
    .floating-btn a {
    color: #fff;
    }

    /******************************************
    pussy menu override
    ******************************************/
    .pushy-link a.active, .pushy-link a.qa-nav-main-selected {
    color: <?php lion_color($primary_color_option) ?>;
    }

    /* fix button outline issue on focus */
    *[class*='button']:focus{
    border: none;
    outline: none
    }

<?php if (is_mobile()): ?>
    /******************************************
    mobile sub menu override
    ******************************************/
    body, html {
    background-color: <?php lion_color($body_bg_mobile_option) ?>;
    }
    .qa-nav-sub{
    background-color: <?php lion_color($subnav_bg_mobile_option) ?>;
    }
    .qa-nav-sub .qa-nav-sub-list .qa-nav-sub-item .qa-nav-sub-link,
    .qa-nav-sub .qa-nav-sub-list .qa-nav-sub-item .qa-nav-sub-link.qa-nav-sub-selected {
    color: <?php lion_color($subnav_text_mobile_option) ?>;
    }
    .qa-nav-sub .qa-nav-sub-list .qa-nav-sub-item .qa-nav-sub-link,.qa-nav-sub .qa-nav-sub-list .qa-nav-sub-item .qa-nav-sub-link.qa-nav-sub-selected {
    border-color: <?php lion_color($subnav_text_mobile_option) ?>;
    }
<?php endif; ?>