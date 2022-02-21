<?php
/**
 * Created by Jatin Soni.
 * http://jatinsoni.rocks
 *
 * Project: lion
 * File: functions.php
 * Description:
 */

use Q2AMarket\Lion\Lion;

/**
 * @return bool|string
 */
function lion_get_page() {

	$templates = page_templates();
	$parts     = qa_request_parts();

	if ( count( $parts ) < 1 ) {
		return FALSE;
	}

	$request = $parts[ 0 ];

	switch ( $request ) {

		case 'activity' :
			qa_lang( 'lion/page_activity_title' );
			break;

		case 'qa' :
			qa_lang( 'lion/page_qa_title' );
			break;

		case 'questions' :
			$sort = qa_get( 'sort' );


			qa_lang_sub( 'lion/page_questions_title', $sort );
			break;
	}

	/*
		foreach ( $templates as $request => $title ) {

			if ( $parts[ 0 ] == $request ) {
				return qa_lang( $templates[ $request ] );
			} else if ( isset( $parts[ 2 ] ) && qa_request_part( 0 ) != 'admin' ) {
				return qa_lang( 'lion/' . $parts[ 0 ] . '_' . $parts[ 2 ] );
			} else if ( qa_request_part( 0 ) == 'admin' ) {
				return qa_lang_sub( 'lion/page_admin', $parts[ 1 ] );
			}
		}

	*/

	return FALSE;
}


/**
 * @return array
 */
function page_templates() {

	$templates = [
		'activity'             => 'lion/page_activity_title',
		'qa'                   => 'lion/page_qa_title',
		'questions'            => 'lion/page_questions_title',
		'hot'                  => 'lion/page_hot_title',
		'question'             => 'lion/page_question_title',
		'unanswered'           => 'lion/page_unanswered_title',
		'tags'                 => 'lion/page_tags_title',
		'categories'           => 'lion/page_categories_title',
		'users'                => 'lion/page_users_title',
		'ask'                  => 'question/ask_title',
		'message'              => 'lion/page_send_message',
		'search'               => 'lion/page_search',
		'feedback'             => 'lion/page_feedback',
		'login'                => 'users/login_title',
		'register'             => 'lion/page_register',
		'account'              => 'lion/page_edit_profile',
		'favorites'            => 'misc/my_favorites_title',
		'recent_activity_by_x' => 'lion/page_user_activity',
		'questions_by_x'       => 'lion/user_questions',
		'no_questions_by_x'    => 'lion/user_no_question',
		'answers_by_x'         => 'lion/user_answers',
		'admin_title'          => 'lion/page_admin',
		'caching_title'        => 'lion/page_admin',
		'categories_title'     => 'lion/page_admin',
		'emails_title'         => 'lion/page_admin',
		'feeds_title'          => 'lion/page_admin',
		'general_title'        => 'lion/page_admin',
		'hidden_title'         => 'lion/page_admin',
		'layout_title'         => 'lion/page_admin',
		'lists_title'          => 'lion/page_admin',
		'mailing_title'        => 'lion/page_admin',
		'moderate_title'       => 'lion/page_admin',
		'pages_title'          => 'lion/page_admin',
		'permissions_title'    => 'lion/page_admin',
		'plugins_title'        => 'lion/page_admin',
		'points_title'         => 'lion/page_admin',
		'posting_title'        => 'lion/page_admin',
		'spam_title'           => 'lion/page_admin',
		'stats_title'          => 'lion/page_admin',
		'users_title'          => 'lion/page_admin',
		'viewing_title'        => 'lion/page_admin',

	];

	return $templates;
}

/**
 * @param $data
 *
 * @return null
 */
function get_the_id( $data ) {

	if ( isset( $data[ 'raw' ] ) ) {
		if ( isset( $data[ 'raw' ][ 'postid' ] ) ) {
			$id = $data[ 'raw' ][ 'postid' ];

			return $id;
		}
	}

	return NULL;
}

/**
 * The function will return boolean based on the request
 *
 * @param $request string qa_1 request item
 *
 * @return bool return true if request matches else false
 */
function is_admin_page( $request ) {
	$requests = qa_request_parts();

	if ( $requests[ 0 ] != 'admin' ) {
		return FALSE;
	}

	if ( $requests[ 2 ] == $request ) {
		return TRUE;
	}

	return FALSE;
}

function lion_db_version() {
    global $Lion;
    return $Lion->db_version();
}