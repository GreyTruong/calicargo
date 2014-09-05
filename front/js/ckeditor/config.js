/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {
    //console.log(contextPath);

    config.filebrowserBrowseUrl = baseUrl+'js/kcfinder/browse.php?lang=en';
    config.filebrowserImageBrowseUrl = baseUrl+'js/kcfinder/browse.php?lang=en&type=image';
    config.filebrowserFlashBrowseUrl = baseUrl+'js/kcfinder/browse.php?lang=en&type=flash';
};
