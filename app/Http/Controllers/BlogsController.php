<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    public function ShowBlogs(){
        $blogs = DB::table('blogs')->select()->get();

        return view('Pages.Blogs',['Blogs'=>$blogs]);
    }

    public function FetchBlogTag(Request $request){
       $blogs = Blog::where('tag',$request->tag)->get();
       return view('Pages.Blogs',['Blogs'=>$blogs]);
    }

    public function Search(Request $request){
        $request->validate([
            'search'=>'required|max:20'
        ]);
        
        $blogs = Blog::where('title','like', '%' . $request->search . '%')->get();

        return view('Pages.Blogs',['Blogs'=>$blogs]);
    }

    public function ShowBlog(Request $request){
       $blog =  Blog::where('id',$request->id)
       ->with('user:id,username','comments','comments.user:id,username')
       ->first();

        return view('Pages.Blog',['Blog'=>$blog]);
    }

    public function MyBlogs(){
        $user_id = auth()->user()->id;
        $myblogs = User::find($user_id)->posts;
        
        return view('Pages.myblogs',['MyBlogs'=>$myblogs]);
    }
    
    public function CreateBlogForm(){
        return view('Pages.create');
    }

    public function UpdateBlogForm(Request $request){
      $blog = Blog::findorfail($request->id);
      
      return view('Pages.update',['blog'=>$blog]);
    }
    
    public function Create(Request $request){

        $validated = $request->validate([
            'title'=>'required|min:3|max:20',
            'content'=>'required|max:500',
            'tag'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:10240'
        ]) ;

        $validated['user_id'] = auth()->user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $request->image->storeAs('public', $imageName);
            
            $validated['image'] = $imageName;
        }

        Blog::create($validated);

        return redirect('/blogs')->with('message','Blog created successfully');
    }

    public function Update(Request $request){

        $validated = $request->validate([
            'title'=>'required|min:3|max:20',
            'content'=>'required|max:500',
            'tag'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg|max:10240'
        ]) ;

        $blog = Blog::findorfail($request->id);

        if ($request->hasFile('image')) {
            $disk = 'public';
            $path = $blog->image;

            if (Storage::disk($disk)->exists($path)) {
                Storage::disk($disk)->delete($path);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $request->image->storeAs('public', $imageName);
            
            $validated['image'] = $imageName;
        }

        $blog->update($validated);

        return redirect('/blogs')->with('messages','Blog updated successfully');
    }

    public function Delete(Request $request){

       $blog = Blog::findorfail($request->id);

       $disk = 'public';

       if (Storage::disk($disk)->exists($blog->image)) {
          Storage::disk($disk)->delete($blog->image);
       }

       $blog->delete();

       return back()->with('message',"Blog deleted successfully");
    }

}
