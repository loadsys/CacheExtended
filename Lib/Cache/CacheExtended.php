<?php
/**
 * Extended Caching for CakePHP.
 *
 * PHP 5
 */

App::uses('Cache', 'Cache');

/**
 * Cache provides a consistent interface to Caching in your application. It allows you
 *
 * @package       CacheExtended.CacheExtended
 */
class CacheExtended extends Cache {

/**
 * Delete all keys from the cache.
 *
 * @param boolean $check if true will check expiration, otherwise delete all
 * @param string $config name of the configuration to use. Defaults to 'default'
 * @return boolean True if the cache was successfully cleared, false otherwise
 */
	public static function readall($config = 'default') {
		if (!self::isInitialized($config)) {
			return false;
		}
		$success = self::$_engines[$config]->readall();
		self::set(null, $config);
		return $success;
	}
}
