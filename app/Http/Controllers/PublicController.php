<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /* rotta homepage */
    public function welcome() {

        $announcements = Announcement::take(6)->get()->sortByDesc('created_at');
        
        return view('welcome', compact('announcements'));
    }

    public function announcementCreate(){
        return view('announcement.announcementCreate');
    }

    public function categoryShow(Category $category){
        return view('categoryShow', compact('category'));
    }
}
