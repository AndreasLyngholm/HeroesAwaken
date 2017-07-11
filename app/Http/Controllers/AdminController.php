<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $groups = Group::where('name', '<>', 'admin')->orderBy('id')->get();
        return view('admin.dashboard', compact('groups'));
    }

    public function createGroup(Request $request)
    {
        $groupName = $request->input('group_name');
        $groupDisplayName = $request->input('group_display_name');
        $groupDescription = $request->input('group_description');

        // Maybe do something to check the input ...

        Group::create([
            'name' => $groupName,
            'display_name' => $groupDisplayName,
            'description' => $groupDescription
        ]);
        return redirect('admin');
    }

    public function deleteGroup(Request $request)
    {
        $groupId = $request->input('group_id');
        DB::table('groups')->where('id', $groupId)
                           ->where('name', '<>', 'admin')
                           ->delete();
        return redirect('admin');
    }
}
