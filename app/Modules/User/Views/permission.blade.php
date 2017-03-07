@extends('master')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('plugins/tooltipster/tooltipster.css')}}">
@endsection

@section('scripts')
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script src="{{asset('plugins/validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/tooltipster/tooltipster.js')}}"></script>

<script>
    $(document).ready(function () {

        // initialize tooltipster on form input elements
        $('form input').tooltipster({// <-  USE THE PROPER SELECTOR FOR YOUR INPUTs
            trigger: 'custom', // default is 'hover' which is no good here
            onlyOne: false, // allow multiple tips to be open at a time
            position: 'left'  // display the tips to the right of the element
        });

        // initialize validate plugin on the form
        $('#permissions_form').validate({
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
                pname: {required: true, minlength: 3},
                dname: {required: true, minlength: 3}
            },
            messages: {
                pname: {required: "Enter permission name"},
                dname: {required: "Insert display name"}
            }
        });
    });

 

</script>

<script>
    $(document).ready(function () {        
        $('#permissions_list').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "ajax": "{{URL::to('/getpermissions')}}",
            "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "display_name"},                    
                    {"data": "description"},                    
                    {"data": "Link", name: 'link', orderable: false, searchable: false}
                ],
            "order": [[1, 'asc']]
        });
    });
</script>

@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Permissions<small>all permissions assigned</small></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Roles</h3>
                </div>
                <!-- /.box-header -->
                <!-- form starts here -->

                {!! Form::open(array('url' => 'permission_add_process', 'class' => 'form-horizontal', 'id' => 'permissions_form')) !!}
                <div class="box-body">

                    <div class="form-group">
                        <label for="pname" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="rname" name="pname"  placeholder="Enter permission name">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="dname" class="col-sm-3 control-label">Display Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="dname" name="dname" placeholder="Enter display name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter description..."></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right" id="submit-btn">Submit</button>
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
                <!-- /.form ends here -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="permissions_list" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <!-- column -->
    </div>
    <!-- row -->

</section>
<!-- /.content -->

@endsection

