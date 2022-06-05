@extends('master.parent')

@section('title',' Catigore')
@section('sub-title','edit')

@section('styles')

@endsection

@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
      <div class="row">
          <!-- left column -->
          <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                  <div class="card-header">
                      <h3 class="card-title">Catigore</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                      <div class="card-body">

                      <br>
                      <div class="row">


                            <div class="form-group col-md-6">
                                <label for="name">Catigore name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                   value="{{ $categories->name }}" placeholder="Enter categore name">
                            </div>

                            {{-- <div class="form-group col-md-6">
                                <label for="image">image </label>
                                <input type="file" name="image" class="form-control" id="image"
                                  value="{{ $categories->image }}"  placeholder="">
                            </div> --}}
                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{$categories->id}})" class="btn btn-lg btn-success">Update</button>
                         <a href="{{route('categories.index')}}"><button type="button" class="btn btn-lg btn-primary"> index Categories </button></a>
                      </div>

              </div>
              <!-- /.card -->
          </div>
          <!--/.col (left) -->
      </div>
      <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

  </section>
  <!-- /.content -->

@endsection

@section('scripts')


<script>

    function performUpdate(id){
           let formData = new FormData();
           formData.append('name' , document.getElementById('name').value);
           // formData.append('image' , document.getElementById('image').files[0]);
           storeRoute('/master/admin/update_categories/'+id , formData );
    }
    </script>


@endsection


