<?php

App::uses('Shell', 'Console');

class CacheShell extends Shell {
	public function main() {
		foreach (Cache::configured() as $config) {
			$this->out('Clearing ' . $config);
			Cache::clear(false, $config);
		}

		$this->out('Cache cleared');
	}
}
