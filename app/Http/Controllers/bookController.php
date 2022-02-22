<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use Carbon\Carbon;

class bookController extends Controller
{
    //
    public function getAllBooks()
    {
        $books = books::get()->toJson(JSON_PRETTY_PRINT);
        return response($books, 200);
    }

    public function addBook(Request $request)
    {
        $books = new books;
        $books->title = $request->title;
        $books->author = $request->author;
        $books->genre = $request->genre;
        $books->img = $request->img;
        $books->publisher = $request->publisher;
        $books->preview = $request->preview;
        $books->release_date = Carbon::createFromFormat('d/m/Y', $request->release_date)->format('Y-m-d');
        $books->save();

        return response()->json([
            "message" => "books record created"
        ], 201);
    }
    public function getBook($id)
    {
        if (books::where('id', $id)->exists()) {
            $book = books::where('id', '=', $id)->get();
            return response($book, 200);
        } else {
            return response()->json([
                "message" => "book record not found"
            ], 404);
        }
    }

    public function updateBook(Request $request, $id)
    {
        if (books::where('id', $id)->exists()) {
            $books = books::find($id);
            $books->title = $request->title;
            $books->author = $request->author;
            $books->genre = $request->genre;
            $books->img = $request->img;
            $books->publisher = $request->publisher;
            $books->preview = $request->preview;
            $books->release_date = Carbon::createFromFormat('d/m/Y', $request->release_date)->format('Y-m-d');
            $books->save();

            return response()->json([
                "message" => "books record updated"
            ], 201);
        } else {
            return response()->json([
                "message" => "book record not found"
            ], 404);
        }
    }

    public function deleteBook($id)
    {
        if (books::where('id', $id)->exists()) {
            $book = books::where('id', '=', $id)->delete();
            return response()->json([
                "message" => "book record deleted"
            ], 201);
        } else {
            return response()->json([
                "message" => "book record not found"
            ], 404);
        }
    }
}
