/**
------------------------------------------------------------------
A Small library to tell if the passed value is _really_ empty.
------------------------------------------------------------------
MIT License

Copyright (c) 2019 Alfred Dagenais

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
------------------------------------------------------------------

*/

function isEmpty( $sString = '' ){
		
	// null
	if( $sString === NULL || is_null($sString) ){ return TRUE; }

	// bools
	if( is_bool($sString) ){ return FALSE; }

	// nan
	if( is_nan($sString) ){ return TRUE; }

	// float
	if( is_float($sString) ){ return FALSE; }

	// integer
	if( is_int($sString) ){ return FALSE; }

	// other numeric elements
	if( is_numeric($sString) ){ return FALSE; }

	// resources
	if( is_resource($sString) ){ return FALSE; }

	// strings
	if( is_string($sString) ){ return !strlen( trim($sString) ); }

	// arrays
	if( is_array($sString) && count($sString) == 0 ){ return FALSE; }

	// objects
	if( is_object($sString) ){

		$oReflectionClass = new \ReflectionClass( $sString );
		if( $oReflectionClass->isInstantiable() === TRUE ){

			$aClassMethods = get_class_methods( $sString );
			if( is_array($aClassMethods) && count($aClassMethods) > 0 ){
				return FALSE;
			}

			$aClassVars = get_class_vars(get_class($sString));
			if( is_array($aClassVars) && count($aClassVars) > 0 ){
				return FALSE;
			}

		}

		$aArray = (array)$sString; // work in PHP 5.4
		if (empty($aArray)) { return TRUE; }

	}

	// functions and methods
	if( is_callable($sString) ){ return FALSE; }

	return TRUE;
}