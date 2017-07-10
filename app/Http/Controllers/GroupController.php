<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Creates a new group in the database
     * @param $groupName string The group's name
     * @param $groupDisplayName string The group's display name
     * @param $groupDescription string The group's description
     */
    private function createGroup($groupName, $groupDisplayName, $groupDescription)
    {
        // TODO: Check that the group doesn't already exist
        Group::create([
            'name' => $groupName,
            'display_name' => $groupDisplayName,
            'description' => $groupDescription
        ]);
    }

    /**
     * Creates basic groups and sets the current user's group to Admin
     */
    public function generateSampleGroups()
    {
        $user = Auth::user();
        if ($user)
        {
            $this->createGroup('admin', 'Admin','Administrators group');
            $this->createGroup('mod', 'Moderator','Moderators group');
            $user->addToGroup('admin');
        }
        return redirect('home');
    }
}
