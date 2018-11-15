<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif

     <h2>User</h2>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th colspan="2">Action</th>
        <th><a href="/" class="btn btn-default">Home</a></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($passports as $passport)
      <tr>
        <td>{{ $passport->id }}</td>
        <td>{{ $passport->name }}</td>
        <td>{{ $passport->date }}</td>
        <td>{{ $passport->email }}</td>
        <td>{{ $passport->number }}</td>
        
        
        <td><a href="{{action('PassportController@edit', $passport['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('PassportController@destroy', $passport['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <hr>
  <div>
  <a href="/passports/create" class="btn btn-primary">Add</a>
  </div>
  </div>
  </body>
</html>