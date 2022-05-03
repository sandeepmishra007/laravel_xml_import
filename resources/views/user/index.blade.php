<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h3>User List</h3>



            <form class="border border-success" action="{{ route('xml-upload') }}" id="frm-create-course" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row" >
                    <div class="form-group col-md-9">
                        <label for="user_file">Select XML File:</label>
                        <input type="file" class="form-control" required id="user_file" name="user_file" accept="text/xml">
                    </div>
                    <div class="col-md-3" style="margin: 23px 0px 0px 0px !important;">
                        <button type="submit" class="btn btn-primary" id="submit-post">Submit</button>
                    </div>
                </div>
            </form>


            <a class="btn btn-success" href="{{url('add')}}" >Add User </a>


            @if(session()->has('error_message'))
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('error_message') }}
            </div>
            @endif
            @if(session()->has('success_message'))

            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('success_message') }}
            </div>
            @endif
            <br>
            <div class="table-responsive">          
                <table class="table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Lastname</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userList as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastName}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                <a class="btn btn-info" href="/edit/{{$user->id}}">Edit</a>
                                <a class="btn btn-danger" href="/delete/{{$user->id}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>
