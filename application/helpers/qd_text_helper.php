<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('qd_html_truncate'))
{
    /**
     * qd_html_truncate()
     * 
     * @param string $text String to truncate.
     * @param integer $length Length of returned string, including ellipsis.
     * @param string $ending Ending to be appended to the trimmed string.
     * @param boolean $exact If false, $text will not be cut mid-word
     * @param boolean $considerHtml If true, HTML tags would be handled correctly
     * @return string Trimmed string.
     */
    function qd_html_truncate($text='', $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
    	if ($considerHtml) {
    		// if the plain text is shorter than the maximum length, return the whole text
    		if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
    			return $text;
    		}
    		// splits all html-tags to scanable lines
    		preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
    		$total_length = strlen($ending);
    		$open_tags = array();
    		$truncate = '';
    		foreach ($lines as $line_matchings) {
    			// if there is any html-tag in this line, handle it and add it (uncounted) to the output
    			if (!empty($line_matchings[1])) {
    				// if it's an "empty element" with or without xhtml-conform closing slash
    				if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
    					// do nothing
    				// if tag is a closing tag
    				} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
    					// delete tag from $open_tags list
    					$pos = array_search($tag_matchings[1], $open_tags);
    					if ($pos !== false) {
    					unset($open_tags[$pos]);
    					}
    				// if tag is an opening tag
    				} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
    					// add tag to the beginning of $open_tags list
    					array_unshift($open_tags, strtolower($tag_matchings[1]));
    				}
    				// add html-tag to $truncate'd text
    				$truncate .= $line_matchings[1];
    			}
    			// calculate the length of the plain text part of the line; handle entities as one character
    			$content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
    			if ($total_length+$content_length> $length) {
    				// the number of characters which are left
    				$left = $length - $total_length;
    				$entities_length = 0;
    				// search for html entities
    				if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
    					// calculate the real length of all entities in the legal range
    					foreach ($entities[0] as $entity) {
    						if ($entity[1]+1-$entities_length <= $left) {
    							$left--;
    							$entities_length += strlen($entity[0]);
    						} else {
    							// no more characters left
    							break;
    						}
    					}
    				}
    				$truncate .= substr($line_matchings[2], 0, $left+$entities_length);
    				// maximum lenght is reached, so get off the loop
    				break;
    			} else {
    				$truncate .= $line_matchings[2];
    				$total_length += $content_length;
    			}
    			// if the maximum length is reached, get off the loop
    			if($total_length>= $length) {
    				break;
    			}
    		}
    	} else {
    		if (strlen($text) <= $length) {
    			return $text;
    		} else {
    			$truncate = substr($text, 0, $length - strlen($ending));
    		}
    	}
    	// if the words shouldn't be cut in the middle...
    	if (!$exact) {
    		// ...search the last occurance of a space...
    		$spacepos = strrpos($truncate, ' ');
    		if (isset($spacepos)) {
    			// ...and cut the text in this position
    			$truncate = substr($truncate, 0, $spacepos);
    		}
    	}
    	// add the defined ending to the text
    	$truncate .= $ending;
    	if($considerHtml) {
    		// close all unclosed html-tags
    		foreach ($open_tags as $tag) {
    			$truncate .= '</' . $tag . '>';
    		}
    	}
    	return $truncate;
    }
}

if ( ! function_exists('qd_locdautiengviet'))
{
    
    /**
     * qd_locdautiengviet()
     * 
     * @param string $text
     * @param string $space_char_replace
     * @return
     */
    function qd_locdautiengviet($str='', $space_char_replace='-') {
    	
        $cs=trim($str);
        
        $marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
        "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
        ,"ế","ệ","ể","ễ",
        "ì","í","ị","ỉ","ĩ",
        "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
        ,"ờ","ớ","ợ","ở","ỡ",
        "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
        "ỳ","ý","ỵ","ỷ","ỹ",
        "đ",
        "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
        ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
        "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
        "Ì","Í","Ị","Ỉ","Ĩ",
        "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
        ,"Ờ","Ớ","Ợ","Ở","Ỡ",
        "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
        "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
        "Đ");
        
        $marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
        ,"a","a","a","a","a","a",
        "e","e","e","e","e","e","e","e","e","e","e",
        "i","i","i","i","i",
        "o","o","o","o","o","o","o","o","o","o","o","o"
        ,"o","o","o","o","o",
        "u","u","u","u","u","u","u","u","u","u","u",
        "y","y","y","y","y",
        "d",
        "A","A","A","A","A","A","A","A","A","A","A","A"
        ,"A","A","A","A","A",
        "E","E","E","E","E","E","E","E","E","E","E",
        "I","I","I","I","I",
        "O","O","O","O","O","O","O","O","O","O","O","O"
        ,"O","O","O","O","O",
        "U","U","U","U","U","U","U","U","U","U","U",
        "Y","Y","Y","Y","Y",
        "D");
        //lọc bỏ dấu tiếng việt unicode
        $cs = str_replace($marTViet,$marKoDau,$cs);
        //lọc bỏ khoảng trắng trùng lặp
        while(strpos($cs,'  ')!=false)
        {
            $cs = str_replace('  ',' ',$cs);
        }
        //thay thế khoảng trắng
        $cs = str_replace(' ',$space_char_replace,$cs);
        //chỉ giữ lại những ký tự cho phép
        $cs = preg_replace("/[^a-zA-Z0-9\\-]/i","",$cs);
        
        return $cs;
        
    }
    function qd_random_string($length = 10) {
        $characters = '23456789ABCDEFGHJKMNPRSTUWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    function qd_random_number($length = 1) {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}