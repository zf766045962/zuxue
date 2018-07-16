<?php 
//	实例1、解析 XML 文件
//	
//	$file = 'test.xml';
//	require_once('deXmlParser.php');
//	$xml = new deXmlParser();
//	$xml->parseFile($file);
//	$tree = $xml->getTree();
//	unset($xml);
//	print "<pre>";
//	print_r($tree);
//	print "</pre>";
//	
//	
//	实例2、解析 XML 字符串
//
//	$str = "XML字符串";
//	require_once('deXmlParser.php');
//	$xml = new deXmlParser();
//	$xml->parseString($str);
//	$tree = $xml->getTree();
//	unset($xml);
//	print "<pre>";
//	print_r($tree);
//	print "</pre>";
error_reporting(0);
class xmlParse
{ 
	var $parser;
	var $srcenc;
	var $dstenc;
	var $_struct = array();
	function deXmlParser($srcenc = null, $dstenc = null)
	{ 
		$this->srcenc = $srcenc; 
		$this->dstenc = $dstenc; 
		$this->parser = null; 
		$this->_struct = array(); 
	}
	function free()
	{
		if (isset($this->parser) && is_resource($this->parser))
		{ 
			xml_parser_free($this->parser); 
			unset($this->parser); 
		} 
	}
	function parseFile($file)
	{ 
		$data = @file_get_contents($file) or die("Can't open file $file for reading!"); 
		$this->parseString($data); 
	} 
	function parseString($data)
	{
		if ($this->srcenc === null)
		{
			$this->parser = @xml_parser_create() or die('Unable to create XML parser resource.'); 
		}
		else
		{ 
			$this->parser = @xml_parser_create($this->srcenc) or die('Unable to create XML parser resource with '. $this->srcenc .' encoding.'); 
		} 
		if ($this->dstenc !== null)
		{ 
			@xml_parser_set_option($this->parser, XML_OPTION_TARGET_ENCODING, $this->dstenc) or die('Invalid target encoding'); 
		} 
		xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, 0); // lowercase tags 
		xml_parser_set_option($this->parser, XML_OPTION_SKIP_WHITE, 1); // skip empty tags 
		if (!xml_parse_into_struct($this->parser, $data, &$this->_struct))
		{ 
			printf("XML error: %s at line %d",xml_error_string(xml_get_error_code($this->parser)),xml_get_current_line_number($this->parser)); 
			$this->free(); 
			exit(); 
		}
		$this->_count = count($this->_struct); 
		$this->free(); 
	}
	function getTree()
	{ 
		$i = 0; 
		$tree = array();
		$tree = $this->addNode( 
		$tree, 
		$this->_struct[$i]['tag'], 
		(isset($this->_struct[$i]['value'])) ? $this->_struct[$i]['value'] : '', 
		(isset($this->_struct[$i]['attributes'])) ? $this->_struct[$i]['attributes'] : '', 
		$this->getChild($i) 
		);
		unset($this->_struct); 
		return ($tree); 
	} 
	function getChild(&$i)
	{ 
		// contain node data 
		$children = array();
		// loop 
		while (++$i < $this->_count)
		{ 
			// node tag name 
			$tagname = $this->_struct[$i]['tag']; 
			$value = isset($this->_struct[$i]['value']) ? $this->_struct[$i]['value'] : ''; 
			$attributes = isset($this->_struct[$i]['attributes']) ? $this->_struct[$i]['attributes'] : '';
			switch ($this->_struct[$i]['type'])
			{ 
				case 'open': 
				// node has more children 
				$child = $this->getChild($i); 
				// append the children data to the current node 
				$children = $this->addNode($children, $tagname, $value, $attributes, $child); 
				break; 
				case 'complete': 
				// at end of current branch 
				$children = $this->addNode($children, $tagname, $value, $attributes); 
				break; 
				case 'cdata': 
				// node has CDATA after one of it's children 
				$children['value'] .= $value; 
				break; 
				case 'close': 
				// end of node, return collected data 
				return $children; 
				break; 
			} 
		} 
		//return $children; 
	}
	function addNode($target, $key, $value = '', $attributes = '', $child = '')
	{ 
		if (!isset($target[$key]['value']) && !isset($target[$key][0]))
		{ 
			if ($child != '')
			{ 
				$target[$key] = $child; 
			} 
			if ($attributes != '')
			{ 
				foreach ($attributes as $k => $v)
				{ 
				$target[$key][$k] = $v; 
				} 
			} 
			$target[$key]['value'] = $value; 
		}
		else
		{ 
			if (!isset($target[$key][0]))
			{ 
				// is string or other 
				$oldvalue = $target[$key]; 
				$target[$key] = array(); 
				$target[$key][0] = $oldvalue; 
				$index = 1; 
			}
			else
			{ 
			// is array 
				$index = count($target[$key]); 
			}
			if ($child != '')
			{ 
				$target[$key][$index] = $child; 
			}
			if ($attributes != '')
			{ 
				foreach ($attributes as $k => $v)
				{ 
					$target[$key][$index][$k] = $v; 
				} 
			} 
			$target[$key][$index]['value'] = $value; 
		} 
		return $target; 
	}
}	



