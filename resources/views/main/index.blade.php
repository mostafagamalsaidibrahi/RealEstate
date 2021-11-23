@include('main.header')

@yield('content')
<br><br><br><br><br><br>
<div class="signup">
  <div class="title text-center">
    <p>signUp</p>
  </div>
  <div class="content">
    <br>
    <div class="forms text-center">
      <form action="/" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter fullname" name="fullname">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter username" name="username">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Enter password gratter then 7 letter" name="password">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Re-enter password" name="repassword">
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </form>
    </div>
  </div>
  <div class="ending text-center">
    <p><a href="/login"> for login click here </a></p>
  </div>
</div>
