/*
 * *
 *  *  * Copyright (C) OptimoApps - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <info@optimoapps.com>
 *  *
 *
 */

import Schema from './components/schema';

Statamic.booting(() => {
    Statamic.$components.register('article_schema-fieldtype', Schema);
    Statamic.$components.register('blog_schema-fieldtype', Schema);
    Statamic.$components.register('news_schema-fieldtype', Schema);
    Statamic.$components.register('job_posting-fieldtype', Schema);
});
