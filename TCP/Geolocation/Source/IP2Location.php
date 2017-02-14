<?php

	namespace Aff\Framework\TCP\Geolocation\Source;
	
	use Aff\Framework,
		Aff\Framework\TCP\Geolocation;


	class IP2Location extends Framework\ObjectAbstract implements Geolocation\SourceInterface
	{

		private $_db;
		private $_data;


		public function __construct( $path )
		{
			parent::__construct();

			$this->_db = new \IP2Location\Database( $path, \IP2Location\Database::FILE_IO );
		}


		public function detect ( $ip, array $params = null )
		{

			$this->_data = $this->_db->lookup( 
				$ip, 
				array(
					\IP2Location::CARRIER,
					\IP2Location::COUNTRY
				)
			);

		}


		public function getCountryCode ( )
		{
			return $this->_data['countryCode'];
		}


		public function getMobileCarrier ( )
		{
			return $this->_data['mobileCarrierName'];
		}


		public function getIpNumber ( )
		{

		}


		public function getIpVersion ( )
		{

		}


		public function getCountryName ( )
		{

		}


		public function getRegionName ( )
		{

		}


		public function getCityName ( )
		{

		}


		public function getLatitude ( )
		{

		}


		public function getLongitude ( )
		{

		}


		public function getAreaCode ( )
		{

		}


		public function getIDDCode ( )
		{

		}


		public function getWheatherStationCode ( )
		{

		}


		public function getWheatherStationName ( )
		{

		}


		public function getMCC ( )
		{

		}


		public function getMNC ( )
		{

		}


		public function getUsageType ( )
		{

		}


		public function getElevation ( )
		{

		}


		public function getNetworkSpeed ( )
		{

		}


		public function getTimezone ( )
		{

		}


		public function getZipCode ( )
		{

		}


		public function getDomainName ( )
		{

		}


		public function getISPName ( )
		{

		}


	}

?>