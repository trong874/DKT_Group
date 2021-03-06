@extends('layout.default')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }

        .table-wrapper {
            width: 700px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }

        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }

        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }

        .table-title .add-new i {
            margin-right: 4px;
        }

        table.table {
            table-layout: fixed;
        }

        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:last-child {
            width: 100px;
        }

        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }

        table.table td a.add {
            color: #27C46B;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }

        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }

        table.table .form-control.error {
            border-color: #f50000;
        }

        table.table td .add {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function () {
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr><form>' +
                    '<td><input type="text" class="form-control" name="id" id="id" disabled></td>' +
                    '<td><input type="text" class="form-control" name="name" id="name"></td>' +
                    '<td><input type="text" class="form-control" name="email" id="email"></td>' +
                    '<td><input type="text" class="form-control" name="password" id="password"></td>' +
                    '<td style="display: flex">' + actions + '</td>' +
                    '</form></tr>';
                $("table").append(row);
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
            });
            // Add row on add button click
            $(document).on("click", ".add", function () {
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');
                input.each(function () {
                    if (!$(this).val() && $(this).attr('id') !== 'id') {
                        $(this).addClass("error");
                        empty = true;
                    } else {
                        $(this).removeClass("error");
                    }
                });
                $(this).parents("tr").find(".error").first().focus();
                if (!empty) {
                    let data = {};
                    input.each(function () {
                        $(this).parent("td").html($(this).val());
                        let key = $(this).attr('name');
                        data[key] = $(this).val();
                    });
                    if (data.id == '') {
                        $.ajax({
                            url: '/quan-ly-user/store',
                            method:"POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:data,
                            success:function (res) {
                                location.reload()
                            },
                            error:function (res) {
                                console.log(res)
                            }
                        })
                    } else {
                        $.ajax({
                            url: '/quan-ly-user/edit',
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: data,
                            success: function (res) {
                                console.log(res)
                            },
                            error: function (res) {
                                console.log(res)
                            }
                        })
                    }
                }
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").removeAttr("disabled");
            });
            // Edit row on edit button click
            $(document).on("click", ".edit", function () {
                $(this).parents("tr").find("td:not(:last-child)").each(function () {
                    if ($(this).attr('id') === 'id') {
                        $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '" name="' + $(this).attr('id') + '" disabled>');
                    } else {
                        $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '" name="' + $(this).attr('id') + '">');
                    }
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });
            // Delete row on delete button click
            $(document).on("click", ".delete", function () {
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            });
        });
    </script>
<div class="card container">
    <div class="card-body">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div>
                <div class="col-sm-4">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>T??n ng?????i d??ng</th>
                <th>Email</th>
                <th>Password</th>
                <th>Thao t??c</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td id="id">{{$user->id}}</td>
                    <td id="name">{{$user->name}}</td>
                    <td id="email">{{$user->email}}</td>
                    <td id="password">Password</td>
                    <td style="display: flex">
                        <a class="add" title="Add" data-toggle="tooltip"><i class="fas fa-plus-square"></i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
