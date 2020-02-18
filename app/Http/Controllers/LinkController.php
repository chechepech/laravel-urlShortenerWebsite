<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct(){}

    public function show($hash=NULL){

    	$link = Link::where('hash', $hash)->first();
    	if($link){
			return redirect()->to($link->url);
		}else{
			return redirect()->to('/')->with('error','Invalid link!');
		}
    }

    public function store(Request $request){    	
    	
    	//validate fields
    	$fields = request()->validate([
			'url' => 'required|url',
			'hash' => 'nullable'
		]);
		
		$link = NULL;
    	//retrieve a register
		$link = Link::where('url', $fields['url'])->first();
		//$user = Link::firstOrCreate(['url' => $fields['url'],'hash' => $fields['hash']]);

		if($link){

			return view('links.welcome',['link'=>$link]);
		}

		do{
			$hash = Str::random(8);
		}while(Link::where('hash',$hash)->count()>0);

    	//create a ramdon string field hash
    	$fields['hash'] = $hash;
    	//save data
		$link = Link::create($fields);

		//return dd($link);
		return view('links.welcome')->with(['link'=>$link])->with(['success' => 'Url was created successfully!']);
    }
}
