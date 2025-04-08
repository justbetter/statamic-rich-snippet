<?php
/*
 * *
 *  *  * Copyright (C) optimoapps.com - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>, ManiKandan<smanikandanit@gmail.com >
 *  *
 *
 */

use Statamic\Facades\Markdown;

/*
 *  Generate HTML from content
 */
if (! function_exists('generateHtml')) {
  function generateHtml($content)
  {
    $content = $content ?: [];

    if (is_array($content)) {
      return  (new \Tiptap\Editor)->setContent([
        'type' => 'doc',
        'content' => $content,
      ])->getHTML();
    }

    if (Markdown::hasParser($content)) {
      return Markdown::parser($content);
    }

    return $content;
  }
}
