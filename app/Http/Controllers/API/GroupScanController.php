<?php

namespace App\Http\Controllers\API;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupScanController extends Controller
{
    public function index(Group $group)
    {
        return Group::with('scans.user')->find($group->id);
    }
}
