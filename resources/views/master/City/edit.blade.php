@extends('master.parent')

@section('title',' City')
@section('sub-title',' edite')

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
                      <h3 class="card-title">city</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->


                      <div class="card-body">

                      <br>
                      <div class="row">


                            <div class="form-group col-md-6">
                                <label for="name">City name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                   value="{{ $cities->name }}" placeholder="Enter City name">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="street">Street name</label>
                                <input type="text" name="street" class="form-control" id="street"
                                  value="{{ $cities->street }}"  placeholder="Enter Street name">
                            </div>
                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{$cities->id}})" class="btn btn-lg btn-success">Update</button>
                         <a href="{{route('cities.index')}}"><button type="button" class="btn btn-lg btn-primary">  city index </button></a>
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
    formData.append('street' , document.getElementById('street').value);
    storeRoute('/master/admin/update_cities/'+id , formData);
    }
</script>


@endsection


