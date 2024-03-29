@extends('master.parent')
@section('title','Permission ')


@section('styles')
  <style>

</style>
@endsection

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> index permissions </h3>
            <div class="card-tools">
                <a href="{{route('permissions.create')}}"><button type="button" class="btn btn-lg btn-primary">create new permission </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> role number </th>
                  <th> job name </th>
                  <th>  job type </th>

                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $permission )
                <tr>
                  <td>{{$permission->id}}</td>
                  <td>{{$permission->name}}</td>
                  <td><span class="badge bg-success">{{$permission->guard_name}}</span></td>
                  <td>
                    <div class="btn-group">
                      <a href="{{route('permissions.edit',$permission->id)}}" class="btn btn-info" title="Edit">
                        Edit
                        </a>

                      <a href="#" onclick="performDestroy({{$permission->id}}, this)" class="btn btn-danger" title="Delete">
                        Delete
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">
            {{-- {{ $permissions->links() }} --}}
        </span>

          </div>
          <!-- /.card-body -->
          {{ $permissions->links() }}
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    let url = '/master/admin/permissions/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


