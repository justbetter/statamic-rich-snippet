<?php
/*
 * *
 *  *  * Copyright (C) OptimoApps - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <info@optimoapps.com>
 *  *
 *
 */

namespace OptimoApps\RichSnippet\Tags;

class SchemaJsonLdTags extends AbstractTags
{
    protected static $handle = 'schema_json';

    public function index()
    {
        return view('statamic-rich-snippet::schema', [
            'webpage_schema' => $this->getWebPageSchema(),
            'articles_schema' => $this->getArticleSchema(),
            'blogpost_schema' => $this->getBlogPostSchema(),
            'news_article_schema' => $this->getNewsArticleSchema(),
            'organization_schema' => $this->getOrganizationSchema(),
            'job_posting' => $this->getJobPostingSchema(),
        ]);
    }
}
