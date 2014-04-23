<?php
/**
 * Plugin settings for CKEditor Extended
 *
 * @uses $vars['entity'] the plugin entity
 */

$plugin = elgg_extract("entity", $vars);


$editor_config = $plugin->editor_config;
if (empty($editor_config)) {
	$editor_config = <<<JS
toolbar: [['Bold', 'Italic', 'Underline'], ['Strike', 'NumberedList', 'BulletedList', 'Undo', 'Redo', 'Link', 'Unlink', 'Image', 'Blockquote', 'Paste', 'PasteFromWord', 'Maximize']],
removeButtons: 'Subscript,Superscript', // To have Underline back
allowedContent: true,
baseHref: elgg.config.wwwroot,
removePlugins: 'contextmenu,tabletools,resize',
defaultLanguage: 'en',
language: elgg.config.language,
skin: 'moono',
uiColor: '#EEEEEE',
contentsCss: elgg.get_simplecache_url('css', 'elgg/wysiwyg.css'),
disableNativeSpellChecker: false,
disableNativeTableHandles: false,
removeDialogTabs: 'image:advanced;image:Link;link:advanced;link:target',
autoGrow_maxHeight: $(window).height() - 100,
JS;
}

echo "<div>";
echo elgg_echo("ckeditor:settings:editor_config");
echo elgg_view("input/plaintext", array("name" => "params[editor_config]", "value" => $editor_config));
echo "<div class='elgg-subtext'>" . elgg_view("output/url", array("href" => "http://docs.ckeditor.com/#!/api/CKEDITOR.config", "text" => elgg_echo("ckeditor:settings:link"), "target" => "_blank"));
echo "</div>";