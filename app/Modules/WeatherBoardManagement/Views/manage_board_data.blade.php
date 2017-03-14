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
    $('#roles_form').validate({
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
});



</script>

<script>
    $(document).ready(function () {

        // $('#roles_list').DataTable({
        //     "paging": false,
        //     "lengthChange": false,
        //     "searching": false,
        //     "ordering": true,
        //     "info": true,
        //     "autoWidth": false,
        //     "processing": true,
        //     "serverSide": true,
        //     "ajax": "{{URL::to('/getroles')}}",
        //     "columns": [
        //         {"data": "id"},
        //         {"data": "name"},
        //         {"data": "display_name"},
        //         {"data": "description"},
        //         {"data": "Link", name: 'link', orderable: false, searchable: false}
        //     ],
        //     "order": [[1, 'asc']]
        // });

    });
</script>

@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Roles<small>all roles assigned</small></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Price List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="roles_list" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- col-xs-6 -->
    </div><!-- row -->
</section>
<!-- /.content -->

@endsection

