@extends('master')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
{{-- Validation --}}
<link rel="stylesheet" href="{{asset('plugins/tooltipster/tooltipster.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@endsection

@section('scripts')
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
{{-- Validation --}}
<script src="{{asset('plugins/validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/tooltipster/tooltipster.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>

<script>
$(document).ready(function () {

    // initialize tooltipster on form input elements
    $('form input').tooltipster({// <-  USE THE PROPER SELECTOR FOR YOUR INPUTs
        trigger: 'custom', // default is 'hover' which is no good here
        onlyOne: false, // allow multiple tips to be open at a time
        position: 'left'  // display the tips to the right of the element
    });

    // initialize validate plugin on the form
    $('#update_price_list_form').validate({
        errorPlacement: function (error, element) {

            var lastError = $(element).data('lastError'),
                    newError = $(error).text();

            $(element).data('lastError', newError);

            if (newError !== '' && newError !== lastError) {
                $(element).tooltipster('content', newError);
                $(element).tooltipster('show');
            }
        },
        success: function (label, element) {
            $(element).tooltipster('hide');
        },
        rules: {
            rname: {required: true, minlength: 3},
            dname: {required: true, minlength: 3}
        },
        messages: {
            rname: {required: "Please enter role name"},
            dname: {required: "Insert role display name"}
        }
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });

    $('input[name="link"]').on('ifClicked', function (event) {
        // alert("You clicked " + this.value);
        if(this.value == '1') {
            $('.desc').hide();
            $('#link1').show();
        }
        else{
           $('.desc').hide();
           $('#link2').show(); 
        }
    });

});

</script>

@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Weather Board<small>update data to be sent</small></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Price List</h3>
                </div><!-- /.box-header -->
                <!-- Form starts here -->
                {!! Form::open(array('url' => 'update_price_list_process', 'id' => 'update_price_list_form', 'class' => 'form-horizontal')) !!}
                <div class="box-body">
                    <div class="col-xs-8">
                        <div class="form-group">
                            <table id="price_list" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item Text</th>
                                        <th>Item Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><input type="text" class="form-control" id="item_text" name="item_text[]" placeholder="Enter item text" value="{{$price_list[0]->text}}"/></td>
                                        <td><input type="text" class="form-control" id="item_price" name="item_price[]" placeholder="Enter item price" value="{{$price_list[0]->price}}"/></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><input type="text" class="form-control" id="item_text" name="item_text[]" placeholder="Enter item text" value="{{$price_list[1]->text}}"/></td>
                                        <td><input type="text" class="form-control" id="item_price" name="item_price[]" placeholder="Enter item price" value="{{$price_list[1]->price}}"/></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><input type="text" class="form-control" id="item_text" name="item_text[]" placeholder="Enter item text" value="{{$price_list[2]->text}}"/></td>
                                        <td><input type="text" class="form-control" id="item_price" name="item_price[]" placeholder="Enter item price" value="{{$price_list[2]->price}}"/></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><input type="text" class="form-control" id="item_text" name="item_text[]" placeholder="Enter item text" value="{{$price_list[3]->text}}"/></td>
                                        <td><input type="text" class="form-control" id="item_price" name="item_price[]" placeholder="Enter item price" value="{{$price_list[3]->price}}"/></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><input type="text" class="form-control" id="item_text" name="item_text[]" placeholder="Enter item text" value="{{$price_list[4]->text}}"/></td>
                                        <td><input type="text" class="form-control" id="item_price" name="item_price[]" placeholder="Enter item price" value="{{$price_list[4]->price}}"/></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td><input type="text" class="form-control" id="item_text" name="item_text[]" placeholder="Enter item text" value="{{$price_list[5]->text}}"/></td>
                                        <td><input type="text" class="form-control" id="item_price" name="item_price[]" placeholder="Enter item price" value="{{$price_list[5]->price}}"/></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td><input type="text" class="form-control" id="item_text" name="item_text[]" placeholder="Enter item text" value="{{$price_list[6]->text}}"/></td>
                                        <td><input type="text" class="form-control" id="item_price" name="item_price[]" placeholder="Enter item price" value="{{$price_list[6]->price}}"/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- form-group -->
                    </div><!-- col-xs-8 -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div><!-- /.box-footer -->
                {!! Form::close() !!}
                <!-- Form ends here -->
            </div><!-- /.box -->
        </div><!-- col-xs-6 -->
        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Ticker Items</h3>
                </div><!-- /.box-header -->
                <!-- Form starts here -->
                {!! Form::open(array('url' => 'update_ticker_text_process', 'id' => 'update_ticker_text_form', 'class' => 'form-horizontal')) !!}
                <div class="box-body">
                    <div class="col-xs-8">
                        <div class="form-group">
                            <table id="price_list" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ticker Text</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><textarea class="form-control" name="ticker_text[]" id="ticker_text" cols="80" rows="2">{{$ticker_list[0]->text}}</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><textarea class="form-control" name="ticker_text[]" id="ticker_text" cols="80" rows="2">{{$ticker_list[1]->text}}</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><textarea class="form-control" name="ticker_text[]" id="ticker_text" cols="80" rows="2">{{$ticker_list[2]->text}}</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><textarea class="form-control" name="ticker_text[]" id="ticker_text" cols="80" rows="2">{{$ticker_list[3]->text}}</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><textarea class="form-control" name="ticker_text[]" id="ticker_text" cols="80" rows="2">{{$ticker_list[4]->text}}</textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div><!-- form-group -->
                    </div><!-- col-xs-8 -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Update</button>
                </div><!-- /.box-footer -->
                {!! Form::close() !!}
                <!-- Form ends here -->
            </div><!-- /.box -->
        </div><!-- col-xs-6 -->
    </div><!-- row -->
    <div class="row">
        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Add Video</h3>
                </div><!-- /.box-header -->
                <!-- Form starts here -->
                {!! Form::open(array('url' => 'update_video_link_process', 'id' => 'update_video_link', 'class' => 'form-horizontal')) !!}
                <div class="box-body">
                    <div class="col-xs-8">
                        <div class="form-group">
                            <input type="radio" name="link" class="minimal" value="1" checked>
                            <label>Youtube link</label>&nbsp;
                            <input type="radio" name="link" class="minimal" value="2">
                            <label>Upload video</label>
                            <br><br>
                            <div id="link1" class="desc">
                                <!-- add link -->
                                <label>Add youtube link</label>
                                <input type="text" class="form-control" placeholder="Enter ..." name="youtube_link" value="{{$video_link[0]->text}}">
                            </div>
                            <br>
                            <div id="link2" class="desc" style="display:none">
                                <!-- upload video -->
                                <label>Upload video</label>
                                <input type="file" name="local_link">
                            </div>
                        </div>
                    </div><!-- col-xs-8 -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-warning pull-right">Update</button>
                </div><!-- /.box-footer -->
                {!! Form::close() !!}
                <!-- Form ends here -->
            </div><!-- /.box -->
            
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

