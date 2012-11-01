<?php

App::uses('Shell', 'Console');

class CacheShell extends Shell {
	public function main() {
		foreach (Cache::configured() as $config) {
			Cache::clear($config);
		}

		$this->out('Cache cleared');
	}
}
