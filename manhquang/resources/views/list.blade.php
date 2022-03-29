@extends('layouts.default')
@section('contents')




</br>
    <h4 style="margin-left: 15px;">STT {{ $item->firstItem() }} -> {{ $item->lastItem() }}</h4>

            <form action=""  role="search">
                <div class="panel-body">
                    <input type="text" name="key" class="form-control" id="" placeholder="Tìm kiếm user">

                    <button type="submit" style="margin-top: 5px;" class="btn btn-primary">Tìm kiếm</button>
                </div>



            </form>

            @if(session()->has('success'))
          <div class="alert alert-success">
          {{ session()->get('success') }}
         </div>
           @endif
      <div class="panel panel-primary">

            <div class="panel-body">


    <table class="table table-hover">
        <thead >
            <tr align="center">
                <th>STT</th>
                <th>Email</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>

            </tr>
        </thead>
        <tbody>
        <?php $i = 0; $arrange =  $item->firstItem(); ?>
            @foreach($item as $table)
            <tr class="odd gcradeX">
                <td> {{ $arrange + $i }}
                    <?php $i++; ?></td>
                <td>{{$table->mail_address}}</td>
                <td>{!!\App\Helpers\fecade::toUpperCase($table->name)   !!}</td>
                <td>{{$table->address}}</td>
                <td>{{$table->phone}}</td>


            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="form-group">

        <button ><a href="register">Thêm</a></button>
    </div>
    {{ $item->render() }}
</div>
</div>











 @endsection
