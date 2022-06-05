@extends('master.parent')
@section('title','categore ')


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
            <h3 class="card-title">Categore</h3>
            <div class="card-tools">
                <a href="{{route('categories.create')}}"><button type="button" class="btn btn-lg btn-primary">create Categore  </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> Categore Number  </th>
                  <th>  Categore Name  </th>
                  {{-- <th>  Categore image </th> --}}
                  <th> Setting </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $categore )
                <tr>
                  <td>{{$categore->id}}</td>
                  {{-- <td>{{$city->who}}</td> --}}
                  {{-- <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('images/city_who/'.$city->image_who)}}" width="60" height="60" alt="User Image">
                  </td> --}}
                  <td>{{$categore->name}}</td>
                  <td>{{$categore->image}}</td>

                  <td>
                    <div class="btn-group">
                      <a href="{{route('categories.edit',$categore->id)}}" class="btn btn-info" title="Edit">
                        Edit
                        </a>

                      <a href="#" onclick="performDestroy({{$categore->id}}, this)" class="btn btn-danger" title="Delete">
                        Delete
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">

            {{ $categories->links() }}


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
    let url = '/master/admin/categories/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


