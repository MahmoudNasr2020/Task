@extends('task.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-4 mb-2 mb-md-0 pills-stacked">
                        <div class="card">
                            <div class="card-body box box-primary">
                                <div class="box-body box-profile" >
                                    <img data-toggle="modal" data-target="#model_item_image"
                                         class="student-show-img profile-user-img img-responsive img-circle"
                                         src="{{ asset('Task/Images/'.$data->photo) }}"
                                         alt="User profile picture"
                                        style="height: 100px;
                                        flex-shrink: 0;
                                        min-width: 100px;
                                        min-height: 100px;
                                        margin: 5px auto;
                                        width: 100px;
                                        padding: 3px;
                                        border: 3px solid #d2d6de;
                                        border-radius: 50%;
                                        display: block;
                                        cursor:pointer">
                                    <h3 class="profile-username text-center">{{ $data->name }}</h3>
                                    <p style="text-align: center;color: red;" id="text_disabled_user">
                                        {{ $data->status  == 'disabled' ? 'This Doctor is Disabled' : '' }}
                                    </p>

                                    <ul class="list-group list-group-unbordered">

                                        <li class="list-group-item listnoback">
                                            <b>الاسم</b> <a class="pull-right text-aqua"
                                                                   style="float:left">{{ $data->name }}</a>
                                        </li>

                                        <li class="list-group-item listnoback">
                                            <b>الايميل</b> <a class="pull-right text-aqua"
                                                                  style="float:left">{{ $data->email }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right content section -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body" style="border-top: 3px solid #a92c2d;">
                                <ul class="nav nav-pills" style="border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;margin-bottom: 29px;">
                                    <li class="nav-item" style="padding-top: 13px !important;padding-bottom: 10px !important;">
                                        <a class="nav-link active" id="base-pill31" href="{{ route('task.user.edit',$data->id) }}"
                                           aria-expanded="true">
                                            تعديل
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="list_view">
                                        <div class="tshadow mb25 bozero" style="border: 1px solid #e7ebf0;">
                                            <h3 class="pagetitleh2" style="background: #f2f2f2;margin: 0;font-size: 16px;padding: 8px 14px;color: #000;
                                            box-shadow: 0 0px 2px rgb(0 0 0 / 20%);
                                            border-bottom: 1px solid #d7dfe3;">التفاصيل العامة</h3>
                                            <div class="table-responsive around10 pt0" style="padding: 10px;padding-top: 0 !important;">
                                                <table class="table table-hover table-striped tmb0 table-student-show" >
                                                    <tbody>
                                                    <tr>
                                                        <td class="col-md-4" >الاسم</td>
                                                        <td class="col-md-5" >{{ $data->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>الايميل</td>
                                                        <td>{{ $data->email }}</td>
                                                    </tr>

                                            

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('Task.pages.Users.components.include.imageShow',['photo'=>$data->photo])
@endsection

