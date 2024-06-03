@extends('layout.view_dashboard')
@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="h3 mb-2 mb-sm-0">Role education</h1>
        </div>
    </div>
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2 mb-2" role="group" aria-label="First group">
            <button class="btn btn-falcon-default btn-sm mr-1 mb-1" data-bs-toggle="modal" data-bs-target="#error-modal"
                type="button">
                <span class="fas fa-plus mr-1" data-fa-transform="shrink-3"></span>Insert
            </button>
        </div>
    </div>
    <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="rounded-top-3 py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel">Add education role</h4>
                    </div>
                    <div class="p-4 pb-0">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label" for="recipient-name">Name:</label>
                                <input class="form-control" id="name_role_education_update" type="text" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="submit_role_education" type="button">submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="error-modal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel">Update role education </h4>
                    </div>
                    <div class="p-4 pb-0">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label" for="recipient-name">name:</label>
                                <input class="form-control" id="updateform" type="text" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button" id="submitupdate">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div id="tableExample" data-list='{"valueNames":["id","name","option"],"page":10,"pagination":true}'>
        <div class="table-responsive scrollbar">
            <table class="table table-bordered table-striped fs--1 mb-0">
                <thead class="bg-200 text-900">
                    <tr>
                        <th class="sort" data-sort="id">id</th>
                        <th class="sort" data-sort="name">Name</th>
                        <th class="sort" data-sort="option">Option</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($education as $key => $item)
                        <tr>
                            <td class="id">{{ ++$key }}</td>
                            <td class="name" id="name{{ $item->id }}">{{ $item->name }}</td>
                            <td class="option">
                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                                        <button onclick="delete_role_education({{ $item->id }})"
                                            class="btn btn-secondary btn-falcon-default btn-sm"
                                            id="delete{{ $item->id }}" type="button"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </div>
                                    <div class="btn-group mb-2 me-2" id="update{{ $item->id }}" role="group"
                                        aria-label="Second group">
                                        <button class="btn btn-secondary btn-falcon-default btn-sm" type="button"
                                            onclick="select_role_education({{ $item->id }})"><i
                                                class="fa-solid fa-pen" data-bs-toggle="modal"
                                                data-bs-target="#error-modal2"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="row align-items-center mt-3">
            <div class="pagination d-none"></div>
            <div class="col">
                <p class="mb-0 fs--1">
                    <span class="d-none d-sm-inline-block" data-list-info="data-list-info"></span>
                    <span class="d-none d-sm-inline-block"> &mdash;</span>
                    <a class="fw-semi-bold" href="#!" data-list-view="*">View all<span
                            class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a
                        class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span
                            class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </p>
            </div>
            <div class="col-auto d-flex"><button class="btn btn-sm btn-primary" type="button"
                    data-list-pagination="prev"><span>Previous</span></button><button
                    class="btn btn-sm btn-primary px-4 ms-2" type="button"
                    data-list-pagination="next"><span>Next</span></button></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>
        
      
        add_role_education();
        submit_education();
        delete_role_education();
        select_role_education();
      

        function add_role_education() {
            $("#submit_role_education").click(function(e) {
                e.preventDefault();
                var name = $("#name_role_education_update").val();
                console.log(name);
                k = localStorage.getItem('token')
                $.ajax({
                    type: "get",
                    url: "/createdroleeducation",
                    data: {
                        rolename: name,
                        rolename: name,
                        token: k
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response);
                        console.log(response.msg);
                        if (response.check == false) {
                            const notyf = new Notyf({
                                duration: 1000,
                                position: {
                                    x: 'right',
                                    y: 'top',
                                },
                                types: [{
                                    type: 'warning',
                                    background: 'blue',
                                    duration: 2000,
                                    dismissible: true
                                }]
                            });
                            notyf.open({
                                type: 'warning',
                                message: '<span style="color:red;" class="mr-2"><i class="fa-solid fa-triangle-exclamation"></i>  ' +
                                    response.msg.rolename + '</span>'

                            })
                        } else {
                            const notyf = new Notyf({
                                duration: 1000,
                                position: {
                                    x: 'right',
                                    y: 'top',
                                },
                                types: [{
                                    type: 'warning',
                                    background: 'blue',
                                    duration: 2000,
                                    dismissible: true
                                }]
                            });
                            notyf.open({
                                type: 'warning',
                                message: "<span style='color:green'><i class='fa-solid fa-circle-check'></i>  Bạn đã thêm loại hình giáo dục thành công</span>"
                            })
                            window.location.reload();
                        }


                    }
                });
            });
        }

        function delete_role_education(id) {
            k = localStorage.getItem('token')
            $.ajax({
                type: "delete",
                url: "/deleteroleeducation",
                data: {
                    'id': id,
                    'token': k
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    if (response.check == true) {
                        const notyf = new Notyf({
                            duration: 1000,
                            position: {
                                x: 'right',
                                y: 'top',
                            },
                            types: [{
                                type: 'warning',
                                background: 'blue',
                                duration: 2000,
                                dismissible: true
                            }]
                        });
                        notyf.open({
                            type: 'warning',
                            message: "<span style='color:green'><i class='fa-solid fa-circle-check'></i>  Bạn đã xóa loại hình khóa học thành công</span>"
                        })
                        window.location.reload();
                    }

                }
            });
        }

        function select_role_education(id) {
            console.log(id);
            $('#error-modal2').modal('show');
            $("#updateform").val($("#name" + id).text())
            $("#submitupdate").attr("name", id);
        }

        function submit_education() {
            $("#submitupdate").click(function(e) {
                e.preventDefault();
                var value = $("#updateform").val();
                var id = $("#submitupdate").attr("name");
                if (value == "") {
                    const notyf = new Notyf({
                        duration: 1000,
                        position: {
                            x: 'right',
                            y: 'top',
                        },
                        types: [{
                            type: 'warning',
                            background: 'blue',
                            duration: 2000,
                            dismissible: true
                        }]
                    });
                    notyf.open({
                        type: 'warning',
                        message: '<span style="color:red;" class="mr-2"><i class="fa-solid fa-triangle-exclamation"></i>  ' +
                            "Vui lòng điền đầy đủ thông tin" + '</span>'

                    })
                } else {
                    k = localStorage.getItem('token')
                    $.ajax({
                        type: "put",
                        url: "/updateroleeducation",
                        data: {
                            rolename: value,
                            token: k,
                            id: id
                        },
                        dataType: "JSON",
                        success: function(response) {
                                const notyf = new Notyf({
                                    duration: 1000,
                                    position: {
                                        x: 'right',
                                        y: 'top',
                                    },
                                    types: [{
                                        type: 'warning',
                                        background: 'blue',
                                        duration: 2000,
                                        dismissible: true
                                    }]
                                });
                                notyf.open({
                                    type: 'warning',
                                    message: "<span style='color:green'><i class='fa-solid fa-circle-check'></i>  Bạn đã update loại hình khóa học thành công</span>"
                                })
                                window.location.reload();
                           
                        }
                    });
                }
            });
        }
    </script>
@endsection
