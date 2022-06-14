@extends('../index')
@section('content')
  <main>

    <div class="row ">

      <div class="col-6 mx-auto py-4 order-md-last">
          <div class="card">
              <div class="card-body">
              @if(Session::has('error_message'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error_message')}}
                </div>
                @endif
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message')}}
                </div>
                @endif
                  <h2>Login</h2>
              <form action="/login" method="post">
                @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

              </div>
          </div>

      </div>

    </div>
  </main>
@stop

