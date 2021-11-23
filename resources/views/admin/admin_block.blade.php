@include('admin.admin_header')

@yield('content')
<div class="retirve">

  <table class="table">
    <thead class="thead-light">
      <tr>
        <th>Fullname</th>
        <th>Username</th>
        <th>type</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($newActor as $obj)
      <tr>
        <td>{{ $obj->fullname }}</td>
        <td>{{ $obj->username }}</td>
        <td>{{ $obj->type }}</td>
        <td> <a href="/block/{{ $obj->uId }}" class="btn btn-danger">Block</a> </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@include('admin.admin_footer')
