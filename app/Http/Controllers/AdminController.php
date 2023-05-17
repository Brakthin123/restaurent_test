<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Summary of AdminController
 */
class AdminController extends Controller
{
    // function user
    public function user()
    {
        $data=User::all();
        return view("admin.users",compact("data"));
    }

    // function to deleteuser
    public function deleteuser($id)
    {
        $data=User::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function deletemenu($id)
    {
        $data=food::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function updatemenu($id)
    {
        $data=food::find($id);
        return view("admin.updatemenu", compact("data"));
    }

    public function foodmenu()
    {
        $data = food::all();
        return view("admin.foodmenu",compact("data"));
    }

    public function upload(Request $request)
    {
        $data = new food;
        
        $image=$request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('foodimage', $imagename);

            $data->image=$imagename;
            $data->title=$request->title;
            $data->price=$request->price;
            $data->description=$request->description;
            $data->save();

            return redirect()->back();

    }

    public function update(Request $request, $id)
    {
        $data=food::find($id);

        $image=$request->image;
        
        $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('foodimage', $imagename);

            $data->image=$imagename;
            $data->title=$request->title;
            $data->price=$request->price;
            $data->description=$request->description;
            $data->save();

            return redirect()->back();

    }

    public function reservation(Request $request)
    {
        $data = new Reservation;

            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->guest=$request->guest;
            $data->date=$request->date;
            $data->time=$request->time;
            $data->message=$request->message;
            $data->save();

            return redirect()->back();
    }

    public function viewreservation()

    {
        $data=reservation::all();

        return view("admin.adminreservation",compact("data"));
    }

    /**
     * Summary of viewchef
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function viewchef()
    {
        $data=foodchef::all();   
        return view("admin.adminchef",compact("data"));
    }


    /**
     * Summary of uploadchef
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function uploadchef(Request $request)
    {

        $data=new Foodchef;

        $image=$request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('chefimage', $imagename);
            
            $data->image=$imagename;
            $data->name=$request->name;
            $data->speciality=$request->speciality;

            $data->save();

            return redirect()->back();
    }


   public function updatechefs($id)
   {
    $data=Foodchef::find($id);

    return view("admin.updatechefs",compact("data"));
   }

   public function updatefoodchef(Request $request, $id)
   {
    $data=Foodchef::find($id);
    $image=$request->image;

    if ($image)
    {
      $imagename = time().'.'.$image->getClientOriginalExtension();
    $request->image->move('chefimage', $imagename);
            
    $data->image=$imagename;  
    }

    $data->name=$request->name;
    $data->speciality=$request->speciality;
    $data->save();

    return redirect()->back();
   
   }

   public function deletechefs($id)
   {
    $data=foodchef::find($id);

    $data->delete();
    return redirect()->back();
   }

   
   

}
