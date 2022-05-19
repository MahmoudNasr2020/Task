@extends('Task.layouts.app')
@section('header_line')
    <li class="breadcrumb-item">المستخدمين</li>
    <li class="breadcrumb-item">اضافة مستخدم</li>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12 basic-info">
                <div class="card">
                    <div class="card-header">
                        <h5><i style="margin-left: 6px;color: darkred;" class="fa fa-user"></i>إضافة مستخدم جديد</h5>
                    </div>
                    <div class="card-body">
                        <form id="add_member" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الاسم
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="name" class="form-control" placeholder="ادخل الاسم" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>البريد الالكتروني
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" name="email" class="form-control" placeholder="ادخل البريد الالكتروني" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>كلمة السر
                                                <span class="text-danger"> * </span>
                                            </label>
                                            <input type="password" name="password" class="form-control" value=""  placeholder="ادخل كلمة السر" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>تاكيد كلمة السر
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="password" name="password_confirmation" class="form-control" value="" placeholder="تاكيد كلمة السر" />
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>الصورة
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div></div>
                                            <div class="custom-file">
                                                <div class="image-upload">
                                                    <label for="file-input">
                                                        <img id="previewImg" src="{{ asset('Dashboard/assets/images/image-upload-icon.jpg') }}" style="width: 100px; height: 100px;cursor: pointer" />
                                                    </label>
                                                    <input id="file-input" type="file" style="display: none;" name="image" />
                                                    <div  style="margin-top: 5px;display: inline-block;">
                                                        <a href="#" data-toggle="modal" data-target="#model_item_image">
                                                            <img id="show_image" src="#" style="width: 48px;height: 48px;object-fit: cover;border-radius: 50%;display: none" class="" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="submit_button" class="btn btn-primary mr-2">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@include('Task.pages.Users.components.include.imageModal')
@endsection


@section('script')
    @include('Task.pages.Users.components.extends.ajax.add')

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image').attr('src', e.target.result).css('display','inline-block');
                    $('#image_modal').attr('src', e.target.result);

                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file-input").change(function(){
            readURL(this);
        });
        $('input').attr('autocomplete','off');
    </script>
@endsection
