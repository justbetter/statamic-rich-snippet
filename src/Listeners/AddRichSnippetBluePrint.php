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

namespace OptimoApps\RichSnippet\Listeners;

use OptimoApps\RichSnippet\SchemaTypeEnum;
use Statamic\Events\EntryBlueprintFound;

class AddRichSnippetBluePrint
{
    public function handle(EntryBlueprintFound $event): void
    {
        if (! is_null($event->entry)) {
            //to enable rich snippet
            $event->blueprint->ensureField('is_rich_snippet', [
                'type' => 'toggle',
                'display' => 'Is Rich Snippet?',
                'default' => 'true',
                'instructions' => 'Enable / Disable Rich Snippet',
            ], 'Schema.org');

            //select type
            $event->blueprint->ensureField('schema_type', [
                'type' => 'select',
                'display' => 'Select Type',
                'placeholder' => 'Choose Schema Type',
                'options' => [
                    SchemaTypeEnum::ARTICLE => 'Article',
                    SchemaTypeEnum::BLOG_POSTING => 'Blog Posting',
                    SchemaTypeEnum::NEWS_ARTICLE => 'News Article',
                    SchemaTypeEnum::JOB_POSTING => 'Job Posting',
                ],
            ], 'Schema.org');

            /*
             * Article Schema FieldType
             */
            $event->blueprint->ensureField('article_schema', ['type' => 'article_schema', 'listable' => false, 'if' => [
                'schema_type' => 'equals Article',
            ]], __('Schema.org'));

            /*
             *  BlogPosting Schema FieldType
             */
            $event->blueprint->ensureField('blog_schema', ['type' => 'blog_schema', 'listable' => false, 'if' => [
                'schema_type' => 'equals BlogPosting',
            ]], __('Schema.org'));

            /*
             *  NewsArticle Schema FieldType
             */
            $event->blueprint->ensureField('news_schema', ['type' => 'news_schema', 'listable' => false, 'if' => [
                'schema_type' => 'equals NewsArticle',
            ]], __('Schema.org'));

            /*
             *  NewsArticle Schema FieldType
             */
            $event->blueprint->ensureField('job_posting', ['type' => 'job_posting', 'listable' => false, 'if' => [
                'schema_type' => 'equals JobPosting',
            ]], __('Schema.org'));
        }
    }
}
