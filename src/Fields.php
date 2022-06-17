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

namespace OptimoApps\RichSnippet;

use Statamic\Entries\Entry;
use Statamic\Support\Str;

/**
 * Class Fields.
 */
class Fields
{
    /**
     * @param Entry $entry
     * @return array[]
     */
    public static function getBlogPostFields(Entry $entry): array
    {
        return self::getArticleSchemaFields($entry);
    }

    /**
     * @param Entry $entry
     * @return array[]
     */
    public static function getNewsArticleFields(Entry $entry = null): array
    {
        return [
            [
                'handle' => 'headline',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.news.headline'),
                    'default' => is_null($entry) ? '' : $entry->data()->get('title'),
                ],
            ],
            [
                'handle' => 'description',
                'field' => [
                    'type' => 'textarea',
                    'display' => __('statamic-rich-snippet::fieldtypes.news.description'),
                    'default' => is_null($entry) ? '' : strip_tags(Str::limit(generateHtml($entry->data()->get('content')), 200)),
                ],
            ],
            [
                'handle' => 'url',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.news.url'),
                    'default' => is_null($entry) ? '' : $entry->absoluteUrl(),
                ],
            ],
            [
                'handle' => 'image',
                'field' => [
                    'type' => 'assets',
                    'container'=> 'assets',
                    'max_files' => 3,
                    'display' => __('statamic-rich-snippet::fieldtypes.news.image'),
                    'instructions' => __('statamic-rich-snippet::fieldtypes.news.image_instruct'),

                ],
            ],

            [
                'handle' => 'datePublished',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.news.date_published'),
                    'default' => is_null($entry) ? now()->format('Y-m-d') : $entry->date()->format('Y-m-d'),
                    'read_only' => true,
                ],
            ],
            [
                'handle' => 'dateModified',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.news.date_modified'),
                    'default' => is_null($entry) ? now()->format('Y-m-d') : $entry->lastModified()->format('Y-m-d'),
                    'read_only' => true,
                ],
            ],
            [
                'handle' => 'author',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.news.author'),
                    'placeholder' => __('statamic-rich-snippet::fieldtypes.news.author_placeholder'),
                    'default' => is_null($entry) || is_null($entry->lastModifiedBy()) ? '' : $entry->lastModifiedBy()->name,
                ],
            ],
        ];
    }

    /**
     * @param Entry $entry
     * @return array[]
     */
    public static function getArticleSchemaFields(Entry $entry = null): array
    {
        return [
            [
                'handle' => 'headline',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.headline'),
                    'default' => is_null($entry) ? '' : $entry->data()->get('title'),
                ],
            ],
            [
                'handle' => 'alternativeHeadline',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.alternative_headline'),
                    'instructions' => __('statamic-rich-snippet::fieldtypes.blog.alternative_headline_instruct'),
                ],
            ],
            [
                'handle' => 'award',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.award'),
                    'instructions' => __('statamic-rich-snippet::fieldtypes.blog.award_instruct'),
                ],
            ],
            [
                'handle' => 'genre',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.genre'),
                    'instructions' => __('statamic-rich-snippet::fieldtypes.blog.genre_instruct'),
                ],
            ],
            [
                'handle' => 'description',
                'field' => [
                    'type' => 'textarea',
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.description'),
                    'instructions' => __('statamic-rich-snippet::fieldtypes.blog.description_instruct'),
                    'default' => is_null($entry) ? '' : strip_tags(Str::limit(generateHtml($entry->data()->get('content')), 200)),
                ],
            ],
            [
                'handle' => 'articleBody',
                'field' => [
                    'type' => 'textarea',
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.article_body'),
                    'instructions' => __('statamic-rich-snippet::fieldtypes.blog.article_body_instruct'),
                    'default' => is_null($entry) ? '' : strip_tags(generateHtml($entry->data()->get('content'))),
                ],
            ],
            [
                'handle' => 'url',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.url'),
                    'default' => is_null($entry) ? '' : $entry->absoluteUrl(),
                ],
            ],
            [
                'handle' => 'image',
                'field' => [
                    'type' => 'assets',
                    'container'=> 'assets',
                    'max_files' => 1,
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.image'),
                    'instructions' => __('statamic-rich-snippet::fieldtypes.blog.image_instruct'),

                ],
            ],
            [
                'handle' => 'keywords',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.keywords'),
                    'instructions' => __('statamic-rich-snippet::fieldtypes.blog.keywords_instruct'),
                    'default' => is_null($entry) ? '' : $entry->slug(),
                ],
            ],
            [
                'handle' => 'wordCount',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.word_count'),
                    'instructions' => __('statamic-rich-snippet::fieldtypes.blog.word_count_instruct'),
                    'default' => is_null($entry) ? 0 : str_word_count(generateHtml($entry->data()->get('content'))),
                    'validate' => 'numeric',
                ],
            ],
            [
                'handle' => 'datePublished',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.date_published'),
                    'default' => is_null($entry) ? now()->format('Y-m-d') : $entry->date()->format('Y-m-d'),
                    'read_only' => true,
                ],
            ],
            [
                'handle' => 'dateModified',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.date_modified'),
                    'default' => is_null($entry) ? now()->format('Y-m-d') : $entry->lastModified()->format('Y-m-d'),
                    'read_only' => true,
                ],
            ],
            [
                'handle' => 'author',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.blog.author'),
                    'placeholder' => __('statamic-rich-snippet::fieldtypes.blog.author_placeholder'),
                    'default' => is_null($entry) || is_null($entry->lastModifiedBy()) ? '' : $entry->lastModifiedBy()->name,
                ],
            ],
        ];
    }

    /**
     * @return array|array[]
     */
    public static function getOrganizationFields(): array
    {
        return [
            'organization' => [
                'display' => __('statamic-rich-snippet::fieldtypes.org.header'),
                'fields' => [
                    'section' => [
                        'type' => 'section',
                        'display' => __('statamic-rich-snippet::fieldtypes.org.section'),
                        'instructions' => __('statamic-rich-snippet::fieldtypes.org.section_instruct'),
                    ],
                    'display' => [
                        'type' => 'toggle',
                        'display' => __('statamic-rich-snippet::fieldtypes.org.display'),
                        'default' => true,
                    ],
                    'name' => [
                        'type' => 'text',
                        'display' => __('statamic-rich-snippet::fieldtypes.org.name'),
                        'instructions' => __('statamic-rich-snippet::fieldtypes.org.name_instruct'),
                    ],
                    'url' => [
                        'type' => 'text',
                        'display' => __('statamic-rich-snippet::fieldtypes.org.url'),
                        'instructions' => __('statamic-rich-snippet::fieldtypes.org.url_instruct'),
                        'validate' => 'active_url',
                    ],
                    'logo' => [
                        'type' => 'assets',
                        'container'=> 'assets',
                        'max_files' => 1,
                        'display' => __('statamic-rich-snippet::fieldtypes.org.logo'),
                        'instructions' => __('statamic-rich-snippet::fieldtypes.org.logo_instruct'),
                    ],
                    'address' => [
                        'type' => 'array',
                        'display' => __('statamic-rich-snippet::fieldtypes.org.address'),
                        'instructions' => __('statamic-rich-snippet::fieldtypes.org.address_instruct'),
                        'keys' => [
                            'streetAddress' => 'Street Address',
                            'addressLocality' => 'Address Locality',
                            'addressRegion' => 'Address Region',
                            'postalCode' => 'Postal Code',
                        ],
                        'mode' => 'keyed',
                    ],
                    'contactPoint' => [
                        'type' => 'array',
                        'display' => __('statamic-rich-snippet::fieldtypes.org.contact'),
                        'keys' => [
                            'email' => 'Email',
                            'telephone' => 'Telephone',
                            'contactType' => 'Contact Type',
                        ],
                        'mode' => 'keyed',
                        'instructions' => __('statamic-rich-snippet::fieldtypes.org.contact_instruct'),
                    ],
                ],
            ],
            'webpage' => [
                'display' => __('statamic-rich-snippet::fieldtypes.web.header'),
                'fields' => [
                    'section' => [
                        'type' => 'section',
                        'display' => __('statamic-rich-snippet::fieldtypes.web.section'),
                        'instructions' => __('statamic-rich-snippet::fieldtypes.web.section_instruct'),
                    ],
                    'webpage_display' => [
                        'type' => 'toggle',
                        'display' => __('statamic-rich-snippet::fieldtypes.web.display'),
                        'default' => true,
                    ],
                    'webpage_name' => [
                        'type' => 'text',
                        'display' => __('statamic-rich-snippet::fieldtypes.web.name'),
                        'instructions' => __('statamic-rich-snippet::fieldtypes.web.name_instruct'),
                    ],
                    'webpage_description' => [
                        'type' => 'text',
                        'display' => __('statamic-rich-snippet::fieldtypes.web.description'),
                        'instructions' => __('statamic-rich-snippet::fieldtypes.web.description_instruct'),
                    ],
                ],
            ],
        ];
    }

    public static function getJobPostingFields(Entry $entry): array
    {
        return [
            [
                'handle' => 'title',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.job.title'),
                    'default' => $entry->data()->get('title', ''),
                ],
            ],
            [
                'handle' => 'description',
                'field' => [
                    'type' => 'textarea',
                    'display' => __('statamic-rich-snippet::fieldtypes.job.description'),
                ],
            ],
            [
                'handle' => 'employment_type',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.job.employment_type'),
                ],
            ],
            [
                'handle' => 'min_base_salary',
                'field' => [
                    'type' => 'integer',
                    'display' => __('statamic-rich-snippet::fieldtypes.job.min_base_salary'),
                ],
            ],
            [
                'handle' => 'max_base_salary',
                'field' => [
                    'type' => 'integer',
                    'display' => __('statamic-rich-snippet::fieldtypes.job.max_base_salary'),
                ],
            ],
            [
                'handle' => 'date_posted',
                'field' => [
                    'type' => 'text',
                    'display' => __('statamic-rich-snippet::fieldtypes.job.date_posted'),
                    'default' => is_null($entry) ? now()->format('Y-m-d') : $entry->date()->format('Y-m-d'),
                    'read_only' => true,
                ],
            ],
        ];
    }
}
