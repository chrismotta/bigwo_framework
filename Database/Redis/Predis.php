<?php

	namespace Aff\Framework\Database\Redis;

	use Aff\Framework;
	require_once( '..'.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'autoload.php');

	class Predis extends Framework\ObjectAbstract implements Framework\Database\KeyValueInterface
	{

		private $_predis;


		public function __construct ( $params, $options = null )
		{
			$this->_predis = new \Predis\Client( $params, $options );
		}


		public function set ( $key, $value, array $params = null )
		{
			$this->_predis->set( $key, $value );
		}


		public function get ( $key )
		{
			return $this->_predis->get( $key );
		}


		public function exists ( $key )
		{
			return $this->_predis->exists( $key );
		}		


		public function increment ( $key, $val = null )
		{
			if ( $val )
				$this->_predis->incrby( $key, $val );
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
		}


		public function ttl ( $key, $seconds = null )
		{
		}		


		public function flush ( )
		{
		}

	}
	
?>