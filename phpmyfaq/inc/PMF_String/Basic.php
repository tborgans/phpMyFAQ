<?php
/**
 * The string wrapper class using mbstring extension. 
 *
 * @package    phpMyFAQ
 * @subpackage PMF_StringBasic
 * @license    MPL
 * @author     Anatoliy Belsky <ab@php.net>
 * @since      2009-04-06
 * @copyright  2004-2009 phpMyFAQ Team
 * @version    SVN: $Id: Basic.php,v 1.56 2008-01-26 01:02:56 thorstenr Exp $
 *
 * The contents of this file are subject to the Mozilla Public License
 * Version 1.1 (the "License"); you may not use this file except in
 * compliance with the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/
 *
 * Software distributed under the License is distributed on an "AS IS"
 * basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
 * License for the specific language governing rights and limitations
 * under the License.
 */

/**
 * PMF_StringBasic
 *
 * @package    phpMyFAQ
 * @subpackage PMF_StringBasic
 * @license    MPL
 * @author     Anatoliy Belsky <ab@php.net>
 * @since      2009-04-06
 * @copyright  2004-2009 phpMyFAQ Team
 * @version    SVN: $Id: Basic.php,v 1.56 2008-01-26 01:02:56 thorstenr Exp $
 */
class PMF_String_Basic
{
    /**
     * Instance
     * @var object
     */
    private static $instance;
    
    /**
     * Default encoding
     * @var string
     */
    const DEFAULT_ENCODING = 'iso-8859-1';
    
    /**
     * Encoding
     * @var unknown_type
     */
    private $encoding = self::DEFAULT_ENCODING;

    
    private final function __construct(){}
    private final function __clone(){}
 
    
    /**
     * Create and return an instance
     * @return object
     */
    public static function getInstance($encoding = null)
    {
        if(!self::$instance) {
       	    self::$instance = new self;
       	    self::$instance->encoding = null == $encoding ? self::DEFAULT_ENCODING : $encoding;
        }
       
        return self::$instance;
    }
    
    
    /**
     * Get string character count
     * 
     * @param string $str
     * 
     * @return int
     */
    public function strlen($str)
    {
        return strlen($str);
    }
    
    
    /**
     * Get a part of string
     * 
     * @param string $str
     * @param int $start
     * @param int $length
     * 
     * @return string
     */
    public function substr($str, $start, $length = null)
    {
    	$length = null == $length ? strlen($str) : $length;
    	
        return substr($str, $start, $length);
    }
    
    
    /**
     * Get current encoding
     * @return string
     */
    public function getEncoding()
    {
    	return $this->encoding;
    }
    

    /**
	 * Get position of the first occurence of a string
	 * @param string $haystack
	 * @param string $needle
	 * @param string $offset
	 * 
	 * @return int
     */
    public static function strpos($haystack, $needle, $offset = null)
    {
    	return strpos($haystack, $needle, (int) $offset, $this->encoding);
    }
    
    
    /**
	 * Make a string lower case
	 * @param string $str
	 * 
	 * @return string
     */
    public static function strtolower($str)
    {
    	return strtolower($str);
    }
    
    
    /**
	 * Make a string upper case
	 * @param string $str
	 * 
	 * @return string
     */
    public static function strtoupper($str)
    {
    	return strtoupper($str);
    }
    
    
    /**
	 * Get occurence of a string within another
	 * @param string $haystack
	 * @param string $needle
	 * @param boolean $part
	 * 
	 * @return string|false
     */
    public static function strstr($haystack, $needle, $part = false)
    {
    	return strstr($haystack, $needle, (boolean) $part);
    }
    
    
    /**
     * Set current encoding
     * @return string
     */
    public function setEncoding($encoding)
    {
    	$this->encoding = $encoding;
    }
}