<?php
/*
Plugin Name: lj tag parser
Plugin URI: http://binary-girl.com/lj-tag-parser
Description: Replaces &lt;lj user="username"/&gt;, &lt;lj comm="community"/&gt;, and &lt;lj-cut text=""&gt; with correct HTML code. 
Author: Alison Bellach Sonderegger
Version: 0.5
Author URI: http://binary-girl.com/
*/

// filter function to support <lj-cut text="text"></lj-cut> LjTag
function lj_cut_filter( $match_r ) {
        ob_start();
        the_permalink();
        $pslink = ob_get_contents();
        ob_end_clean();
        return( "<b>(<a href='".$pslink."'>".((trim(stripslashes( $match_r[3] ))=="")?"(Read more...)":trim( stripslashes( $match_r[3] ) ))."</a>)</b>" );
}

function lj_user_comm_parser($content) {
	$pattern_ljuser = '/<lj user="?([a-z0-9_]+)"?\/?>/i';
	$replace_ljuser = '<nobr><a href="http://www.livejournal.com/userinfo.bml?user=\\1"><img src="http://stat.livejournal.com/img/userinfo.gif" alt="userinfo" width="17" height="17" style="border: 0pt none; vertical-align: bottom;" /></a><a href="http://www.livejournal.com/users/\\1/"><b>\\1</b></a></nobr>';
	$content = preg_replace( $pattern_ljuser, $replace_ljuser, $content );

	$pattern_ljcomm = '/<lj comm="?([a-z0-9_]+)"?\/?>/i';
	$replace_ljcomm = '<nobr><a href="http://www.livejournal.com/userinfo.bml?user=\\1"><img src="http://stat.livejournal.com/img/community.gif" alt="comminfo" width="16" height="16" style="border: 0pt none; vertical-align: bottom;" /></a><a href="http://www.livejournal.com/community/\\1/"><b>\\1</b></a></nobr>';
	$content = preg_replace( $pattern_ljcomm, $replace_ljcomm, $content );

	return $content;
}

function lj_cut_parser($content) {
        $pattern_ljcut = '/(<lj-cut(\s*text\s*=\s*[\"]{0,1}\s*([^\">]+)\s*[\"]{0,1}\s*[^>]*){0,1}>)(.*?)(<\/lj-cut>)/is';
        if ( !( $_GET['p'] ) ) $content = preg_replace_callback( $pattern_ljcut, 'lj_cut_filter', $content );
        return $content;
}

add_filter('the_title', 'lj_user_comm_parser');
add_filter('the_content', 'lj_user_comm_parser');
add_filter('the_content', 'lj_cut_parser');
add_filter('comment_text', 'lj_user_comm_parser');
?>
