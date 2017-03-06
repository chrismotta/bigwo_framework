<?php

	namespace Aff\Framework\Database;

	use Aff\Framework;


	interface KeyValueInterface extends ClientInterface
	{

		public function set ( $key, $value );

		public function get ( $key );

		public function getFromListByRange ( $key, $start = 0, $end = -1 );

		public function getFromListByPosition ( $key, $pos );

		public function appendToList ( $key, $value );

		public function prependToList ( $key, $value );

		public function getListLength ( $key );		

		public function exists ( $key );

		public function remove ( $key );

		public function flush ( );

		public function increment ( $key, $val = 1 );

		public function decrement ( $key, $val = 1 );

		public function expireAt ( $key, $timestamp );

		public function ttl ( $key, $seconds = null );

	}
	
?>