@extends('../index')
@section('content')
  <main>
    <div class="row">

      <div class="col-6 mx-auto py-4 order-md-last">
          <div class="card">
              <div class="card-body">
                  <h2>Register</h2>
              <form action="/register" method="post">
                  @csrf
                  <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="name">

    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">

    </div>
     <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    </form>

              </div>
          </div>

      </div>

    </div>
  </main>
@stop
