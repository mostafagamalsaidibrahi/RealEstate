@include('main.header')

@yield('content')
<br><br><br><br><br><br>
<div class="signup">
  <div class="title text-center">
    <p>Login</p>
  </div>
  <div class="content">
    <br><br><br>
    <div class="forms text-center">
      <form action="/login" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter username" name="username">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Enter password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
  <div class="ending text-center">
    <p><a href="/"> signUp click here </a></p>
  </div>
</div>
