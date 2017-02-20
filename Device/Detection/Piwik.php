<?php

	namespace Aff\Framework\Device\Detection;

	use Aff\Framework;

	use DeviceDetector\DeviceDetector,
	       DeviceDetector\Parser\Device\DeviceParserAbstract;	

	class Piwik extends Framework\ObjectAbstract implements Framework\Device\DetectionInterface
	{

                private $_pwk;
                private $_os;
                private $_cl;


        	public function __construct ( )
        	{
        		parent::__construct( );

        		$this->_pwk = new DeviceDetector();
        	} 


                public function detect ( $userAgent, array $params = null )
                {
                        $this->_pwk->setUserAgent( $userAgent );
                	$this->_pwk->parse();

			$this->_os = $this->_pwk->getOs();
			$this->_cl = $this->_pwk->getClient();
                }


                public function getType ( )
                {
                	return $this->_pwk->getDeviceName();
                }


                public function getBrand ( )
                {
                	return $this->_pwk->getBrandName();
                }


                public function getModel ( )
                {
                	return $this->_pwk->getModel();
                }


                public function getOS ( )
                {
                	return $this->_os['name'];
                }


                public function getOSVersion ( )
                {
                	return $this->_os['version'];
                }


                public function getBrowser ( )
                {
                	return $this->_cl['name'];
                }


                public function getBrowserVersion ( )
                {
                	return $this->_cl['version'] ;
                }

	}

?>