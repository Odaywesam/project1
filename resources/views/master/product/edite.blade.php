    @extends('master.parent')

@section('title',' Product')

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
                      <h3 class="card-title">Product</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                      <div class="card-body">

                      <br>
                      <div class="row">


                            <div class="form-group col-md-4">
                                <label for="name">name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ $Products->name}}" placeholder=" Enter  name ">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="type">  type </label>
                                <input type="text" name="type" class="form-control" id="type"
                                value="{{ $Products->type}}" placeholder="enter type ">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="mobile"> mobile</label>
                                <input type="text" name="mobile" class="form-control" id="mobile"
                                value="{{ $Products->mobile}}"   placeholder="enter your password">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="price"> price</label>
                                <input type="text" name="price" class="form-control" id="price"
                                value="{{ $Products->price}}"  placeholder="enter price ">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="discription"> discription</label>
                                <input type="text" name="mobile" class="form-control" id="discription"
                                value="{{ $Products->discription}}"   placeholder="enter  discription">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">  your image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                value="{{ $Products->image}}}"   placeholder="  enter image">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="categore_id"> categore</label>
                                <select class="form-select form-select-sm" name="categore_id" style="width: 100%;"
                                    id="categore_id" aria-label=".form-select-sm example">
                                    @foreach ($categores as $categore)
                                    <option value="{{ $categore->id }}">{{ $categore->name }}</option>
                                
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="seller_id"> seller</label>
                                <select class="form-select form-select-sm" name="seller_id" style="width: 100%;"
                                    id="seller_id" aria-label=".form-select-sm example">
                                    @foreach ($sellers as $seller)
                                    <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                
                                    @endforeach
                                </select>
                            </div>

                             

                            


                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate(id)" class="btn btn-lg btn-success">SAVE</button>
                         <a href="{{route('products.index')}}"><button type="button" class="btn btn-lg btn-primary">  index Products </button></a>
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
           formData.append('name',document.getElementById('name').value);
            formData.append('type',document.getElementById('type').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('price',document.getElementById('price').value);
            formData.append('discription',document.getElementById('discription').value);
            formData.append('image',document.getElementById('image').files[0]);
            formData.append('categore_id',document.getElementById('categore_id').value);
            formData.append('seller_id',document.getElementById('seller_id').value);
        store('/master/admin/update_products/'+id,formData);

    }

</script>


@endsection


