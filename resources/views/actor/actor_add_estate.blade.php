@include('actor.actor_header')

@yield('content')
<div class="head-section">
  <div class="mainImage">
    <div class="cover">
      <br><br><br><br>
      <div class="signup">
        <div class="title text-center">
          <p>New</p>
        </div>
        <div class="content">
          <div class="forms text-center">
            <form action="/add" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <select name="type" id="cars">
                  <option value="sale">Sale</option>
                  <option value="rent">Rent</option>
                </select>
              </div>
              <div class="form-group">
                <textarea class="form-control" rows="3" placeholder="Enter Address" name="address"></textarea>
              </div>
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

              <div class="form-group">
                <input type="number" class="form-control" placeholder="Enter Your Mobile" name="contact">
              </div>
              <button type="submit" class="btn btn-primary">Add</button>
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
