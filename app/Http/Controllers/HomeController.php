<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use App\Http\Resources\CommentResource;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = CommentResource::collection(
            Comment::isParent()->with(['children.children'])->latest()->get()
        );

        return response($comments, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        if ($request->filled('parent_id')) {

            try {
                $parent = Comment::findOrFail($request->parent_id);
            } catch (ModelNotFoundException $ex) {
                return response([
                    'message' => 'The given data was invalid.',
                    'errors' => 'The selected parent id is invalid.'
                ], Response::HTTP_NOT_FOUND);
            }

            if ($parent->is_third) {
                return  response([
                    'message' => 'The given data was invalid.',
                    'errors' => 'Parent comment is already in third level'
                ], Response::HTTP_NOT_ACCEPTABLE);
            }
        }

        $comment = Comment::create($request->validated());

        return response(new CommentResource($comment), Response::HTTP_CREATED);
    }
}
