<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class ApiGroupScanController extends Controller
{
    public function index(Group $group)
    {
        return Group::with('scans.user')->find($group->id);
    }
}
