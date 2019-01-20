<?php
require_once "$IP/extensions/Scribunto/Scribunto.php";
require_once "$IP/extensions/MobileDetect/MobileDetect.php";
wfLoadExtensions( [
	'AbuseFilter',
	'AntiSpoof',
	'BetaFeatures',
	'CentralAuth',
	'CentralNotice',
	'CheckUser',
	'CreateWiki',
	'CookieWarning',
	'ConfirmEdit',
	'ConfirmEdit/ReCaptchaNoCaptcha',
	'Echo',
	'GlobalBlocking',
	'GlobalCssJs',
	'GlobalPreferences',
	'Interwiki',
	'LocalisationUpdate',
	'LoginNotify',
	'ManageWiki',
	'MatomoAnalytics',
	'MirahezeMagic',
	'Nuke',
	'OATHAuth',
	'OAuth',
	'ParserFunctions',
	'Renameuser',
	'RottenLinks',
	'SyntaxHighlight_GeSHi',
	'TitleBlacklist',
	'TorBlock',
	'UserMerge',
	'WikiDiscover',
	'WikiEditor',
	'cldr'
] );

$wgGlobalBlockingDatabase = 'mhglobal';

