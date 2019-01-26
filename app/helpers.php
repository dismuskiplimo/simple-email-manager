<?php

	function calculateSize($bytes){
		if($bytes >= 0 && $bytes < 1024){
			return $bytes . ' B';
		}elseif($bytes < 1024 * 1024){
			return ceil($bytes / 1024) . ' KB';
		}elseif($bytes < 1024 * 1024 * 1024){
			return ceil($bytes / (1024 * 1024)) . ' MB';
		}elseif($bytes < 1024 * 1024 * 1024 * 1024){
			return ceil($bytes / (1024 * 1024 * 1024)) . ' GB';
		}elseif($bytes >= 1024 * 1024 * 1024 * 1024 * 1024){
			return number_format(ceil($bytes / (1024 * 1024 * 1024 * 1024))) . ' TB';
		}
	}