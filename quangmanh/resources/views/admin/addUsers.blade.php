@extends('layouts.default')
@section('contents')

    {{csrf_field()}}

                    <form class="form-floating" action="{{URL::to('/addUsers')}}" method="POST" enctype="multipart/form-data" role="form">

                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="panel-body">
                            <label for="">Email:</label>

                            <input type="email" name="mail_address" class="form-control" value="" required="required" title="">
                            @if ($errors->get('mail_address'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('mail_address') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                        @endif
                        </div>
                        <div class="panel-body">
                            <label for="">Mật khẩu:</label>

                            <input type="password" name="password" class="form-control" value="" required="required" title="">
                            @if ($errors->get('password'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('password') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                        @endif
                        </div>

                        <div class="panel-body">
                            <label for="">Nhập lại mật khẩu:</label>

                            <input type="password" name="password_confirm" class="form-control" value="" required="required" title="">
                            @if ($errors->get('password_confirm'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('password_confirm') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                        @endif
                        </div>
                        <div class="panel-body">
                            <label for="">Họ tên:</label>

                            <input type="text" name="name" class="form-control" value="" required="required" title="">
                            @if ($errors->get('name'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('name') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                        @endif
                        </div>
                        <div class="panel-body">
                            <label for="">Địa chỉ:</label>

                            <input type="address" name="address" class="form-control" value="" required="required" title="">
                            @if ($errors->get('address'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('address') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                        @endif
                        </div>
                        <div class="panel-body">
                            <label for="">Số điện thoại:</label>

                            <input type="text" name="phone" class="form-control" value="" required="required" title="">
                            @if ($errors->get('phone'))
                                         <div class="alert alert-danger">
                                        @foreach ($errors->get('phone') as $message)
                                          <label for="floatingInputInvalid">{{$message}}</label>
                                        @endforeach
                                         </div>
                                        @endif
                        </div>
                        <br>
                        <div class="panel-body">
                                <label>lớp</label>
                                <select class="form-control" name="classroom_id" >
                                    @foreach($select as $table)
                                    <option value="{{$table->id}}">{{$table->name}}</option>
                                   @endforeach
                                </select>

                            </div>
                        <br>
                        <div class="panel-body">
                                <label>Quyền :</label>
                                <label class="radio-inline">
                                    <input name="role" value="1" checked="" type="radio">Quản trị viên
                                </label>
                                <label class="radio-inline">
                                    <input name="role" value="2" type="radio">Nhân viên
                                </label>
                            </div>

                            <br>
                        <div class="panel-body">
                            <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </form>





@endsection
