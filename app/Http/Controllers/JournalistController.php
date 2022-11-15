<?php

namespace App\Http\Controllers;

use App\Models\Journalist;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJournalistRequest;
use App\Http\Requests\UpdateJournalistRequest;

class JournalistController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJournalistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJournalistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journalist  $journalist
     * @return \Illuminate\Http\Response
     */
    public function show(Journalist $journalist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Journalist  $journalist
     * @return \Illuminate\Http\Response
     */
    public function edit(Journalist $journalist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJournalistRequest  $request
     * @param  \App\Models\Journalist  $journalist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJournalistRequest $request, Journalist $journalist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journalist  $journalist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journalist $journalist)
    {
        //
    }

    public function addJournalist(){
        return view('journalist.addJournalist'); 
    }

    public function addJournalistinput(Request $request){
        $validate = $request->validate([
            'journalistName' => 'required|min:6|max:30',
            'email' => 'email',
            'dob' => 'required',
            'phone' => 'required|min:11|numeric',
            'password' => 'required|min:6|max:10',
            'gender' => 'required'
        ],
        [
            'journalistName.required'=>'Journalist Name required',
            'dob.required'=>' Date of birth is required',
            'email.required'=>'Journalist Email required',
            'password.required'=>'Password required',
            'password.min'=>'password must be at least 6 characters',
            'password.max'=>'password must not be greater than 10 characters'
            
        ]
    );
            
            $journalist = new Journalist();
            $journalist -> name = $request -> journalistName;
            $journalist -> email = $request -> email;
            $journalist -> dob = $request -> dob;
            $journalist -> phone = $request -> phone;
            $journalist -> password = $request -> password;
            $journalist ->  gender = $request -> gender;
            $journalist ->  save();
            

        // return"Registration Done";
        return redirect()->route('journalistList');
    }

    public function JournalistList(){
        $journalists = journalist::all();
        return view('journalist.list')->with('journalists',$journalists);
    }
    
    public function JournalistEdit(Request $request){
        
        $journalist = Journalist::where('id', $request -> id) -> first();
        return view('journalist.journalistEdit')->with('journalist',$journalist);
    }

    public function journalistEditSubmitted(Request $request){

        $journalist = Journalist::where('id', $request->id)->first();

       
        // $journalist = new Journalist();
        $journalist->email = $request->email;
        $journalist->phone = $request->phone;
        $journalist->password = $request->password;
        $journalist->save();

        //return redirect()->route('journalistList');
        return "OK";
    }

   

    


    public function journalistDelete(Request $request){
        $journalist = Journalist::where('id', $request->id)->first();
        $journalist->delete();
        
        return redirect()->route('journalistList');
    }

    function list($id=null){
        return $id?journalist::find($id):journalist::all();
    }

    function add1(Request $request){

            $journalist = new Journalist();
            $journalist -> name = $request -> name;
            $journalist -> email = $request -> email;
            $journalist -> gender = $request -> gender;
            $journalist -> dob = $request -> dob;
            $journalist -> phone = $request -> phone;
            $journalist -> password = $request -> password;

            
            $result= $journalist ->  save();

            if($result){
                return ["Result"=>"Added"];
            }
            else{
                return ["Result"=>"Not Added"];
            }
       
    }

    function update1(Request $request){

        $journalist= Journalist::find($request->id);


        $journalist -> phone = $request -> phone;
        $journalist -> password = $request -> password;

        
        $result= $journalist ->  save();

        if($result){
            return ["Result"=>"Data is updated"];
        }
        else{
            return ["Result"=>"Data is not updated"];
        }
       
    }

    function search1($name){
        return Journalist::where("name","like","%".$name."%")->get();
    }

    function delete1($id){

        $journalist= Journalist::find($id);

        $result= $journalist ->  delete();

        if($result){
            return ["Result"=>"Data is deleted "];
        }
        else{
            return ["Result"=>"Data is not deleted "];
        }

        
    }
}
