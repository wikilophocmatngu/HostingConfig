<?php

$wgMemCachedPersistent = false;

// Set timeout to 500ms (in microseconds)
$wgMemCachedTimeout = 0.5 * 1e6;

$wgMemCachedServers = [];
$wgMemCachedPersistent = false;

$wgObjectCaches['memcached-mem-1'] = [
	'class'                => 'MemcachedPeclBagOStuff',
	'serializer'           => 'php',
	'persistent'           => false,
	'servers'              => [ '127.0.0.1:11212' ],
	// Effectively disable the failure limit (0 is invalid)
	'server_failure_limit' => 1e9,
	// Effectively disable the retry timeout
	'retry_timeout'        => -1,
	'loggroup'             => 'memcached',
	'timeout'              => $wgMemCachedTimeout,
];

$wgObjectCaches['memcached-mem-2'] = [
	'class'                => 'MemcachedPeclBagOStuff',
	'serializer'           => 'php',
	'persistent'           => false,
	'servers'              => [ '127.0.0.1:11213' ],
	// Effectively disable the failure limit (0 is invalid)
	'server_failure_limit' => 1e9,
	// Effectively disable the retry timeout
	'retry_timeout'        => -1,
	'loggroup'             => 'memcached',
	'timeout'              => $wgMemCachedTimeout,
];

$wi->config->settings['wgMainCacheType']['default'] = 'memcached-mem-2';
$wi->config->settings['wgMainCacheType']['betaheze'] = 'memcached-mem-1';

$wi->config->settings['wgSessionCacheType']['default'] = 'memcached-mem-2';
$wi->config->settings['wgSessionCacheType']['betaheze'] = 'memcached-mem-1';

$wgSessionsInObjectCache = true;

$wi->config->settings['wgMessageCacheType']['default'] = 'memcached-mem-1';
$wi->config->settings['wgMessageCacheType']['betaheze'] = 'memcached-mem-2';

$wgUseLocalMessageCache = true;
$wgParserCacheType = CACHE_DB;
$wgParserCacheExpireTime = 86400 * 7;

$wi->config->settings['wgLanguageConverterCacheType']['default'] = 'memcached-mem-1';
$wi->config->settings['wgLanguageConverterCacheType']['betaheze'] = 'memcached-mem-2';

$wgInvalidateCacheOnLocalSettingsChange = false;

$wgJobTypeConf['default'] = [
	'class' => 'JobQueueRedis',
	'redisServer' => '[2a10:6740::6:306]:6379',
	'redisConfig' => [
		'connectTimeout' => 2,
		'password' => $wmgRedisPassword,
		'compression' => 'gzip',
	],
	'claimTTL' => 3600,
	'daemonized' => true,
];

if ( PHP_SAPI === 'cli' ) {
	# APC not available in CLI mode
	$wi->config->settings['wgLanguageConverterCacheType']['default'] = CACHE_NONE;
	$wi->config->settings['wgLanguageConverterCacheType']['betaheze'] = CACHE_NONE;
}
