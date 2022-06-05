    @extends('master.parent')

@section('title',' City')

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
                                <label for="name"> City name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                     placeholder=" Enter city name ">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="street">  Street name</label>
                                <input type="text" name="street" class="form-control" id="street"
                                    placeholder="enter Street name">
                            </div>
                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performStore()" class="btn btn-lg btn-success">SAVE</button>
                         <a href="{{route('cities.index')}}"><button type="button" class="btn btn-lg btn-primary">  index city </button></a>
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

     function performStore() {
        let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('street',document.getElementById('street').value);
        store('/master/admin/cities',formData);

    }

</script>


@endsection


