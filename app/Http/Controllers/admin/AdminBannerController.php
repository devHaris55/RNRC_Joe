<?php

namespace App\Http\Controllers\admin;

use App\Models\BannerModel;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\CalendarEvents;

class AdminBannerController extends Controller
{
    function dashboard()
    {
        $assigned = Appointments::where('appearance_status', 0)->get();
        $data['assigned'] = count($assigned);
        $un_assigned = Appointments::where('appearance_status', 1)->get();
        $data['un_assigned'] = count($un_assigned);
        $cancelled = Appointments::where('appearance_status', 2)->get();
        $data['cancelled'] = count($cancelled);

        $data['calendar_events'] = count(CalendarEvents::where('status', 0)->get());

        return view('admin.dashboard', $data);
    }

/**Banner functions starts*/
    function banner()
    {
        $banner = BannerModel::get();
        return view('admin.banners.banner-list',compact('banner'));
    }
    function banner_add()
    {
        return view('admin.banners.banner-add');
    }
    function banner_edit($id)
    {
        $banner = BannerModel::where('id',$id)->first();
        return view('admin.banners.banner-edit',compact('banner'));
    }
    function banner_delete(BannerModel $banner)
    {
        $banner->delete();
        return back()->with('delete','Deleted Successfully');
    }
    function banner_add_edit_data(Request $request,BannerModel $banner)
    {
        $create = 1;
        (isset($banner->id) and $banner->id>0)?$create=0:$create=1;
        if($request->hasFile('images'))
        {
            $imageName = time().'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('/uploads/banners'), $imageName);
            $banner->images = $imageName;
        }
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->status = $request->status;
        $banner->save();
        if($create == 0)
        {
            return back()->with('update','Updated Successfully');
        }
        else
        {
            return back()->with('success','Added Successfully');
        }
    }
/**Banner functions ends*/


}
