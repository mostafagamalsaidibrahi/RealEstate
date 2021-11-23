@include('actor.actor_header')

@yield('content')

@if(session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>{{session('message')}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
@endif

<div class="head-section">
  <div class="mainImage">
    <div class="cover">
      <br><br><br><br>
      <div class="signup">
        <div class="title text-center">
          <p>Find</p>
        </div>
        <div class="content">
          <div class="forms text-center">
            <form action="/save" method="post">
              {{ csrf_field() }}
              <br><br><br><br>
              <div class="form-group">
                <label>Length:</label>
                <select name="length" id="cars>
                  <option value="length">Length</option>
                    @for($i=50 ; $i<=1000 ; $i++)
                        <option value="{{$i}}">{{ $i }}</option>
                    @endfor
                </select>
                <label>width</label>
                <select name="width" id="cars>
                  <option value="length">Length</option>
                    @for($i=50 ; $i<=1000 ; $i++)
                        <option value="{{$i}}">{{ $i }}</option>
                    @endfor
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Find</button>
            </form>
          </div>
        </div>
        <div class="ending text-center">

        </div>
      </div>
    </div>
  </div>
</div>
@include('actor.actor_footer')
