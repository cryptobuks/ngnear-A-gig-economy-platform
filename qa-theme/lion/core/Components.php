<?php
/**
 * Created by Q2A Market.
 * http://q2amarket.com
 *
 * Project: lion
 * File: Components.php
 * Description: Require components for the Lion theme
 */

namespace Q2AMarket\Lion\Components;

use function qa_opt;

/**
 * Class Components
 *
 * @package Q2AMarket\Lion\Components
 */
class Components {

    /**
     * @var int Drawer navigation avatar size
     */
    private $nav_avatar_size = 64;

    /**
     * Components constructor.
     */
    public function __construct() { }

    /**
     * @param $manifest
     * @param $favicon
     * @param $app_icon
     *
     * @return array
     */
	public function head_metas( $manifest, $favicon, $app_icon ) {
		$head_html   = [ '<link rel="manifest" href="' . $manifest . '">' ];
		$head_html[] = '<meta name="theme-color" content="' . qa_opt('lion_primary_color') . '"/>';
		$head_html[] = '<meta name="viewport" content="width=device-width, initial-scale=1"/>';
		$head_html[] = '<link rel="icon" href="' . $favicon . '">';
		$head_html[] = '<link rel="icon" sizes="192x192" href="' . $app_icon . '">';

		return $head_html;
	}

    /**
     * @param $data
     *
     * @return bool
     */public function topbar_page_title( $data ) {

		$q_view = @$data[ 'q_view' ];

		if ( isset( $q_view[ 'url' ] ) ) {
			return FALSE;
		}

		return $data[ 'title' ];

	}

    /**
     * @param $data
     *
     * @return bool
     */public function question_title( $data ) {

		$q_view = @$data[ 'q_view' ];

		if ( isset( $q_view[ 'url' ] ) ) {
			return $data[ 'title' ];
		}

		return FALSE;

	}

	/**
	 * Auto add material design icon based on the suffix get from the nav main array.
	 * The custom pages and links will have the same icon.
	 *
	 * @param $suffix   nav suffix from nav array
	 *
	 * @return mixed
	 * @since Lion 1.0.0
	 */
	public function nav_main( $suffix ) {

		$nav_icons = [
			'activity'   => 'autorenew',
			'home'       => 'home',
			'questions'  => 'chat_bubble',
			'hot'        => 'highlight',
			'unanswered' => 'speaker_notes_off',
			'tag'        => 'local_offer',
			'categories' => 'folder',
			'user'       => 'people',
			'ask'        => 'add_box',
			'admin'      => 'settings',
			'custom'     => 'note'
		];

		return $nav_icons[ $suffix ];

	}

	/**
	 * @return string|void
	 */
	public function main_nav_user_box() {

		if ( ! qa_is_logged_in() ) {
			return;
		}

		$output = '<div class="account-box">
            <div class="account-links">
                <div class="account-action">
                    <div class="ac-avatar">' . $this->get_user_avatar() . '</div>
                    <a href="' . qa_path( 'logout' ) . '" class="action-item"><i class="material-icons">power_settings_new</i></a>
                    <a href="' . qa_path( 'updates' ) . '" class="action-item"><i class="material-icons">update</i></a>
                    <a href="' . qa_path( 'messages' ) . '" class="action-item"><i class="material-icons">sms</i></a>
                    <a href="' . qa_path( 'account' ) . '" class="action-item"><i class="material-icons">mode_edit</i></a>

                </div>
                <div class="user-links">
                    <div class="username"><a href="' . qa_path( 'user', [ 'qa_1' => qa_get_logged_in_handle() ] ) . '">' . qa_get_logged_in_handle() . '</a></div>
                    <div class="points">' . qa_lang_html('admin/points_title') . ': ' . $this->get_user_points() . '</div>
                </div>
            </div>
            <div class="account-overlay"></div>
        </div>';

		return $output;
	}

    /**
     * @return bool|mixed|string
     */
    public function get_user_points() {
		if ( qa_is_logged_in() ) {
			$userpoints = qa_get_logged_in_points();
			$pointshtml = $userpoints == 1
				? qa_lang_html_sub( 'main/1_point', '1', '1' )
				: qa_html( ( qa_qa_version_below( '1.8.0' ) ? number_format( $userpoints ) : qa_format_number( $userpoints ) ) );

			return $pointshtml;
		}

		return FALSE;
	}

    /**
     * @return mixed|null|string
     */
    public function get_user_avatar() {
		if ( qa_is_logged_in() ) {
			// get logged-in user avatar
			$handle = qa_get_logged_in_user_field( 'handle' );

			if ( QA_FINAL_EXTERNAL_USERS ) {
				$tobar_avatar = qa_get_external_avatar_html( qa_get_logged_in_user_field( 'userid' ), $this->nav_avatar_size, TRUE );
			} else {
				$tobar_avatar = qa_get_user_avatar_html(
					qa_get_logged_in_user_field( 'flags' ),
					qa_get_logged_in_user_field( 'email' ),
					$handle,
					qa_get_logged_in_user_field( 'avatarblobid' ),
					qa_get_logged_in_user_field( 'avatarwidth' ),
					qa_get_logged_in_user_field( 'avatarheight' ),
					$this->nav_avatar_size,
					FALSE
				);
			}

			$avatar = strip_tags( $tobar_avatar, '<img>' );
			if ( ! empty( $avatar ) ) {
				$handle = '';
			}

			return $tobar_avatar;
		}
	}

	/**
	 * @param $q_item
	 *
	 * @return array|bool
	 */
	public function q_item_what_icon( $q_item ) {

		$icons = [
			'main/asked'                => 'chat_bubble',
			'main/asked_related_q'      => 'link',
			'main/answered'             => 'chat',
			'main/answer_selected'      => 'done',
			'main/answer_reshown'       => 'visibility',
			'main/answer_edited'        => 'mode_edit',
			'main/commented'            => 'question_answer',
			'main/comment_moved'        => 'forward',
			'main/comment_reshown'      => 'visibility',
			'main/comment_edited'       => 'mode_edit',
			'main/hidden'               => 'visibility_off',
			'main/edited'               => 'mode_edit',
			'main/reshown'              => 'visibility',
			'main/closed'               => 'lock',
			'main/reopened'             => 'lock_open',
			'main/retagged'             => 'local_offer',
			'main/recategorized'        => 'folder',
			'misc/your_q_hidden'        => 'visibility_off',
			'misc/your_q_reshown'       => 'visibility',
			'misc/your_q_closed'        => 'lock',
			'misc/your_q_reopened'      => 'lock_open',
			'misc/your_q_retagged'      => 'local_offer',
			'misc/your_q_recategorized' => 'folder',
			'misc/your_q_answered'      => 'chat',
			'misc/your_q_commented'     => 'question_answer',
			'misc/your_a_selected'      => 'done',
			'misc/your_a_hidden'        => 'visibility',
			'misc/your_a_reshown'       => 'visibility_off',
			'misc/your_a_edited'        => 'mode_edit',
			'misc/your_a_questioned'    => 'chat_bubble',
			'misc/your_a_commented'     => 'question_answer',
			'misc/your_c_followed'      => 'reply',
			'misc/your_c_moved'         => 'forward',
			'misc/your_c_hidden'        => 'visibility_off',
			'misc/your_c_reshown'       => 'visibility',
			'misc/your_c_edited'        => 'mode_edit',
			'misc/your_q_edited'        => 'mode_edit'
		];

		foreach ( $icons as $key => $value ) {

			if ( $q_item[ 'what' ] == qa_lang( $key ) ) {
				$what[ 'icon' ]  = $value;
				$what[ 'event' ] = qa_lang( $key );

				return $what;
			}
		}

		return FALSE;

	}

    /**
     * @param $template
     *
     * @return bool|string
     */public function floating_button( $template ) {

		if ( qa_request_part( 0 ) != 'admin' && $template != 'ask' ) {
			$html = '<div class="floating-btn"><a href="' . qa_path_html( 'ask' ) . '"><i class="material-icons">add</i></a></div>';

			return $html;
		}

		return FALSE;
	}

}