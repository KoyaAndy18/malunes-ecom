@extends('components.default')

@section('content')
<div class="container pt-3" style="margin-top: 100px;">
    <div class="row justify-content-center">
         <div class="col-md-6">
              <div class="card shadow mt-5">
                  <div class="card-header bg-primary text-white text-center">
                        <h2 class="mb-0">Login</h2>
                  </div>
                  <div class="card-body">

                        <!-- Display Errors -->
                        @if(session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- End Error Display -->

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <div class="d-grid">
                                 <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                  </div>
              </div>
         </div>
    </div>
</div>
@endsection
