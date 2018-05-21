<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\TagInterface;
use App\Tag;

class TagRepository implements TagInterface
{
    protected $request;
    protected $tag;

    public function __construct(Request $request, Tag $tag)
    {
        $this->request = $request;
        $this->tag = $tag;
    }

    public function getAllTags()
    {
        $tags = $this->tag->all();

        return $tags;
    }

    public function getOneTag($tag_name)
    {
        $tag = $this->tag->where('name', $tag_name)->firstOrFail();

        return $tag;
    }
}
