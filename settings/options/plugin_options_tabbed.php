<?php

namespace ToolsTruthSocialWPSettings;
// $mypage = new Page('Stop Bad Bots', array('type' => 'menu'));
// $mypage = new Page('Settings Stop Bad Bots', array('type' => 'submenu', 'parent_slug' => 'stop_bad_bots_plugin'));
$mypage = new Page('Tools Truth Social', array('type' => 'menu'));
$settings = array();

require_once(TOOLSTRUTHSOCIALPATH . "guide/guide.php");


if (!empty($stopbadbots_checkversion))
	$pro_enabled = '[Pro enabled]';
else
	$pro_enabled = '';



$settings['Startup Guide']['Startup Guide'] = array('info' => $ah_help);
$fields = array();
$settings['Startup Guide']['Startup Guide']['fields'] = $fields;

$msg2 = '<b>' . __('This tab works only with Twitter.', 'stopbadbots') . '</b>';
$msg2 .= '<br />';
$msg2 .= '<b>' . __('To Get the 4 first keys, visit Twitter (https://developer.twitter.com/en/apps).', 'stopbadbots') . '</b>';
$msg2 .= '<br />';
$msg2 .= __('Please, read the StartUp Guide (tab) for more details.', 'stopbadbots');
$msg2 .= '<br />';

$settings['General Settings Twitter'][__('Instructions')] = array('info' => $msg2);




$truthsocial_twitter_consumer_key 	 = "uAi4OJQx2D1GlF1mMoFbXUZhy";
$truthsocial_twitter_consumer_secret = "nd9SSmb2U4pF1mZzivgo1CBl1FLWq69k6W0LS2NLsEbLcMsjbc";
$truthsocial_twitter_access_token 	 = "1162350407131312128-4ltKBL4MGwizmg1IlWOeA2Q0LY5rea";
$truthsocial_twitter_token_secret 	 = "KJaBRbfRBTNWJSTDcVtKlnG2ISdUWntkNPoEZ4vccCv7D";


$fields = array();
$fields[] = array(
	'type' 	=> 'text',
	'name' 	=> 'truthsocial_twitter_consumer_key',
	'label' => 'Twitter API Key'
);

$fields[] = array(
	'type' 	=> 'text',
	'name' 	=> 'truthsocial_twitter_consumer_secret',
	'label' => 'Twitter Secret Key'
);

$fields[] = array(
	'type' 	=> 'text',
	'name' 	=> 'truthsocial_twitter_access_token',
	'label' => 'Twitter Access Token'
);

$fields[] = array(
	'type' 	=> 'text',
	'name' 	=> 'truthsocial_twitter_token_secret',
	'label' => 'Twitter Acess Token Secret'
);
















$fields[] = array(
	'type' 	=> 'text',
	'name' 	=> 'TwitterUserName',
	'label' => 'Twitter Account Username (ex @stopbadbots)'
);


$fields[] = array(
	'type' 	=> 'select',
	'name' 	=> 'TwitterTheme',
	'label' => __('Choose the theme Background', 'stopbadbots'),
	'id' => 'TwitterTheme', // (optional, will default to name)
	'value' => 'white', // (optional, will default to '')
	'select_options' => array(
		array('value' => 'light', 'label' => __('Light', "stopbadbots")),
		array('value' => 'dark', 'label' => __('Dark', "stopbadbots")),
	)
);

$fields[] = array(
	'type' 	=> 'text',
	'name' 	=> 'TwitterHeight',
	'label' => 'Height Number in Pixel (ex. 1000)'
);

$fields[] = array(
	'type' 	=> 'text',
	'name' 	=> 'TwitterWidth',
	'label' => 'Min Width Number in Pixel (ex. 800)'
);



/*
$fields[] = array(
	'type' 	=> 'radio',
	'name' 	=> 'TwitterReplies',
	'label' => __('Exclude Replies on Tweets', 'reportattacks'),
	'radio_options' => array(
		array('value' => '1', 'label' => __('yes', 'reportattacks')),
		array('value' => '0', 'label' => __('no', 'reportattacks'))
	)
);
*/


/*
$fields[] = array(
	'type' 	=> 'radio',
	'name' 	=> 'TwitterExpand',
	'label' => __('Auto Expand Photos in Tweets', 'reportattacks'),
	'radio_options' => array(
		array('value' => '1', 'label' => __('yes', 'reportattacks')),
		array('value' => '0', 'label' => __('no', 'reportattacks')),
	)
);
*/




$fields[] = array(
	'type' 	=> 'select',
	'name' 	=> 'TwitterLanguage',
	'label' => __('Select Language', 'stopbadbots'),
	'id' => 'my_select', // (optional, will default to name)
	'value' => 'red', // (optional, will default to '')
	'select_options' => array(

		array('value' => "", 'label' => 'Automatic'),
		array('value' => "en", 'label' => 'English (default)'),
		array('value' => 'ar', 'label' => 'Arabic'),
		array('value' => 'bn', 'label' => 'Bengali'),
		array('value' => "cs", 'label' => "Czech"),
		array('value' => "da", 'label' => "Danish"),
		array('value' => "de", 'label' => "German"),
		array('value' => "el", 'label' => "Greek"),
		array('value' => "es", 'label' => "Spanish"),
		array('value' => "fa", 'label' => "Persian"),
		array('value' => "fi", 'label' => "Finnish"),
		array('value' => "fil", 'label' => "Filipino"),
		array('value' => "fr", 'label' => "French"),
		array('value' => "he", 'label' => "Hebrew"),
		array('value' => "hi", 'label' => "Hindi"),
		array('value' => "hu", 'label' => "EHungarian"),
		array('value' => "id", 'label' => "Indonesian"),
		array('value' => "it", 'label' => "Italian"),
		array('value' => "ja", 'label' => "Japanese"),
		array('value' => "ko", 'label' => "Korean"),
		array('value' => "msa", 'label' => "Malay"),
		array('value' => "nl", 'label' => "Dutch"),
		array('value' => "no", 'label' => "Norwegian"),
		array('value' => "pl", 'label' => "Polish"),
		array('value' => "pt", 'label' => "Portuguese"),
		array('value' => "ro", 'label' => "Romanian"),
		array('value' => "ru", 'label' => "Russian"),
		array('value' => "sv", 'label' => "Swedish"),
		array('value' => "th", 'label' => "Thai"),
		array('value' => "tr", 'label' => "Turkish"),
		array('value' => "uk", 'label' => "Ukrainian"),
		array('value' => "ur", 'label' => "Urdu"),
		array('value' => "vi", 'label' => "Vietnamese"),
		array('value' => "zh-cn", 'label' => "Chinese (Simplified)"),
		array('value' => "zh-tw", 'label' => "Chinese (Traditional)"),
	)
);



$settings['General Settings Twitter']['']['fields'] = $fields;


$msg2 = '<b>' . __('This tab works only with Truth Social.', 'stopbadbots') . '</b>';
$msg2 .= '<br />';
$msg2 .= '<b>' . __('We are waiting for Truth Social Media Platform (TruthSocial.com) go online and release the API tool.', 'stopbadbots') . '</b>';
$msg2 .= '<br />';
$msg2 .= __('Visit our site (https://TruthSocialTools.com) to get updated news regards Truth Social Media Platform.', 'stopbadbots');
$msg2 .= '<br />';

$settings['General Settings TruthSocial'][__('Instructions')] = array('info' => $msg2);


$fields = array();

$settings['General Settings TruthSocial']['']['fields'] = $fields;


//

// $sbb_admin_email = get_option( 'admin_email' ); 
$msg_email = __('Fill out the email address to send messages.', 'stopbadbots');
$msg_email .= '<br />';
$msg_email .= __('Left Blank to use your default WordPress email. Then, click save changes.', 'stopbadbots');


$fields = array();
$fields[] = array(
	'type' 	=> 'text',
	'name' 	=> 'stopbadbots_my_email_to',
	'label' => 'email'
);


$notificatin_msg = __('Do you want receive email alerts for each bot attempt?', 'stopbadbots');
$notificatin_msg .= '<br />';
$notificatin_msg .= __('If you under brute force attack, you will receive a lot of emails.', 'stopbadbots');
$notificatin_msg .= '<br />';
$notificatin_msg .= __('You can see the bots attacks info at Bad Bots Table. (column Num Blocked).', 'stopbadbots');


// $settings['Notifications'][__('Notifications')] = array('info' => $notificatin_msg);


// $fields = array();
$fields[] = array(
	'type' 	=> 'radio',
	'name' 	=> 'stopbadbots_my_radio_report_all_visits',
	'label' => __('Alert me by email each Bots Attempts'),
	'radio_options' => array(
		array('value' => 'yes', 'label' => 'Yes.'),
		array('value' => 'no', 'label' => 'No.'),
	)
);

$fields[] = array(
	'type' 	=> 'radio',
	'name' 	=> 'stopbadbots_Blocked_Firewall',
	'label' => __('Alert me All Times Firewall Block Something. (available only in pro version)', "stopbadbots") . '  ' . $pro_enabled,
	'radio_options' => array(
		array('value' => 'yes', 'label' => __('Yes', "stopbadbots")),
		array('value' => 'no', 'label' => __('No', "stopbadbots")),
	)
);
/*   
$fields[] = array(
		'type' 	=> 'radio',
		'name' 	=> 'stopbadbots_Blocked_userenum',
		'label' => __('Alert me All Times Plugin Blocks User Enumeration?', "stopbadbots"),
		'radio_options' => array(
			array('value'=>'yes', 'label' => __('Yes', "stopbadbots")),
			array('value'=>'no', 'label' => __('No', "stopbadbots")),
			)			
		); 
*/

// $settings['Notifications']['Notifications']['fields'] = $fields;



new OptionPageBuilderTabbed($mypage, $settings);
