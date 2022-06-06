@extends('master.parent')

@section('title',' Roles')

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
                        <h3 class="card-title">edit roles</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label for="guard_name">نوع الدبلومة</label>
                                    <select class="form-select form-select-sm" name="guard_name" style="width: 100%;"
                                        id="guard_name" aria-label=".form-select-sm example">
                                        <option value="admin" @if($roles->guard_name == 'admin') selected @endif>الأدمن</option>
                                        <option value="web" @if($roles->guard_name == 'web') selected @endif>المستخدم</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="name">Role </label>
                                    <input type="text" name="name" class="form-control" id="name"
                                       value="{{ $roles->name }}" placeholder="enter role">
                                </div>


                        </div>

                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="performUpdate({{ $roles->id }})" class="btn btn-lg btn-success">update</button>
                            <a href="{{route('roles.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                     cancel </button></a>
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
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

@section('scripts')


<script>

$('.guard_name').select2({
      theme: 'bootstrap4'
    })


    function performUpdate(id) {
        let formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('guard_name', document.getElementById('guard_name').value);

        storeRoute('/master/admin/update_roles/' + id, formData);
    }


</script>

@endsection
