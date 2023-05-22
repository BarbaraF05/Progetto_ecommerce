<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /* rotta ANNUNCI */
    public function welcome() {

        $announcements = Announcement::where('is_accepted',true)->orderBy('created_at','DESC')->take(6)->get();
        
        return view('welcome', compact('announcements'));
    }

    public function announcementCreate(){
        return view('announcement.announcementCreate');
    }

    public function showAnnouncement(Announcement $announcement){
        return view('announcement.show', compact('announcement'));
    }

    public function indexAnnouncement(){
        $announcements=Announcement::where('is_accepted',true)->orderBy('created_at','DESC')->paginate(6);
        return view('announcement.index', compact('announcements'));
    }

    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(6);

        return view('announcement.index', compact('announcements'));
    }


    /* fine rotta ANNUNCI */

    /* rotta CATEGORIA */

    public function categoryShow(Category $category){

        /* dd($category->announcements()->orderBy('created_at','DESC')->get()); */
        return view('categoryShow', compact('category'));
    }
    /* fine rotta CATEGORIA */

    /* Funzione Lingua */
    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

    
    

    
}
