<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostcardRequest;
use App\Http\Requests\UpdatePostcardRequest;
use App\Models\Postcard;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostcardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('postcards.index', [
            'postcards' => Postcard::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('postcards.create');
    }

    //Show single postcard
        public function show(Postcard $postcard) {
            return view('postcards.show', [
                'postcard' => $postcard
            ]);
        }   

    // Store Postcard Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',            
            'price' => 'required',           
            'is_draft' => 'required'            
        ]);    

        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photo', 'public');
        }

        $formFields['user_id'] = auth()->id();
        $formFields['team_id'] = auth()->id();

        Postcard::create($formFields);

        return redirect('/postcards/manage')->with('message', 'Postcard created successfully!');
    }

    // Show Edit Form
    public function edit(Postcard $postcard) {
        return view('postcards.edit', ['postcard' => $postcard]);
    }

    // Update Postcard Data
    public function update(Request $request, Postcard $postcard) {
               
        $formFields = $request->validate([
            'title' => 'required',            
            'price' => 'required',            
            'is_draft' => 'required'
        ]);

        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photo', 'public');
        }

        $postcard->update($formFields);

        return back()->with('message', 'Postcard updated successfully!');
    }

    // Delete Postcard
    public function destroy(Postcard $postcard) {        
        
        if($postcard->photo && Storage::disk('public')->exists($postcard->photo)) {
            Storage::disk('public')->delete($postcard->photo);
        }
        $postcard->delete();
        return redirect('/postcards/manage')->with('message', 'Postcard deleted successfully');
    }

    // Manage Postcards
    public function manage() {
        //return view('postcards.manage', ['postcards' => auth()->user()->get()]);
        return view('postcards.manage', ['postcards' => Postcard::paginate(10)]);
    }
    
}
