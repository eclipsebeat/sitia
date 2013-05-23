<?php
/**
 * @author freaksmj
 * based on RAKE Algorithm - Text Mining Applications and Theory,Michael W. Berry & Jacob Cogan
 */
include_once('../config/class.database.php');

class Autokeyword{

	function candidateWords($text, $stopwords) {
	 
	  // Remove line breaks and spaces from stopwords
	  $stopwords = array_map(function($x){return trim(strtolower($x));}, $stopwords);
	 
	  // Replace all whitespace with underscore and remove the last char
	  $text = preg_replace('/\s+/', '_', $text);
	  $text = substr_replace($text, "", -1);
	   
	  // Create an array from $text
	  $text_array = explode("_",$text);
	 
	  // Remove whitespace and lowercase words in $text
	  $text_array = array_map(function($x){return trim(strtolower($x));}, $text_array);
	 
	  // Remove stopwords
	  foreach ($text_array as $term) {
		$term = preg_replace('/[0-9\W]/', '-', $term); //angka d hilangin ??
		if (!in_array($term, $stopwords)) {
		  $keywords[] = $term;
		}else{
		  $keywords[] = '-';
		}
	  };
	  
	  // Sort out the result
	  $text2 = implode(' ', array_filter($keywords));
	  $arr = explode("-",$text2);
	  $arr = array_map(function($x){return trim($x);}, $arr);
	  return $arr;
	}

	function freqWords($text, $stopwords) {
	 
	  // Remove line breaks and spaces from stopwords
	  $stopwords = array_map(function($x){return trim(strtolower($x));}, $stopwords);
	 
	  // Replace all whitespace with underscore and remove the last char
	  $text = preg_replace('/\s+/', '_', $text);
	  $text = substr_replace($text, "", -1);
	   
	  // Create an array from $text
	  $text_array = explode("_",$text);
	 
	  // Remove whitespace and lowercase words in $text
	  $text_array = array_map(function($x){return trim(strtolower($x));}, $text_array);
	 
	  // Remove stopwords
	  foreach ($text_array as $term) {
		$term = preg_replace('/[0-9\W]/', '', $term);
		if (!in_array($term, $stopwords)) {
		  $matchWords[] = $term;
		}
	  };
	  
	  // Score word frequency
	  $wordCountArr = array();
		  if ( is_array($matchWords) ) {
			  foreach ( $matchWords as $key => $val ) {
				  if ( isset($wordCountArr[$val]) ) {
					  $wordCountArr[$val]++;
				  } else {
					  $wordCountArr[$val] = 1;
				  }
			  }
		  }
		
		arsort($wordCountArr); // Sort descending
		return $wordCountArr;
	}

	function degWords($text, $stopwords){
		$candidate = $this->candidateWords($text, $stopwords);
		$freq = $this->freqWords($text, $stopwords);
		
		$deq = $freq;
		foreach($freq as $keyFreq => $valFreq){	
			$count = 0;
			foreach($candidate as $keyCand => $valCand){	
				if(stristr($valCand, $keyFreq)){
					$count = $count + substr_count($valCand, ' ');//'inequations' di baca equations 
				}
			}
			$deg[$keyFreq] = $valFreq + $count;
		}
		
		return $deg;
	}

	function ratioWords($text, $stopwords){
	  $freq = $this->freqWords($text, $stopwords);
	  $deg = $this->degWords($text, $stopwords);
	  $result = array_map(function($freq, $deg){return round(($deg/$freq),1);}, $freq, $deg);
	  
	  $key = array_keys($freq);
	  $val = array_values($result);
	  $ratio = array_combine($key, $val);
	  
	  return $ratio;
	}

	function sumRatio($text, $stopwords){
		$candidate = $this->candidateWords($text, $stopwords);
		$ratio = $this->ratioWords($text, $stopwords);
		
		$sumTemp = $candidate;
		foreach($candidate as $keyCand => $valCand){
			$count = 0;
			$candEach = explode(" ",$valCand);
			foreach($candEach as $k => $v){
				foreach($ratio as $keyRat => $valRat){
					if($v == $keyRat){
						$count = $count + $valRat;
					}
				}
			}
			$sumTemp[$keyCand] = $count;
		}
		$keySum = array_values($candidate);
		$valSum = array_values($sumTemp);
		$sum = array_combine($keySum, $valSum);
		arsort($sum);
		$amount=round(count($sum)/3);
		$sum = array_slice($sum, 0,$amount ); // Atur jumlah output
		return $sum;

	}

	function getKeywords($text, $stopwords){
		$sum = $this->sumRatio($text, $stopwords);
		$kw = array();
			foreach($sum as $key => $value){
				$kw[]=$key;
			}
			$keywords=implode(", ",$kw);
			return $keywords;
	}
	}



?>