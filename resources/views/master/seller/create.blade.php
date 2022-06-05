    @extends('master.parent')

@section('title',' Seller')

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
                      <h3 class="card-title">Seller</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                      <div class="card-body">

                      <br>
                      <div class="row">


                            <div class="form-group col-md-4">
                                <label for="first_name"> first name</label>
                                <input type="text" name="first_name" class="form-control" id="first_name"
                                     placeholder=" Enter  name ">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="last_name">  last name</label>
                                <input type="text" name="last_name" class="form-control" id="last_name"
                                    placeholder="enter Street name">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="email"> email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="enter your email">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="password"> password</label>
                                <input type="text" name="password" class="form-control" id="password"
                                    placeholder="enter your password">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="mobile"> mobile</label>
                                <input type="text" name="mobile" class="form-control" id="mobile"
                                    placeholder="enter your password">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="age"> age</label>
                                <input type="text" name="age" class="form-control" id="age"
                                    placeholder="enter your age">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="city_id"> city name</label>
                                <select class="form-select form-select-sm" name="city_id" style="width: 100%;"
                                    id="city_id" aria-label=".form-select-sm example">
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>

                                    @endforeach
                                </select>
                            </div>

                             <div class="form-group col-md-6">
                                <label for="image">  your image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                    placeholder="  enter image">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cv"> cv</label>
                                <input type="file" name="cv" class="form-control" id="cv"
                                    placeholder="enter your cv">
                            </div>


                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performStore()" class="btn btn-lg btn-success">SAVE</button>
                         <a href="{{route('sellers.index')}}"><button type="button" class="btn btn-lg btn-primary">  index seller </button></a>
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
            formData.append('first_name',document.getElementById('first_name').value);
            formData.append('last_name',document.getElementById('last_name').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('age',document.getElementById('age').value);
            formData.append('cv',document.getElementById('cv').files[0]);
            formData.append('password',document.getElementById('password').value);
            formData.append('image',document.getElementById('image').files[0]);
            formData.append('city_id',document.getElementById('city_id').value);
        store('/master/admin/sellers',formData);
    }

    

</script>


@endsection


