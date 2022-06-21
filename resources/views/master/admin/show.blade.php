{{-- @extends('dashboard.parent') --}}
@extends('master.parent')

@section('title',' عرض بيانات الادمن  ')

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
                        <h3 class="card-title">عرض بيانات الادمن</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label for="first_name">الاسم الاول</label>
                                    <input 
                                    value="{{ $admins->first_name }}" 
                                    class="form-control form-control-solid"
                                    disabled />
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="last_name">الاسم الثاني</label>
                                    <input 
                                    value="{{ $admins->last_name }}"                 
                                    class="form-control form-control-solid"
                                    disabled />                 
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="email"> الإيميل</label>
                                    <input 
                                    value="{{ $admins->email}}" 
                                    class="form-control form-control-solid"
                                    disabled />
                                </div>

                                <br>
                                {{-- <div class="row"> --}}
                                {{-- <div class="form-group col-md-4">
                                    <label for="password"> كلمة المرور</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="ادخل كلمة المرور   ">
                                </div> --}}
                            {{-- </div> --}}


                                <div class="form-group col-md-4">
                                    <label for="mobile"> رقم الجوال</label>
                                    <input 
                                    value="{{ $admins->mobile }}" 
                                    class="form-control form-control-solid"
                                    disabled />                       
                                   </div>

                                <div class="form-group col-md-4">
                                    <label for="date_of_birth">  العمر </label>
                                    <input 
                                    value="{{ $admins->age }}"  
                                    class="form-control form-control-solid"
                                    disabled />
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="city_id">اسم المدينة</label>
                                    <select class="form-select form-select-sm" name="city_id" style="width: 100%;"
                                        id="city_id" aria-label=".form-select-sm example">
                                       
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option disabled>

                                        @endforeach

                                    </select>
                                </div>

                            <div class="row">


                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="image">تعديل     صورة شخصية</label>
                                      <input type="file" name="image" class="form-control" id="image"
                                        placeholder=" أضف صورة شخصية">
                                </div>


                            </div>

                        </div>

                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            {{-- <button type="button" onclick="update({{$admins->id}})" class="btn btn-lg btn-success">تعديل</button> --}}
                            <a href="{{route('admins.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة الموظفين </button></a>
                        </div>
                    </form>
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
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

@section('scripts')


{{-- <script>

$('.city_id').select2({
      theme: 'bootstrap4'
    })

    function update(id){

        let formData = new FormData();
            formData.append('first_name',document.getElementById('first_name').value);
            formData.append('last_name',document.getElementById('last_name').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('date_of_birth',document.getElementById('date_of_birth').value);
            formData.append('email',document.getElementById('email').value);
            // formData.append('password',document.getElementById('password').value);
            formData.append('salary_type',document.getElementById('salary_type').value);
            formData.append('salary_value',document.getElementById('salary_value').value);
            formData.append('speciality',document.getElementById('speciality').value);
            formData.append('job_title',document.getElementById('job_title').value);
            formData.append('certification',document.getElementById('certification').value);
            formData.append('city_id',document.getElementById('city_id').value);
            formData.append('image',document.getElementById('image').files[0]);
            formData.append('cv',document.getElementById('cv').files[0]);

            storeRoute('/cms/admin/update_admins/'+id , formData );

    }

</script> --}}


@endsection
