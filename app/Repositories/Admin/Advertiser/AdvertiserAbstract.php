<?php
namespace App\Repositories\Admin\User;
use App\Models\User;
use App\Models\Advertiser;
use App\Traits\RepoResponse;

class AdvertiserAbstract implements AdvertiserInterface
{
    use RepoResponse;
    protected $advertiser;
    public function __construct(Advertiser $advertiser)
    {
        $this->advertiser = $advertiser;
    }

    public function getPaginatedList($request, int $per_page = 20)
    {
        $data = advertiser::withCount('advertisements')->paginate($per_page);
        return $this->formatResponse(true, '', 'admin.advertisers.index', $data);
    }
}
