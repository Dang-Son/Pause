<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecommentRequest;
use App\Http\Requests\UpdatecommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Spatie\QueryBuilder\QueryBuilder;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = QueryBuilder::for(Comment::class)
            ->allowedIncludes(['user', 'song'])
            ->allowedSorts(['id'])
            ->jsonPaginate();
        return CommentResource::collection($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecommentRequest $request)
    {
        $comment = Comment::create($request->input(("data.attributes")));
        return new CommentResource($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        $comment = QueryBuilder::for(Comment::where('id', $comment->id))->allowedIncludes(['user', 'song'])->firstOrFail();
        return new CommentResource($comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecommentRequest  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecommentRequest $request, Comment $comment)
    {
        $comment->update($request->input('data.attributes'));
        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        $comment->delete();
        return response(null, 204);
    }
}
