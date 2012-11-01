<?php

class CacheManagerController extends CacheExtendedAppController {

	public function admin_index() {
		$configs = Cache::configured();

		$this->set(compact('configs'));
	}

	public function admin_list($config) {
		$settings = Cache::settings($config);
		$prefix = $settings['prefix'];
		if ($settings['engine'] != 'CacheExtended.MemcacheExtended') {
			throw new Exception('Engine must be set to CacheExtended.MemcacheExtended to see the list of keys.');
		}
		App::uses('CacheExtended', 'CacheExtended.Cache');
		$cache = CacheExtended::readall($config);

		$this->set(compact('config', 'cache', 'prefix'));
	}

	public function admin_view($config, $key) {
		$value = Cache::read($key, $config);

		$this->set(compact('config', 'key', 'value'));
	}

	public function admin_clear($config) {
		Cache::clear(false, $config);
		$this->Session->setFlash($config . ' cache was cleared', 'default', null, 'success');

		$this->redirect('index');
	}

	public function admin_delete($config, $key) {
		Cache::delete($key, $config);
		$this->Session->setFlash($config . '_' . $key . ' key was deleted', 'default', null, 'success');

		$this->redirect(array(
			'action' => 'admin_list',
			$config
		));
	}
}