<?php

	namespace Aff\Framework\Database\Redis;

	use Aff\Framework;

	require_once( '..'.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'autoload.php');

	class Predis extends Framework\ObjectAbstract implements Framework\Database\KeyValueInterface
	{

		private $_predis;


		public function __construct ( $params = null, $options = null )
		{
			$this->_predis = new \Predis\Client( $params, $options );
		}


		public function set ( $key, $value )
		{
			$this->_predis->set( $key, $value );
		}


		public function get ( $key )
		{
			return $this->_predis->get( $key );
		}


		public function getFromListByRange ( $key, $start = 0, $stop = -1 )
		{
			return $this->_predis->lrange( $key, $start, $stop );
		}


		public function getFromListByPosition ( $key, $pos )
		{
			return $this->_predis->lindex( $key, $pos );
 		}


		public function appendToList ( $key, $value )
		{
			$this->_predis->rpush( $key, $value );
		}


		public function prependToList ( $key, $value )
		{
			$this->_predis->lpush( $key, $value );
		}


		public function getListLength ( $key )
		{
			$this->_predis->llen( $key );
		}


		public function exists ( $key )
		{
			return $this->_predis->exists( $key );
		}		


		public function increment ( $key, $val = null )
		{
			if ( $val )
			{
				if ( \is_float($val) )
					$this->_predis->executeRaw(['INCRBYFLOAT', $key, $val]);
				else
					$this->_predis->incrby( $key, $val );
			}
			else
				$this->_predis->incr( $key );
		}


		public function decrement ( $key, $val = null )
		{
			if ( $val )
				$this->_predis->decrby( $key, $val );
			else
				$this->_predis->decr( $key );
		}


		public function remove ( $key )
		{
			$this->_predis->set( $key, $value );
		}


		public function expireAt ( $key, $timestamp )
		{
			$this->_predis->expireat( $key,  $timestamp );
		}


		public function ttl ( $key, $seconds = null )
		{
			if ( $timestamp )
				$this->_predis->expire( $key,  $timestamp );
			else
				$this->_predis->ttl( $key,  $timestamp );
		}


		public function flush ( )
		{
			$this->_predis->flushall();
		}


		public function flushDb ( )
		{
			$this->_predis->flushdb();
		}		


		public function setMap ( $key, array $data )
		{
			$this->_predis->hmset( $key, $data );
		}


		public function setMapField ( $key, $field, $value )
		{
			$this->_predis->hset( $key, $field, $value );	
		}


		public function getMapField ( $key, $field )
		{
			$this->_predis->hget( $key, $field );	
		}


		public function mapFieldExists ( $key, $field )
		{
			$this->_predis->hexists( $key, $field );
		}


		public function getMap ( $key )
		{
			$this->_predis->hgetall( $key );
		}


		public function getMapFieldCount ( $key )
		{
			$this->_predis->hlen( $key );
		}


		public function incrementMapValue ( $key, $field, $by = 1 )
		{
			$this->_predis->hincrby( $key, $field, $by );
		}


		public function removeMapField ( $key, $field )
		{
			$this->_predis->hget( $key, $field );
		}


		public function getMapFieldLength ( $key, $field )
		{
			$this->_predis->hstrlen( $key, $field );
		}


		public function getSet ( $key )
		{
			$this->_predis->smembers( $key );
		}


		public function addToSet ( $key, $value )
		{
			$this->_predis->sadd ( $key, $value );
		}


		public function isInSet ( $key, $value )
		{
			$this->_predis->sismember( $key, $value );
		}


		public function removeFromSet ( $key, $value )
		{
			$this->_predis->srem( $key, $value );
		}


		public function getSetLength ( $key )
		{
			$this->_predis->scard( $key );
		}


		public function addToSortedSet ( $key, $value )
		{
			$this->_predis->zadd ( $key, $value );
		}


		public function removeFromSortedSet ( $key, $value )
		{
			$this->_predis->zrem( $key, $value );
		}


		public function getSortedSetLength ( $key )
		{
			$this->_predis->zcard( $key );
		}		

	}
	
?>