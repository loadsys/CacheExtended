<?php
/**
 * Extension of the Memcache storage engine for cache
 *
 * PHP 5
 */

App::uses('MemcacheEngine', 'Cache/Engine');

/**
 * Memcache storage engine for cache.  Memcache has some limitations in the amount of
 * control you have over expire times far in the future.  See MemcacheEngine::write() for
 * more information.
 *
 * @package       CacheExtended.Cache.Engine
 */
class MemcacheExtendedEngine extends MemcacheEngine {

/**
 * Read all keys from the cache
 *
 * @return array of cache items and statistics per item
 */
	public function readall() {
		$cache_list = array();
		$i = 0;
		$key_stats = array();

		foreach ($this->_Memcache->getExtendedStats('slabs') as $slabs) {
			foreach (array_keys($slabs) as $slabId) {
				if (!is_numeric($slabId)) {
					continue;
				}

				foreach ($this->_Memcache->getExtendedStats('cachedump', $slabId) as $stats) {
					$key_stats += $stats;
					if (!is_array($stats)) {
						continue;
					}
					foreach (array_keys($stats) as $key) {
						if (strpos($key, $this->settings['prefix']) === 0) {
							$cache_list[$key] = $this->_Memcache->get($key);
						}
					}
				}
			}
		}

		foreach ($key_stats as $key => $value) {
			if (!array_key_exists($key, $cache_list)) {
				unset($key_stats[$key]);
			} unset($key, $value);
		}
		return array('items' => $cache_list, 'stats' => $key_stats);
	}

}
