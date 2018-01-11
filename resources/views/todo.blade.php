<!doctype html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TodoList</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/todo.css">
        <!-- Latest compiled and minified CSS & JS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="todolist not-done">
             <h1>Todos</h1>

                <!-- add todo -->
               @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('todo.store') }}" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <input name="todo" type="text" class="form-control add-todo" placeholder="Add todo">
                    <button type="submit" id="checkAll" class="btn btn-success">Add Todo</button>
                </form>
                    
                    
                    <hr>
                    <ul id="sortable" class="list-unstyled">
                <!-- show todo_uncompleted + completed -->
                
                    <form action="{{ route('todo.update') }}" method="post" accept-charset="utf-8">
                    @foreach ($todo_uncompleted as $element)
                    <li class="ui-state-default">
                        <div class="checkbox">
                            <label>
                                {{ csrf_field() }}
                                <input name="id[]" type="checkbox" value="{{ $element->id }}" /> {{ $element->todo }}</label>
                                
                        </div>
                    </li>
                    @endforeach 

                    <button type="submit" id="checkAll" class="btn btn-success">Completed</button>
                    </form>
                 <!-- end form -->
                       
                        
                     

                </ul>
                <div class="todo-footer">
                    <strong><span class="count-todos"></span></strong> Items Left
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="todolist">
             <h1>Already Done</h1>
                <ul id="done-items" class="list-unstyled">
                    @foreach ($todo_completed as $element)
                    <li>{{ substr($element->todo,0,70) }} {{  strlen($element->todo) < 70 ? '': '...' }}<a href="{{ route('todo.destroy',$element->id) }}"><button class="remove-item btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-remove"></span></button></a></li>
                    @endforeach 
                    
                </ul>
            </div>
        </div>
    </div>
</div>
    </body>
</html>
