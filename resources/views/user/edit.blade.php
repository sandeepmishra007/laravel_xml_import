<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit User</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Edit User</h2>
            <form action="{{url('edit')}}" method="Post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="hidden" value="{{$userDetails->id}}" name="id">
                    <input type="text" class="form-control" id="name" value="{{ old('name',$userDetails->name) }}" placeholder="Enter name" name="name">
                    @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" class="form-control" id="lastName" value="{{old('lastName',$userDetails->lastName)}}" placeholder="Enter Last Name" name="lastName">
                    @if($errors->has('lastName'))
                    <div class="error">{{ $errors->first('lastName') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Phone:</label>
                    <input type="text" class="form-control" id="phone" value="{{old('phone',$userDetails->phone)}}" placeholder="Enter phone" name="phone">
                    @if($errors->has('phone'))
                    <div class="error">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <br><a class="btn btn-info" href="{{url('/')}}" >Back to User List </a>
        </div>
    </body>
</html>
