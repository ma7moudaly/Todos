@extends('layout')


@section('content')
       
      <div class="row">
          <div class="col-lg-12">
                <form action="{{route('todo.save', ['todo' => $todo->id])}}" method="post"> <!-- update form-->
                    {{ csrf_field() }} 
                    <input type="text" class="form-control input-lg" name="todo" value="{{ $todo->todo}}" placeholder="Create a new todo">
                    
                </form>     

          </div>
      </div>

     <hr>
   


@stop