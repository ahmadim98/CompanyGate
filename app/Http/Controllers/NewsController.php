<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Storage;

class NewsController extends Controller
{
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
    public function emptyForm(){
        return redirect('/managenews');
    }

    public function NewsPage($id){
        $news = News::where('id', $id)->get()->first();
        
        //return json_encode($employer);
        //return view('employers/editemployer', ['id' => $id]);
        return view('news/newspage',compact('news'));
    }

    public function getLatestNews(){
        $news = News::orderBy('created_at', 'desc')->take(5)->get();
        return $news;
    }

    public function getAllNews(){
        $news = News::all('id','image','title','userid','created_at');

        foreach($news as $new){ 
            if(!is_null($new->image)){
                $new->image = asset('storage/news_images/'.$new->image.'');
            }
        }

        return $news;
    }

    public function editNews($id){
        //return view('employers/editemployer', ['id' => $id]);
        $news = News::where('id', $id)->get()->first();
        
        //return json_encode($employer);
        //return view('employers/editemployer', ['id' => $id]);
        return view('news/editnews',compact('news'));
    }

    public function UpdateNews(Request $request,$id){
        // Form validation
        $this->validate($request, [
            'newstitle' => 'required',
            'newstext' => 'required',
            'newsimage' => '',
        ]);

        $news = new News;
        
        //filling required fields
        $news->title = $request->newstitle;
        $news->text = $request->newstext;

        if($request->file('newsimage') != null){
            //return $request->file('newsimage')->getClientOriginalName();
            $news->image = NewsController::UploadImage($request);
            //$news->image = $request->file('newsimage')->getClientOriginalName();
        }

        if($request->newsimage == 'keepimage'){
            $news->image = News::select('image')->where('id', $id)->get()->first();
           // $news->image = $request->oldimage;
        }else if($request->newsimage == 'noimage'){
            $news->image = null;
        }
        
        //change later !!!
        $news->userid = 1;

        //also this make sure to include the approval feature !!!
        $news->approved = 0;

        News::where('id', $id)->update($news->toArray());

        return true;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'newstitle' => 'required',
            'newstext' => 'required',
            'newsimage' => '',
        ]);
        
        $news = new News;
        
        //filling required fields
        $news->title = $request->newstitle;
        $news->text = $request->newstext;
        //$news->image = $request->newsimage;

        if($request->file('newsimage') != null){
            //return $request->file('newsimage')->getClientOriginalName();
            $news->image = NewsController::UploadImage($request);
        }
        
        //change later !!!
        $news->userid = 1;

        //also this make sure to include the approval feature !!!
        $news->approved = 0;

        //saving the news
        $news->save();

        return 'success';
    }

    public static function UploadImage(Request $request)
    {
      $uploadedFile = $request->file('newsimage');
      $filename = time().$uploadedFile->getClientOriginalName();

      Storage::disk('public')->putFileAs(
        'news_images/',
        $uploadedFile,
        $filename
      );

      /*$upload = new Upload;
      $upload->filename = $filename;

      $upload->user()->associate(auth()->user());

      $upload->save();*/

      return $filename;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $newsid = $request['newsid'];

        News::where('id', $newsid)->delete();

        return redirect('/managenews');
    }
}
