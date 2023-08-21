<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LikeService;
class LikeAndDisLikeController extends Controller
{
    //
    public LikeService $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }
    public function show($id)
    {
        return $this->likeService->likeanddislike($id);
    }
}
