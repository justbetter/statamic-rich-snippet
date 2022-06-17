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

namespace OptimoApps\RichSnippet\FieldTypes;

use Illuminate\Support\Facades\Request;
use OptimoApps\RichSnippet\Fields as RichSnippetFields;
use OptimoApps\RichSnippet\SchemaTypeEnum;

class JobPostingType extends AbstractSchema
{
    public static $title = 'Job Posting';

    public static $handle = 'job_posting';

    public $selectable = false;

    protected function richSnippetFields(): array
    {
        return RichSnippetFields::getJobPostingFields($this->field->parent());
    }

    public function process($data)
    {
        if (Request::input('schema_type') === SchemaTypeEnum::JOB_POSTING) {
            return $data;
        }
    }
}
