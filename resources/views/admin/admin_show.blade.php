@include('admin.admin_header')

@yield('content')
@foreach($newEstate as $obj)

<div class="posts">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <center><h5 class="card-title">For {{ $obj->type }}</h5></center>
      <p class="card-text"><span>Address : </span>{{ $obj->address }}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><span>Time : </span>{{ $obj->time }}</li>
      <li class="list-group-item"><span>Length : </span>{{ $obj->length }}</li>
      <li class="list-group-item"><span>Width : </span>{{ $obj->width }}</li>
      <li class="list-group-item"><span>Area : </span>{{ $obj->area }}</li>
      <li class="list-group-item"><span>Name : MR /  </span>{{ $obj->name }}</li>
    </ul>
    <div class="card-body">
      <p class="phone"><i class="fa fa-phone" aria-hidden="true"></i> {{ $obj->mobile }} </p>
    </div>
    <div class="card-body">
       <a href="/accept/{{ $obj->eId }}" class="btn btn-success">Accept</a>
       <a href="/reject/{{ $obj->eId }}" class="btn btn-danger">Reject</a>
    </div>
  </div>
</div>
@endforeach
@include('actor.actor_footer')
