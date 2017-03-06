<?php

	namespace Aff\Framework\Database;

	use Aff\Framework;


	interface KeyValueInterface extends ClientInterface
	{

		// VALUES

		public function set ( $key, $value );

		public function get ( $key );

		public function exists ( $key );

		public function remove ( $key );

		public function increment ( $key, $val = 1 );

		public function decrement ( $key, $val = 1 );



		// LISTS

		public function getFromListByRange ( $key, $start = 0, $stop = -1 );

		public function getFromListByPosition ( $key, $pos );

		public function appendToList ( $key, $value );

		public function prependToList ( $key, $value );

		public function getListLength ( $key );



		// SETS

		public function getSet ( $key );

		public function addToSet ( $key, $value );

		public function isInSet ( $key, $value );

		public function removeFromSet ( $key, $value );

		public function getSetLength ( $key );



		// ORDERED SETS
		
		public function getFromSortedSetByScore( $key,  $start, $end );

		public function addToSortedSet ( $key, $value );

		public function isInSortedSet ( $key, $value );

		public function removeFromSortedSet ( $key, $value );

		public function getSortedSetLength ( $key );



		// MAPS (objects)

		public function setMap ( $key, array $data );

		public function setMapField ( $key, $field, $value );

		public function getMapField ( $key, $field );

		public function mapFieldExists ( $key, $field );

		public function getMap ( $key );

		public function getMapFieldCount ( $key );

		public function incrementMapValue ( $key, $field, $by = 1 );

		public function removeMapField ( $key, $field );

		public function getMapFieldLength ( $key, $field );




		// GENERAL

		public function flush ( );

		public function expireAt ( $key, $timestamp );

		public function ttl ( $key, $seconds = null );

	}
	
?>