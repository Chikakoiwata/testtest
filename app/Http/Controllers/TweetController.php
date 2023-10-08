<?php

namespace App\Http\Controllers;

use App\Models\Tag; // 追記
use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tweets = Tweet::all();
        $tweets = Tweet::with(['user', 'tags'])
            ->orderBy('created_at', 'desc')
            ->get();
        $tags = Tag::all(); // 追記
        return view('tweets', [
            'tweets' => $tweets,
            'tags' => $tags // 追記
        ]);
    }

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

        $request->validate([
            'message' => 'required|max:30'
        ]);

        $tweet = Tweet::create([
            'message' => $request->message,
            'user_id' => auth()->user()->id
        ]);
        $tweet->tags()->attach($request->tags); // 追記
        return redirect()->route('tweets.index');
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
   
     public function edit(Tweet $tweet)
     {
         $tags = Tag::all();
         $selectedTags = $tweet->tags->pluck('id')->all();
         return view('edit', [
             'tweet' => $tweet,
             'tags' => $tags,
             'selectedTags' => $selectedTags
         ]);    
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweet $tweet) // ここも変わってる点注意！
{
        // ツイートのメッセージ内容を更新
    $tweet->update([
        'message' => $request->message
    ]);
        // ツイートに紐づいているタグを更新
    $tweet->tags()->sync($request->tags);
    return redirect()->route('tweets.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        $tweet->tags()->detach();
        $tweet->delete();
        return redirect()->route('tweets.index');
    }
}
