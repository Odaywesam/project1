@extends('master.parent')
@section('title','Employee ')
@section('sub-title','index ')


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
            <h3 class="card-title">Employee</h3>
            <div class="card-tools">
                <a href="{{route('employees.create')}}"><button type="button" class="btn btn-lg btn-primary">create employee  </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> Employee number  </th>
                  <th>  first name  </th>
                  <th>  last name </th>
                  <th>  email  </th>
                  <th>  mobile  </th>
                  <th>  age </th>
                  <th>  image </th>
                  <th> Setting </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employees as $employee )
                <tr>
                  <td>{{$employee->id}}</td>
                  {{-- <td>{{$city->who}}</td> --}}
                  {{-- <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('images/city_who/'.$city->image_who)}}" width="60" height="60" alt="User Image">
                  </td> --}}
                  <td>{{$employee->first_name }}</td>
                  <td>{{$employeelast_name }}</td>
                  <td>{{$employee->email}}</td>
                  <td>{{$employee->mobile}}</td>
                  <td>{{$employee->age}}</td>
                  <td>{{$employee->image}}</td>
                  <td>
                    <div class="btn-group">
                      <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-info" title="Edit">
                        Edit
                        </a>

                      <a href="#" onclick="performDestroy({{$employee->id}}, this)" class="btn btn-danger" title="Delete">
                        Delete
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">
            {{ $employees->links() }}


          </div>
          <!-- /.card-body -->

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
    let url = '/master/admin/employees/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


