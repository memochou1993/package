<?php

namespace App\Contracts;

interface TagInterface
{
    // 取得所有標籤
    public function getAllTags();
    // 取得單一標籤
    public function getTagByName($tag_name);
    // 取得套件的所有標籤
    public function getTagsByPackage($package_id);
}
