#!/usr/bin/php -q
<?php ?><?php // Copyright (c) 2008-2024 Nagios Enterprises, LLC.  All rights reserved. ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
