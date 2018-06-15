<?php

namespace RaccoonMUFramework;

/**
 * Include theme partial and prints the content.
 * If template is not present, function will fail silently, displaying error in the debug.log.
 *
 * @param $filename
 * @param $data array Data array passed to the theme partial.
 * @param $return boolean Returns template in place or just echoes it.
 * @return string
 */
function include_theme_partial($filename, $data = [], $return = false)
{
    $template = get_theme_partial($filename, $data);

    if ($template) {

        if ($return) {
            return $template;
        }

        echo $template;
    }
}

/**
 * Get theme partial.
 *
 * @param $filename string
 * @param $data array Data array passed to the theme partial.
 * @return bool|string
 */
function get_theme_partial($filename, $data)
{
    $filename = get_template_directory() . $filename;

    if (is_file($filename)) {
        if (is_array($data)) {
            extract($data); // Make each key accessible as variable inside the partial file.
        }
        ob_start();
        include $filename;
        $content = ob_get_clean();

        return $content;
    }
    \error_log('Template "' . $filename . '" could not be found.');

    return false;
}