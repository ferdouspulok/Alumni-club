<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\MembershipType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberDirectoryController extends Controller
{
    public function index(Request $request): View
    {
        $types = MembershipType::active()->get();

        $query = Member::publicDirectory()->with('membershipType');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'LIKE', "%{$search}%")
                  ->orWhere('member_id', 'LIKE', "%{$search}%")
                  ->orWhere('profession', 'LIKE', "%{$search}%")
                  ->orWhere('organization', 'LIKE', "%{$search}%");
            });
        }

        if ($typeId = $request->input('type')) {
            $query->where('membership_type_id', $typeId);
        }

        if ($profession = $request->input('profession')) {
            $query->where('profession', 'LIKE', "%{$profession}%");
        }

        $members = $query->orderBy('member_id', 'asc')->paginate(12)->withQueryString();

        return view('public.members', compact('members', 'types'));
    }
}
