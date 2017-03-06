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


		public function getFromListByRange ( $key, $start = 0, $end = -1 )
		{
			return $this->_predis->lrange( $key, $start, $end );
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
		}

	}
	
?>