<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\TagInterface;
use App\Package;
use App\Tag;

class TagRepository implements TagInterface
{
    protected $request;
    protected $package;
    protected $tag;

    public function __construct(Request $request, Package $package, Tag $tag)
    {
        $this->request = $request;
        $this->package = $package;
        $this->tag = $tag;
    }

    public function getAllTags()
    {
        $tags = $this->tag->all();

        return $tags;
    }

    public function getTagByName($tag_name)
    {
        $tag = $this->tag->where('name', $tag_name)->firstOrFail();

        return $tag;
    }

    public function getTagsByPackage($package_id)
    {
        $tags = $this->package->find($package_id)->tags()->get();

        return $tags;
    }
}
