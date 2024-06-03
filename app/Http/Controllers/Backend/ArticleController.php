<?php

namespace App\Http\Controllers\Backend;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $articles = Article::with('Category')->latest()->get();

            // CUSTOM CATEGORY ID TO CATEGORY NAME
            return DataTables::of($articles)
            ->addColumn('category_id',function($articles){
                return $articles->category->name;
            })

            // CUSTOM STATUS BADGE
            ->addColumn('status',function($articles){
                if ($articles->status == 0) {
                    return '<span class="badge bg-danger">Private</span>';
                } else {
                    return '<span class="badge bg-success">Publish</span>';
                }
            })

            // CUSTOM BUTTON AKSI
            ->addColumn('button',function($articles){
                return '
                    <div class="">
                        <a href="" class="btn btn-xs btn-primary"><i class="fa fa-list"></i> Detail</a>
                        <a href="" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                        <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash-alt"></i> Hapus</a>
                    </div>';
            })

            ->rawColumns(['category_id','status','button'])
            ->make();
        }

        return view('backend.article.index');

        // return view('backend.article.index', [
        //     'articles' => Article::with('Category')->latest()->get()
        // ]);
    }

    // public function table(){

    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
