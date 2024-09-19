@extends("layouts.front.layout")

@section("content")

    Contact pagedesininz
    <hr>

    <form  class="col-md-6 mx-auto" action="{{route("contactForm")}}" method="POST">

       <input type="text" class="form-control" name="name" id="name" placeholder="your name">
       <input type="text" class="form-control" name="surname" id="surname" placeholder="your surname" >
       <input type="text" class="form-control" name="email" id="email" placeholder="your email">
       <input type="password" class="form-control" name="password" id="password"  placeholder="your password">
       <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"  placeholder="confirmpassword">

        <button class="btn-primary" type="submit">Send Data</button>
        <!-- token yaradir -->
        @csrf

    </form>
@endsection
