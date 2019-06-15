<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FAQ;


class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $faqs = FAQ::orderBy('faq_id', 'DESC')->paginate(8);
        return view('backend.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq = new FAQ;
        $this->validate($request,[
            'question'=>'required',
            'answer'=>'required',
        ]);
       
        $data['question'] = $request->question;
        $data['answer']= html_entity_decode(strip_tags( $request->answer));
        if($faq->create($data)){
            return redirect()->route('faq')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('create')->with('error','Sorry, the record couldn\'t be stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         if(!$request->id){
            return redirect()->back();
        }
        $faqId=$request->id;
        $faq = FAQ::where('faq_id',$faqId)->first();
        return view('backend.faq.show', compact('faq'));
    }

    public function view()
    {

        $faq = FAQ::orderBy('faq_id','DESC')->paginate(10);
        return view('backend.faq.view', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if(!$request->id){
            return redirect()->back();
        }
        $faqId=$request->id;
        $faq = FAQ::where('faq_id',$faqId)->first();

        return view('backend.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('faq');
        }
        $faqId=$request->id;
        $faq = FAQ::where('faq_id',$faqId)->first();
       
        $data['question']=$request->question;
        $data['answer']= html_entity_decode(strip_tags( $request->answer));
        if(faq::where('faq_id',$faqId)->update($data)){
          return redirect()->route('faq')->with('success','The record was successfully inserted');
        }
        return redirect()->route('faq')->with('error','Sorry, the record couldn\'t be updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         if (!$request->id | $request->isMethod('get')) {
            return redirect()->back();
        }
        $faqId = $request->id;
        if ( FAQ::where('faq_id',$faqId)->delete()) {
            return redirect()->route('faq')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('faq')->with('error','Sorry,the record couldn\'t be deleted');
    }
}
