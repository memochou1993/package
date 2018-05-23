<?php

namespace App\Contracts;

interface TagInterface
{
    public function getAllTags();
    public function getTagByName($tag_name);
    public function getTagsByPackage($package_id);
    public function getTagData($package_login, $package_name);
    public function storeTag($package_id, $tag_data);
}
