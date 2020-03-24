<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <title>Hello, world!</title>
    </head>
    <body class="bg-light">
        <div class="container ">
            <div class="row mt-3">
                <div class="col-md-2 mt-2">
                    <p class="h4">My tasks</p>
                </div>
                <div class="col-md-8">
                    <button type="button" class="btn btn-white bg-white btn-lg btn-block"  data-toggle="modal" data-target="#exampleModal">Search</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Роль</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>1</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="otvet">Ответственный</label>
                                        <select id="otvet" placeholder="Ответственный" multiple>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="postan">Постановщик</label>
                                        <select id="postan" placeholder="Постановщик" multiple>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Название</label>
                                        <input type="text" id='nazvanie' class="form-control" id="exampleFormControlInput1" placeholder="Название">
                                    </div>
                                    <div class="form-group">
                                        <label for="stat">Статус</label>
                                        <select id="stat" placeholder="Статус" multiple>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="date">Срок</label>
                                        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id='sub' class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-2">
                    
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-10">
                    <p>ksikdiasd</p>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                <table class="table table-hover bg-white">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Deadline</th>
                        </tr>
                    </thead>
                    <tbody id="table_body">
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->title}}</td>
                                <td>{{$task->deadline}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>

        </div>
            



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>

        
        <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <script>

            $(document).ready(function(){

                var multipleCancelButton = new Choices('#stat', {
                    removeItemButton: true,
                    maxItemCount:5,
                    searchResultLimit:5,
                    renderChoiceLimit:5
                });

                var multipleCancelButton1 = new Choices('#postan', {
                    removeItemButton: true,
                    maxItemCount:5,
                    searchResultLimit:5,
                    renderChoiceLimit:5
                });

                var multipleCancelButton2 = new Choices('#otvet', {
                    removeItemButton: true,
                    maxItemCount:5,
                    searchResultLimit:5,
                    renderChoiceLimit:5
                });
            });
            $(document).ready(function(){
                var date_input=$('input[name="date"]'); //our date input has the name "date"
                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                var options={
                    format: 'mm/dd/yyyy',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                };
                date_input.datepicker(options);
            })
            $('#sub').click(function(e) {
                e.preventDefault(); 
                var role = $('#role').find(':selected').val();
                var otvet = $('#otvet').find(':selected');
                var otvet_res = [];
                for (var i = 0, l = otvet.length; i < l; i++) {
                    otvet_res.push(otvet[i].value);
                };
                var postan = $('#postan').find(':selected');
                var pos_res = [];
                for (var i = 0, l = postan.length; i < l; i++) {
                    pos_res.push(postan[i].value);
                };
                var name = $('#nazvanie').val();
                console.log(name, otvet_res, pos_res);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '',
                    data: {
                        name:name,
                        otvet: otvet_res,
                        postan: pos_res,
                        date: $('#date').val(),
                    },
                    success: function(response) {
                        console.log(response);
                        $('#table_body').empty();
                        for (var i = 0, l = response.length; i < l; i++) {
                            $('#table_body').append("<tr><td>" + response[i].id + "</td>"+"<td>" + response[i].title + "</td>" + "<td>" + response[i].deadline + "</td></tr>")
                        }
                    }
                });
            });
        </script>
    </body>
</html>