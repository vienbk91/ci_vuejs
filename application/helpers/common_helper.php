<?php

/**
 * システム言語取得
 *
 * Returns 言語英語(default:japanese)
 *
 * @access public
 * @return string
 */
if (! function_exists( 'getLanguage' )) {
	function getLanguage() {
		if (!isset( $_SESSION['system_param']['language'] )) {
			$_SESSION['system_param']['language'] = "japanese";
		}
		return $_SESSION['system_param']['language'];
	}
}