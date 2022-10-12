<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserContactMail;
use App\Models\MailSettings;
use Illuminate\Support\Facades\Auth;



class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request['search'] ?? "";
        $status_search = $request['status'] ?? "";
        $favorite_search = $request['favorite'] ?? "";

        if($search != ""){
            $contacts = Contact::where('auth_id', Auth::id())->where('contact_name', 'LIKE', "%$search%")->orWhere('contact_email', 'LIKE', $search)->paginate(8);
        }
        elseif($favorite_search != "" || $status_search != ""){
            $contacts = Contact::where('auth_id', Auth::id())->where('is_favorite', 'LIKE', $favorite_search)->orWhere('is_status', 'LIKE', $status_search)->paginate(8);
        }
        else {
            $contacts = Contact::where('auth_id', Auth::id())->paginate(8);
        }
        return view('backend.contact.index', compact('contacts', 'search'));
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
        $data->auth_id = Auth::id();
        $data->image = $last_image;
        $data->is_favorite = $request->get('is_favorite') ?? 2;
        $data->is_status = $request->get('is_status') ?? 2;
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
        $data->auth_id = Auth::id();
        $data->is_favorite = $request->get('is_favorite') ?? 2;
        $data->is_status = $request->get('is_status') ?? 2;
        $data->save();
        return redirect()->route('contact.index')->with('success', 'Update successfully');

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
        return response()->json();
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
        return response()->json();
    }

    public function contact_restore($id){
        Contact::withTrashed()->find($id)->restore();
        return redirect()->route('contact.index')->with('success', 'Contact restore success');
    }

    public function send_mail($id){
        $contact = Contact::findOrFail($id);
        Mail::to($contact->contact_email)->send(new UserContactMail($contact));
        return redirect()->route('contact.index')->with('success', 'Mail send success');
    }

}
