<?php

/** This file is part of KCFinder project
  *
  *      @desc Base configuration file
  *   @package KCFinder
  *   @version 2.51
  *    @author Pavel Tzonkov <pavelc@users.sourceforge.net>
  * @copyright 2010, 2011 KCFinder Project
  *   @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
  *   @license http://www.opensource.org/licenses/lgpl-2.1.php LGPLv2
  *      @link http://kcfinder.sunhater.com
  */

// IMPORTANT!!! Do not remove uncommented settings in this file even if
// you are using session configuration.
// See http://kcfinder.sunhater.com/install for setting descriptions


$_CONFIG = array(

    'disabled' => true,
    'denyZipDownload' => false,
    'denyUpdateCheck' => false,
    'denyExtensionRename' => false,

    'theme' => "oxygen",

    'uploadURL' => "/uploads",
    'uploadDir' => "../../../uploads",

    'dirPerms' => 0755,
    'filePerms' => 0644,

    'access' => array(

        'files' => array(
            'upload' => false,
            'delete' => false,
            'copy' => false,
            'move' => false,
            'rename' => false
        ),

        'dirs' => array(
            'create' => false,
            'delete' => false,
            'rename' => false
        )
    ),

    'deniedExts' => "exe com msi bat php phps phtml php3 php4 cgi pl tpl ch chm htm html xhtml",

    'types' => array(
        // CKEditor & FCKEditor types
        'wap'       =>  array(
                            'type' => "*img",
                            'thumbWidth' => 100,
                            'thumbHeight' => 100,
                            'maxImageWidth' => 480,
                            'maxImageHeight' => 480
                        ),
        'image'    =>  "bmp gif jpeg jpg png ico webp *.webp image/webp",
        'mimages'   =>  "*mime image/gif image/png image/jpeg",
        'notimages' =>  "*mime ! image/gif image/png image/jpeg",
        'flash'   =>  "swf",
        // TinyMCE types
        'media'   =>  "swf flv avi mpg mpeg qt mov wmv asf rm",
        'file'	  =>  '',	
    ),

    'filenameChangeChars' => array(
        ' ' => "_",
        ':' => "."
    ),

    'dirnameChangeChars' => array(
        ' ' => "_",
        ':' => "."
    ),

    'mime_magic' => "",

    'maxImageWidth' => 800,
    'maxImageHeight' => 800,

    'thumbWidth' => 120,
    'thumbHeight' => 120,

    'thumbsDir' => "thumbs",

    'jpegQuality' => 90,

    'cookieDomain' => "",
    'cookiePath' => "",
    'cookiePrefix' => 'KCFINDER_',

    // THE FOLLOWING SETTINGS CANNOT BE OVERRIDED WITH SESSION CONFIGURATION
    '_check4htaccess' => true,
    '_tinyMCEPath' => "../tiny_mce",

    '_sessionVar' => &$_SESSION['KCFINDER'],
    '_sessionLifetime' => 30,
    //'_sessionDir' => "/full/directory/path",

    //'_sessionDomain' => ".mysite.com",
    //'_sessionPath' => "/my/path",
    'swap_thumb_width' => 600,
    'swap_thumb_height' => 400,
    'swap_thumb_quality' => 80,
    'swap_thumb_dir' => 'mobilethumbs',
);

?>