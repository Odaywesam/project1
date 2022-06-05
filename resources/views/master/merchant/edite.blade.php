    @extends('master.parent')

@section('title',' Merchant')

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
                      <h3 class="card-title">Merchant</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                      <div class="card-body">

                      <br>
                      <div class="row">


                            <div class="form-group col-md-4">
                                <label for="first_name"> first name</label>
                                <input type="text" name="first_name" class="form-control" id="first_name"
                                    value="{{ $merchants->first_name}}" placeholder=" Enter  name ">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="last_name">  last name</label>
                                <input type="text" name="last_name" class="form-control" id="last_name"
                                value="{{ $merchants->last_name}}" placeholder="enter Street name">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="email"> email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                value="{{ $merchants->email}}"   placeholder="enter your email">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="password"> password</label>
                                <input type="text" name="password" class="form-control" id="password"
                                value="{{ $merchants->password}}"  placeholder="enter your password">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="mobile"> mobile</label>
                                <input type="text" name="mobile" class="form-control" id="mobile"
                                value="{{ $merchants->mobile}}"   placeholder="enter your password">
                            </div>


                            <div class="form-group col-md-4">
                                <label for="age"> age</label>
                                <input type="text" name="age" class="form-control" id="age"
                                value="{{ $merchants->age}}"   placeholder="enter age ">
                            </div>


                            <div class="form-group col-md-4">
                                <label for="city_id"> city </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="city_id" id="city_id">
                                    @foreach ($cities as $city )
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                             <div class="form-group col-md-6">
                                <label for="image">  your image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                value="{{ $merchants->image}}}"   placeholder="  enter image">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cv"> cv</label>
                                <input type="file" name="cv" class="form-control" id="cv"
                                value="{{ $merchants->cv}}}"  placeholder="enter your cv">
                            </div>


                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="button" onclick="performUpdate({{$merchants->id}})" class="btn btn-lg btn-success">Update</button>
                       <a href="{{route('merchants.index')}}"><button type="button" class="btn btn-lg btn-primary">  merchants index </button></a>
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
     $('.city_id').select2({
         them:'bootstrap4'
     })

     function performUpdate(id) {
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
        store('/master/admin/update_merchants/'+id,formData);

    }

</script>


@endsection


