<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\TagInterface;
use App\Package;
use App\Tag;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

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

    public function getTagData($package_login, $package_name)
    {
        try {
            $client = new Client();
            $package_full_name = $package_login . "/" . $package_name;
            $response = $client->get('https://api.github.com/repos/' . $package_full_name . '/topics', [
                'headers' => ['Accept' => 'application/vnd.github.mercy-preview+json']
            ])->getBody();
            $tag_data = json_decode($response, true);

            return $tag_data;
        } catch (ClientException $e) {

            return;
        }
    }

    public function storeTag($package_id, $tag_data)
    {
        foreach ($tag_data["names"] as $tag_data) {
            $tag = $this->tag->firstOrCreate([
                'name' => $tag_data,
            ], [
                'type' => 'Topic',
                'name' => $tag_data,
            ]);

            $tag->packages()->attach($package_id);
        }
    }
}
