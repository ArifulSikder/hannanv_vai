<?php
namespace App\Repositories\Admin\User;


interface AdvertiserInterface
{
    public function getPaginatedList($request, int $per_page = 10);
}
