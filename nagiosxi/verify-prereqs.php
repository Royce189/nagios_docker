<?php ?><?php // Copyright (c) 2008-2024 Nagios Enterprises, LLC.  All rights reserved. ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
