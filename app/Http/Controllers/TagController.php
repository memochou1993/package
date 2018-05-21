<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\TagInterface;

class TagController extends Controller
{
    protected $request;
    protected $tag;

    public function __construct(Request $request, TagInterface $tag)
    {
        $this->request = $request;
        $this->tag = $tag;
    }

    public function index()
    {
        $tags = $this->tag->getAllTags();

        return view('tag.index', compact('tags'));
    }

    public function show($tag_name)
    {
        $tag = $this->tag->getOneTag($tag_name);

        return view('tag.show', compact('tag'));
    }
}
