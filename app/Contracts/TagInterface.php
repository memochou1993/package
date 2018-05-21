<?php

namespace App\Contracts;

interface TagInterface
{
    public function getAllTags();
    public function getOneTag($tag_name);
}
