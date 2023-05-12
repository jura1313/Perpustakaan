<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\BookStore;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\CloudinaryStorage;
use App\Http\Controllers\CloudinaryBook;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;




class BookStoreController extends Controller
{
    public function index()
    {
        $books = BookStore::all();
        return view('dashboard.home', ["books"=>$books]);
    }


    public function create()
    {
        // $category = Category::all();
        return view('dashboard.book.save', ["category"=> Category::all()]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|max:225',
            'slug'=>'required|unique:book_stores',
            'category_id'=>'required',
            'description'=>'required',
            'author'=>'required',
            'publisher'=>'required',
            'tahun_terbit'=>'required',
            'book_cover'=>'required',
        ]);

        $cover = $request->book_cover;
        // dd($cover);
        $uploadedFileUrl = CloudinaryStorage::upload($cover->getRealPath(), $cover->getClientOriginalName());

        BookStore::create([
            'title'=>$request->title,
            'slug'=>str($request->slug),
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'excerpt'=> Str::limit(strip_tags($request->description, 50)),
            'author'=>$request->author,
            'publisher'=> $request->publisher,
            'tahun_terbit'=> $request->tahun_terbit,
            'book_cover' => $uploadedFileUrl,
            'user_id' => Auth::id(),
        ]);

        return redirect('my-book')->with('status_create', 'Buku Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookStore  $bookStore
     * @return \Illuminate\Http\Response
     */
    public function show(BookStore $bookStore)
    {
        // return $bookStore;
        return view('dashboard.dashboard.view', ["book"=>$bookStore]);
    }


    public function edit(BookStore $bookStore)
    {
        return view('dashboard.book.update', [
            "category"=> Category::all(),
            "book" => $bookStore
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookStore  $bookStore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookStore $bookStore)
    {
        $rules = [
            'title'=>'required|max:225',
            'category_id'=>'required',
            'description'=>'required',
            'author'=>'required',
            'publisher'=>'required',
            'tahun_terbit'=>'required',
            // 'book_cover'=>'required',
        ];

        if($request->slug != $bookStore->slug) {
            $rules['slug'] = 'required|unique:book_stores';
        }



        if(!empty($request->cover)) {

        $cover = $request->cover;

        $result = CloudinaryStorage::replace($bookStore->book_cover, $cover->getRealPath(), $cover->getClientOriginalName());

        $rules['book_cover'] = $result;

            // $request-> = $result;

        }else{

            $rules['book_cover'] = $request->old_cover;

        }
        $validatedData = $request->validate($rules);


        $validatedData['book_cover'] = $rules['book_cover'];
        // dd($validatedData['book_cover']);


        // dd($rules['book_cover']);

        // $cover = $request->book_cover;

        // $result = CloudinaryStorage::replace($bookStore->book_cover, $cover->getRealPath(), $cover->getClientOriginalName());
        // $rules['book_cover'] = $result;


        BookStore::findorfail($bookStore->id)->update($validatedData);

        return redirect("my-book")->with('status_update', 'Data Berhasil Diperbaharui!');
    }


    public function destroy(BookStore $bookStore)
    {
        CloudinaryStorage::delete($bookStore->book_cover);

        BookStore::destroy($bookStore->id);

        return redirect('my-book')->with('status_create', 'Buku Berhasil Dihapus!');
    }


    public function my_book() {
        $my_book = BookStore::Where('user_id',auth()->user()->id)->get();

        return view('dashboard.my-book.my-book', ["my_book" => $my_book]);
    }


    public function checkSlug(Request $request) {

        $slug = SlugService::createSlug(BookStore::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

    public function try(Request $request) {
        // dd($request->file);

        // $uploadedFileUrl = Cloudinary::uploadFile($request->file('file')->getRealPath())->getSecurePath();

        // $uploadedFileUrl = CloudinaryBook::upload($request->file->getRealPath(), $request->file->getClientOriginalName());

        // $extension = pathinfo(storage_path($uploadedFileUrl), PATHINFO_EXTENSION);
        // dd($extension);

        // $extension = pathinfo(storage_path($request->file->get()->mimeType()), PATHINFO_EXTENSION);

        // $infoPath = pathinfo(public_path('/uploads/my_image.jpg'));
        // $extension = $infoPath['extension'];
        dd ($request->file);
        return $request->file;

        // return ($uploadedFileUrl);
    }
}
