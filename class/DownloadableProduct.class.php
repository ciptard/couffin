<?php
/*                                                                              
    Couffin - A simple PHP shopping basket.                                    
	http://auberger.com/couffin
                                                                                                                                                           
	(c) Copyright 2005-2011 Georges Auberger
	All Rights Reserved

	Permission is hereby granted, free of charge, to any person
	obtaining a copy of this software and associated documentation
	files (the "Software"), to deal in the Software without
	restriction, including without limitation the rights to use,
	copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the
	Software is furnished to do so, subject to the following
	conditions:

	The above copyright notice and this permission notice shall be
	included in all copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
	EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
	OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
	NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
	HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
	WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
	FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
	OTHER DEALINGS IN THE SOFTWARE.                                 
*/

class DownloadableProduct extends Product {
	var $secureAssets = array();

	function DownloadableProduct($name, $url, $img, $price, $weight, $description, $secureAssets) {
		$this->secureAssets = $secureAssets;
		$this->Product($name, $url, $img, $price, $weight, $description);
	}
	
	function getTotalFileSizeMB() {
		$totalSize = 0;
		foreach ($this->secureAssets as $id => $secureAsset) {
			$totalSize = $totalSize + $secureAsset->getFileSizeMB();
		}
		return $totalSize;
	}
	
	function getName() {
		return ($this->name . " (" . $this->getTotalFileSizeMB() . " MB)");
	}
}
?>