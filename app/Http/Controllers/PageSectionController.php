<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageSectionController extends Controller
{

    public function show(PageSection $pageSection)
    {
        return $pageSection->toJson();
    }


    public function update(PageSection $pageSection)
    {
        if (Auth::user() && Auth::user()->role_id == $pageSection->role_id) {
            if ($pageSection->role_id == 1 || Auth::user()->unit_id == $pageSection->unit_id) {

                $pageSection->update([
                    'title'   => request('title'),
                    'content' => request('content'),
                    'background_color' => request('background_color'),
                ]);
            }
        }

        return redirect()->back();

    }
}
