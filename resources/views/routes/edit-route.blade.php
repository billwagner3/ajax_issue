<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<style>
    .btn-block {
        margin: 10px;
    }
    .drag-a-customer {
        list-style-type: none;
    }
    .drag-a-customer .btn {
        text-align: left;
    }
    #customer_list {
        -webkit-padding-start: 0;
    }
    .btn-block i {
        margin-right: 20px;
    }
</style>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-xs-12">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 header-dash  text-dark">Edit Customer </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class=" breadcrumb col float-sm-right right-top">
                            <li class=" header-dash breadcrumb-item  float-sm-right"><a href="#">Home</a></li>
                            <li class="header-dash breadcrumb-item active  float-sm-right">Edit Customer</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
{{ Form::open() }}
<form name="order" class="form-group" method="POST" action="{{ route('update', $id) }}">

    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <h3 class="text-center mb-4">Drag and Drop Customers to Your Choosing</h3>

            <ul id="tablecontents">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                @foreach($customers as $customer)
                    <li  class="row1 drag-a-customer"
                         data-id="{{ $customer->id }}" >
                        <a style="cursor: move;" class="btn btn-outline-primary btn-lg btn-block">
                            <i  class="fa fa-reorder fa-lg" ></i>
                            {{ $customer->name . ' - ' . $customer->address }}
                        </a>

                @endforeach
            </ul>
            <hr>
            <h5>Drag and Drop the table rows and <button id="button" onclick="sendOrderToServer()"  type="submit" class="btn btn-primary  btn-lg" >Save</button> the page.</h5>
        </div>
    </div>
</form>
{{ Form::close() }}
</div>





<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"
        integrity="sha256-tp8VZ4Y9dg702r7D6ynzSavKSwB9zjariSZ4Snurvmw="
        crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<script type="text/javascript">

    $(function() {
        $("#tablecontents").sortable({
            items: "li",
            cursor: 'move',
        });
    });
    function sendOrderToServer() {
        const order = [];
        const token = $('input[name="_token"]').attr('value');
        $('li.row1').each(function (index, element) {
            order.push({
                id: $(this).attr('data-id'),
                position: index + 1
            });
        });
        console.log('first log', order);
        const url = "{{ route('update', $id) }}"
        console.log('this is the url', url);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });
        $.ajax({
            type: "post",
            success: function(order) {
                if (status === 'success'){
                    console.log('AJAX worked', order);
                }
            },
            data: {
                order: order
            },
            cache: false,
            dataType: 'json',
            url: url,
            statusCode: {
                200: function(data) {
                    console.log('data', data);
                }
            }
        });
    }

</script>
</body>
