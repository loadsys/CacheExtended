CacheExtended
=============

A CakePHP 2.x plugin for extending and managing the cache.

The main purpose of this app is to provide an easy interface for clearing the
cache, both on commandline and in the browser, and to extend cache engines when
necessary.

*This plugin is in progress, and probably won't work for you*

## Configuration

Currently Memcache is the only engine supported for listing cache items. You
need to set your cache engine to the following for it to work:

	CacheExtended.MemcacheExtended

## Usage

### In the Browser

Navigate to /admin/cache_extended/cache_manager to view the list of existing
cache configurations. You'll see options to list or clear the contents of each
cache.

### Shell and Commandline

You can clear the cache using the following command on the commandline.

	cake CacheExtended.cache