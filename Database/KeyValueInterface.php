<?php

	namespace Aff\Framework\Database;

	use Aff\Framework;


	interface KeyValueInterface extends ClientInterface
	{

		public function set ( $key, $value, array $params = null );

		public function get ( $key );

		public function exists ( $key );

		public function remove ( $key );

		public function flush ( );

		public function increment ( $key, $val = 1 );

		public function decrement ( $key, $val = 1 );

		public function expireAt ( $key, $timestamp );

		public function ttl ( $key, $seconds = null );

	}
	
?>