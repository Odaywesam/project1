@extends('master.parent')
@section('title','Merchant ')
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
            <h3 class="card-title">Merchant</h3>
            <div class="card-tools">
                <a href="{{route('merchants.create')}}"><button type="button" class="btn btn-lg btn-primary"> create merchant </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> merchants number  </th>
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
                @foreach ($merchants as $merchant )
                <tr>
                  <td>{{$merchant->id}}</td>
                  {{-- <td>{{$city->who}}</td> --}}
                  {{-- <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('images/city_who/'.$city->image_who)}}" width="60" height="60" alt="User Image">
                  </td> --}}
                  <td>{{$merchant->first_name }}</td>
                  <td>{{$merchant->last_name }}</td>
                  <td>{{$merchant->email}}</td>
                  <td>{{$merchant->mobile }}</td>
                  <td>{{$merchant->age}}</td>
                  <td>{{$merchant->image}}</td>
                  <td>
                    <div class="btn-group">
                      <a href="{{route('merchants.edit',$merchant->id)}}" class="btn btn-info" title="Edit">
                        Edit
                        </a>

                      <a href="#" onclick="performDestroy({{$merchant->id}}, this)" class="btn btn-danger" title="Delete">
                        Delete
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">
            {{ $merchants->links() }}


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
    let url = '/master/admin/merchants/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


