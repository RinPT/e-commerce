<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::all();
        foreach ($authors as $key => $author) {
            $gids = json_decode($author->group);
            $gnames = [];
            foreach ($gids as $gid) {
                $gnames[] = Group::findOrFail($gid)->name;
            }
            $author->groups = $gnames;
        }
        return view('admin.author.index')->with([
            'authors' => $authors
        ]);
    }

    public function create()
    {
        return view('admin.author.create')->with([
            'groups' => Group::all()
        ]);
    }

    public function store(Request $request)
    {
        try {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                if ($file->isValid()) {
                    $filename = strtotime(Carbon::now()).".".$file->getClientOriginalExtension();
                    $file->storeAs('photo/author',$filename, 'public_html');
                }else{
                    return back()->with('error', 'An error occurred while uploading the file.');
                }
            }
            Author::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'photo' => $filename ?? "",
                'group' => json_encode($request->groups),
                'status' => is_null($request->status) ? 0 : 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            return back()->with('success', 'New author added.');
        } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {
                return back()->with('error', 'There is already a author for this username or email.');
            }
        }
        return back();
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);
        $author->group = json_decode($author->group);
        return view('admin.author.edit')->with([
            'id' => $id,
            'groups' => Group::all(),
            'author' => $author
        ]);
    }

    public function update(Request $request, $id)
    {
        $emails = Author::where([
            ['email','=',$request->email],
            ['id','!=',$id]
        ])->get();
        if(count($emails)){
            return back()->with('error', 'There is already an author for this email.');
        }
        $usernames = Author::where([
            ['username','=',$request->username],
            ['id','!=',$id]
        ])->get();
        if(count($usernames)){
            return back()->with('error', 'There is already an author for this username.');
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            if ($file->isValid()) {
                $oldPhoto = Author::findOrFail($id)->photo;
                if(!empty($oldPhoto)){
                    if(file_exists(public_path('photo/author/'.$oldPhoto))){
                        unlink(public_path('photo/author/'.$oldPhoto));
                    }
                }
                $filename = time().".".$file->getClientOriginalExtension();
                $file->storeAs('photo/author',$filename, 'public_html');
                Author::findOrFail($id)->update([
                    'photo' => $filename,
                ]);
            }else{
                return back()->with('error', 'An error occurred while uploading the file.');
            }
        }

        Author::findOrFail($id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'username' => $request->username,
            'email' => $request->email,
            'gender' => $request->gender,
            'group' => json_encode($request->groups),
            'status' => is_null($request->status) ? 0 : 1,
            'updated_at' => Carbon::now()
        ]);
        if(!empty($request->password)){
            Author::findOrFail($id)->update([
                'password' => Hash::make($request->password)
            ]);
        }
        return back()->with('success', 'Information updated successfully');
    }

    public function destroy($id)
    {
        Author::findOrFail($id)->delete();
        return back()->with('success', 'Author removed successfully.');
    }
}
