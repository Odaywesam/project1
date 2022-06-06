@extends('master.parent')
@section('title','Product ')
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
            <h3 class="card-title">Product</h3>
            <div class="card-tools">
                <a href="{{route('products.create')}}"><button type="button" class="btn btn-lg btn-primary"> create Product </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> Products number  </th>
                  <th>   name  </th>
                  <th>   type </th>
                  <th>  mobile  </th>
                  <th>  price  </th>
                  <th>  discription </th>
                  <th>  image </th>
                  <th> Setting </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $Product )
                <tr>
                  <td>{{$Product->id}}</td>
                  {{-- <td>{{$city->who}}</td> --}}
                  {{-- <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('images/city_who/'.$city->image_who)}}" width="60" height="60" alt="User Image">
                  </td> --}}
                  <td>{{$Product->name }}</td>
                  <td>{{$Product->type }}</td>
                  <td>{{$Product->mobile}}</td>
                  <td>{{$Product->price }}</td>
                  <td>{{$Product->discription}}</td>
                  <td>{{$Product->image}}</td>
                  <td>
                    <div class="btn-group">
                      <a href="{{route('products.edit',$Product->id)}}" class="btn btn-info" title="Edit">
                        Edit
                        </a>

                      <a href="#" onclick="performDestroy({{$Product->id}}, this)" class="btn btn-danger" title="Delete">
                        Delete
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">
            {{ $products->links() }}


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
    let url = '/master/admin/products/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


