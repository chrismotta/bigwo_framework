<?php

	namespace Aff\Framework\Database\Redis;

	use Aff\Framework;


	interface ClientInterface extends Framework\Database\KeyValueInterface, Framework\Database\InMemoryKeyValueInterface 
	{

		// SORTED SETS

		public function addToSortedSet ( $key, $value );

		public function removeFromSortedSet ( $key, $value );

		public function getSortedSetLength ( $key );

		public function getSortedSetByLex ( $key, $min, $max, $start = 0, $stop = -1 );

		public function getSortedSetByScore ( $key, $min, $max, $start = 0, $stop = -1 );



	}
	
?>