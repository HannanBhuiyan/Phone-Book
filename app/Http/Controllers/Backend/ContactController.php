<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Image;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('backend.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            '*' => 'required',
            'image' => 'required'

        ],[
            'contact_name.required' => 'Contact Name is required !!!',
            'contact_email.required' => 'Contact Email is required !!!',
            'phone_number.required' => 'Phone Number is required !!!',
            'image.required' => 'Contact photo is required !!!'
        ]);


        $img = $request->file('image');
        $img_ext = strtolower($img->getClientOriginalExtension());
        $hex_name = hexdec(uniqid());
        $img_name = $hex_name . '.' . $img_ext;
        $location = 'backend/assets/images/contact/';
        $last_image = $location. $img_name;
        Image::make($img)->save($last_image);

        $data = new Contact;

        $data->contact_name = $request->contact_name;
        $data->contact_email = $request->contact_email;
        $data->phone_number = $request->phone_number;
        $data->image = $last_image;
        $data->is_favorite = $request->is_favorite;
        $data->is_status = $request->is_status;
        $data->save();

        return redirect()->route('contact.index')->with('success', 'Contact Info added success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single_contact = Contact::findOrFail($id);
        return view('backend.contact.view', compact('single_contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            '*' => 'required',

        ],[
            'contact_name.required' => 'Contact Name is required !!!',
            'contact_email.required' => 'Contact Email is required !!!',
            'phone_number.required' => 'Phone Number is required !!!',
        ]);

        $data = Contact::findOrFail($id);
        $img = $request->file('image');
        if($img != ""){
            if(file_exists($data->image)){
                unlink($data->image);
            }
            $img_ext = strtolower($img->getClientOriginalExtension());
            $hex_name = hexdec(uniqid());
            $img_name = $hex_name . '.' . $img_ext;
            $location = 'backend/assets/images/contact/';
            $last_image = $location. $img_name;
            Image::make($img)->save($last_image);
            $data->image = $last_image;
            $data->save();
        }
        $data->contact_name = $request->contact_name;
        $data->contact_email = $request->contact_email;
        $data->phone_number = $request->phone_number;
        $data->is_favorite = $request->is_favorite;
        $data->is_status = $request->is_status;
        $data->save();
        return redirect()->route('contact.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Contact::findOrFail($id)->delete();
        return back();
    }

    public function all_trash_contact(){
        $trash_contacts = Contact::onlyTrashed()->get();
        return view('backend.contact.trash', compact('trash_contacts'));
    }

    public function permanent_delete($id){
        $delete_id = Contact::onlyTrashed()->find($id);
        if($delete_id->image){
            unlink($delete_id->image);
        }
        $delete_id->forceDelete();
        return back();
    }

    public function contact_restore($id){
        Contact::withTrashed()->find($id)->restore();
        return back();
    }

}
