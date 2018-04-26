<?php

namespace App\Http\Controllers;

use Session;
use App\Todo; //call model 
use Illuminate\Http\Request;

class TodosController extends Controller
{
	//read data from DB
    public function index()
    {
    	$todos = Todo::all();
       return view('todos')->with('todos',$todos);  //pass parameter to view 
    }

    //insert data into DB
    public function store(Request $request)
    {
    	//used to show array 
        //dd( $request->all() );

         //create instance from model
        $todo = new Todo ;
         //todo in db = request->name of input text
        $todo->todo = $request->todo ;
        //save in db
        $todo->save();
         
         //session 
        Session::flash('success','Your todo was created.');
        //redirect user to page after save
        return redirect()->back();
    }
     
     //delete data from DB
    public function delete($id)
    {
    	//used to show array
        //dd($id) ;

        //method to find id   inside model
        $todo = Todo::find($id) ;

        //method to delete what i find in model
        $todo->delete();
         //ssesion
         session::flash('success','Your todo was deleted.');
         
         //redirect user to page after delete
        return redirect()->back();
    }

    //update data in DB
    public function update($id)
    {
    	 //method to find id   inside model
        $todo = Todo::find($id);

        return view('update')->with('todo',$todo);
    }

    //continue to update data in DB
    public function save(Request $request ,$id)
    {
    	//used to show array
        //dd($request->all());

        //method to find id   inside model
        $todo = Todo::find($id);

       //todo in db = request->name of input text
        $todo->todo = $request->todo ;

        //save in db
        $todo->save();
        //ssesion
         session::flash('success','Your todo was updated.');
        //redirect user to route todos  after save
        return redirect()->route('todos') ;
       
    }

    //mark completed
    public function completed($id)
    {
       //method to find id   inside model
        $todo = Todo::find($id);

       //completed in db =
        $todo->completed = 1;

        //save in db
        $todo->save();
        //ssesion
         session::flash('success','Your todo was mark as completed.');
       //redirect user to page after save
        return redirect()->back();
    }

}
