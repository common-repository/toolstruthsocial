<?php
defined('ABSPATH') or die();
use Abraham\TwitterOAuth\TwitterOAuth;
$truthsocial_twitter_consumer_key 	 = trim(sanitize_text_field(get_site_option('truthsocial_twitter_consumer_key', '')));
$truthsocial_twitter_consumer_secret = trim(sanitize_text_field(get_site_option('truthsocial_twitter_consumer_secret', '')));
$truthsocial_twitter_access_token 	 = trim(sanitize_text_field(get_site_option('truthsocial_twitter_access_token', '')));
$truthsocial_twitter_token_secret 	 = trim(sanitize_text_field(get_site_option('truthsocial_twitter_token_secret', '')));
$truthsocial_twitter_tweets = (isset($truthsocial_twitter_api_settings['truthsocial_twitter_tweets'])) ? $truthsocial_twitter_api_settings['truthsocial_twitter_tweets'] : '5';
$truthsocial_twitter_layout = (isset($truthsocial_twitter_api_settings['truthsocial_twitter_layout'])) ? $truthsocial_twitter_api_settings['truthsocial_twitter_layout'] : '6';
function truthsocial_get_twitter_connection($truthsocial_twitter_consumer_key, $truthsocial_twitter_consumer_secret, $truthsocial_twitter_access_token, $truthsocial_twitter_token_secret)
{
	try {
		$twitter_client = new TwitterOAuth($truthsocial_twitter_consumer_key, $truthsocial_twitter_consumer_secret, $truthsocial_twitter_access_token, $truthsocial_twitter_token_secret);
		$content = $twitter_client->get("account/verify_credentials");
		if (!$content) {
			throw new Exception(esc_html__('Connection Error', 'truthsocial'));
		}
	} catch (Exception $e) {
		echo esc_html($e->getMessage());
		return null;
	}
	return $twitter_client;
}
if (isset($truthsocial_twitter_consumer_key)) {
	$connection = truthsocial_get_twitter_connection($truthsocial_twitter_consumer_key, $truthsocial_twitter_consumer_secret, $truthsocial_twitter_access_token, $truthsocial_twitter_token_secret);
} else {
	$connection = truthsocial_get_twitter_connection($temp_truthsocial_twitter_consumer_key, $temp_truthsocial_twitter_consumer_secret, $temp_truthsocial_twitter_access_token, $temp_truthsocial_twitter_token_secret);
}
if (!$connection) {
	$error_message = esc_html__("Can't connect to Twitter API. Check your internet connection.", 'truthsocial');
	die($error_message);
}
$statuses = $connection->get(
	"statuses/home_timeline",
	[
		"count"           => $truthsocial_twitter_tweets,
		"exclude_replies"  => 'false',
		"include_entities" => 0
	]
);