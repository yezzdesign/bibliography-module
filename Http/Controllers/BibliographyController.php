<?php

namespace Modules\Bibliography\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ACP\Logical\ImageControl;
use Modules\Bibliography\Entities\Bibliography;
use Modules\Bibliography\Logical\Table;

class BibliographyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // Load the Databasedata with all colums from Module (start.php)
        $books          =   Bibliography::select(Table::getDatabaseFields())->orderBy('id', 'desc')->get();

        // Get the data for the Table on Index Site
        $tableHeader    =   Table::getDatabaseValues(); // Header
        $tableBodyValue =   Table::getTableRowComponentsPath(); // wich views to include

        return view('bibliography::index', compact('books', 'tableHeader', 'tableBodyValue'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('bibliography::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'read_at'           =>  'date|required',
            'book_title'        =>  'required|string|min:5',
            'book_author'       =>  'required|string|min:5',
            'book_blurb'        =>  'required|string|min:5',
            'book_cover'        =>  'nullable|image',
            'book_status'       =>  'nullable|string',
            'posts_id'          =>  'nullable|integer',
        ]);

        //@todo translate validation rules

        // If there are Pictures in the Content, so it will be extracted and uploaded to storage
        $book_blurb_clean =   ImageControl::uploadImagesFromHTML($request->book_blurb);

        // Check the image and save it
        $path   =   ($request->hasFile('book_cover') ? $request->file('book_cover')->store('uploads/books/cover', 'public') : 'uploads/blog/cover/placeholder.png');

        // Check Status
        $status =   $request->book_status == 'on';

        $book   =   new Bibliography([
            'book_title'            =>  $request->book_title,
            'book_blurb'            =>  $book_blurb_clean,
            'book_author'           =>  $request->book_author,
            'post_category_id'      =>  $request->post_category_id,
            'read_at'               =>  $request->read_at,
            'book_status'           =>  $status,
            'posts_id'              =>  $request->posts_id,
            'book_cover'            =>  $path,
        ]);

        $book->saveOrFail();
        //dd($book->id);

        return redirect(route('bibliography.backend.index'))->with([
            'message'       =>  __('bibliography::create.book.success.message', ['title' => $request->book_title])
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('bibliography::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Bibliography $book
     * @return Renderable
     */
    public function edit(Bibliography $book)
    {
        return view('bibliography::edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Bibliography $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(Request $request, Bibliography $book)
    {
        $request->validate([
            'read_at'           =>  'date|required',
            'book_title'        =>  'required|string|min:5',
            'book_author'       =>  'required|string|min:5',
            'book_blurb'        =>  'required|string|min:5',
            'book_cover'        =>  'nullable|image',
            'book_status'       =>  'nullable|string',
            'posts_id'          =>  'nullable|integer',
        ]);

        //@todo translate validation rules

        // If there are Pictures in the Content, so it will be extracted and uploaded to storage
        $book_blurb_clean =   ImageControl::uploadImagesFromHTML($request->book_blurb);

        // Check the image and save it
        if ($request->hasFile('book_cover')) {
            $path = $request->file('book_cover')->store('uploads/books/cover', 'public');
            //dd($path);
            $book->updateOrFail([
                'book_cover' => $path ]);
        }

        // Check Status
        $status =   ($request->book_status ? true : false);

        // Update Content
        $book->updateOrFail([
            'book_title'            =>  $request->book_title,
            'book_blurb'            =>  $book_blurb_clean,
            'book_author'           =>  $request->book_author,
            'post_category_id'      =>  $request->post_category_id,
            'read_at'               =>  $request->read_at,
            'book_status'           =>  $status,
            'posts_id'              =>  $request->posts_id,
        ]);

        // Redirect with successmessage
        return redirect(route('bibliography.backend.index'))->with(['message' => __('bibliography::edit.success.message', ['title' => $request->book_title])]);
    }

    /**
     * change the update status.
     * @param Bibliography $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function changeStatus(Bibliography $book){


        $book_status    = !$book->book_status;

        $book->updateOrFail([
            'book_status'   =>  $book_status
        ]);

        return redirect(route('bibliography.backend.index'))->with([
            'message'   =>  __('bibliography::edit.success.message.status', ['title' => $book->book_title])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Bibliography $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Bibliography $book)
    {
        // save title for return message
        $bookTitle  =   $book->book_title;

        // delete currect model
        $book->delete();

        // redirect with message blogtitle
        return redirect(route('bibliography.backend.index'))->with([
            'message'   =>  __('bibliography::edit.success.message.delete', ['title' => $bookTitle])
        ]);
    }
}
