<?php

namespace App\Http\Controllers;

use App\Mail\Notification;
use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'update', 'destroy', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Article $article)
    {
        request()->validate([
            'comment' => 'required|min:2|max:500',
        ]);

        $user = auth()->user();

        $comment = new Comment([
            'comment' => request('comment'),
        ]);

        $comment->user()->associate($user);
        $comment->article()->associate($article);
        $comment->save();

        Mail::to($comment->article->user->email)->send(new Notification($comment->article ,$comment,"comment"));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
