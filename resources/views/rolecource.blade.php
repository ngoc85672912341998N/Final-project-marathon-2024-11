@extends('layout.view_dashboard')
@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="h3 mb-2 mb-sm-0">Role course</h1>
        </div>
    </div>

    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
            <button class="btn btn-falcon-default btn-sm me-1 mb-1" data-bs-toggle="modal" data-bs-target="#error-modal"
                type="button">
                <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Insert
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
                    <div class="rounded-top-3 py-3 ps-4 pe-6 bg-body-tertiary">
                        <h4 class="mb-1" id="modalExampleDemoLabel">Add a new value update </h4>
                    </div>
                    <div class="p-4 pb-0">
                        <form>
                            <div class="mb-3">
                                <label class="col-form-label" for="recipient-name">Role course:</label>
                                <input class="form-control" id="name_role_course" type="text" />
                            </div>
                            <div class="mb-3">
                                <label for="organizerSingle">Role education</label><select id="option_role_education"
                                    class="form-select js-choice" size="1" name="organizerSingle"
                                    data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Select organizer...</option>
                                    @foreach ($role_education as $key => $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button" id="submit_name_role_course">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div id="tableExample"
        data-list='{"valueNames":["id","Name","Created at","Updated at","Option"],"page":10,"pagination":true}'>
        <div class="table-responsive scrollbar">
            <table class="table table-bordered table-striped fs-10 mb-0">
                <thead class="bg-200">
                    <tr>
                        <th class="text-900 sort" data-sort="name">id</th>
                        <th class="text-900 sort" data-sort="Name">Name</th>
                        <th class="text-900 sort" data-sort="Role Name">Role Name</th>
                        <th class="text-900 sort" data-sort="Created at">Created at</th>
                        <th class="text-900 sort" data-sort="Updated at">Updated at</th>
                        <th class="text-900 sort" data-sort="Option">Option</th>
                    </tr>
                </thead>
                <tbody class="list">


                    @foreach ($roles_course as $key => $item)
                        <tr>
                            <td class="id">{{ ++$key }}</td>
                            <td class="name" id="name{{ $item->id }}">{{ $item->name }}</td>
                            <td class="Role Name">{{ $item->rolename }}</td>
                            <td class="Created at">{{ $item->created_at }}</td>
                            <td class="Updated at">{{ $item->updated_at }}</td>
                            <td class="Option">
                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                                        <button class="btn btn-secondary btn-falcon-default btn-sm"
                                            id="delete{{ $item->id }}" onclick="delete_role({{ $item->id }})"
                                            type="button"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                    <div class="btn-group mb-2 me-2" id="update{{ $item->id }}" role="group"
                                        aria-label="Second group">
                                        <button class="btn btn-secondary btn-falcon-default btn-sm"
                                            onclick="select_role_course({{ $item->id }})" id="select_role{{ $item->id }}"
                                            type="button"><i class="fa-solid fa-pen" data-bs-toggle="modal"
                                                data-bs-target="#error-modal21"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <div class="modal fade" id="error-modal21" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                            <div class="modal-content position-relative">
                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0">
                                    <div class="rounded-top-3 py-3 ps-4 pe-6 bg-body-tertiary">
                                        <h4 class="mb-1" id="modalExampleDemoLabel">Update a new role </h4>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <form>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Role course:</label>
                                                <input class="form-control" id="name_update_role_course"
                                                    type="text" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="organizerSingle">Role education</label><select
                                                    id="option_role_education_update" class="form-select js-choice"
                                                    size="1" name="organizerSingle"
                                                    data-options='{"removeItemButton":true,"placeholder":true}'>
                                                    <option value="">Select organizer...</option>
                                                    @foreach ($role_education as $key => $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="button" id="submit_update">Submit </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </tbody>
            </table>
        </div>
        <div class="row align-items-center mt-3">
            <div class="pagination d-none"></div>
            <div class="col">
                <p class="mb-0 fs-10">
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
        $(document).ready(function() {
            insert_name_course();
            delete_role();
            update_role_course();
            select_role_course();
            
        });

        function insert_name_course() {
            $("#submit_name_role_course").click(function(e) {
                e.preventDefault();
                var role_course = $("#name_role_course").val();
                var id_roles = $("#option_role_education").find(":selected").val();
                var token = localStorage.getItem('token')
                if (role_course == "") {
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
                        message: 'Vui lòng điền đầy đủ thông tin'
                    })
                } else {
                    console.log(role_course);
                    console.log(id_roles);
                    $.ajax({
                        type: "post",
                        url: "/createdrolecourse",
                        data: {
                            rolename: role_course,
                            id_education: id_roles,
                            token: token
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
                                    type: 'success',
                                    message: 'Thêm loại khóa học thành công'
                                })
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        }

        function delete_role(id) {
            var token = localStorage.getItem('token')
            console.log(id);
            $.ajax({
                type: "delete",
                url: "/deleterolecourse",
                data: {
                    token: token,
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
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
                            type: 'success',
                            message: '<span style="color:red">xóa loại khóa học thành công</span>'
                        })
                        window.location.reload();
                    }
                }
            });
        }

        function update_role_course() {
            $("#submit_update").click(function(e) {
                e.preventDefault();
                var name = $("#name_update_role_course").val();
                var idrolename=$("#submit_update").attr("name");
                console.log(idrolename);
                var selected = $("#option_role_education_update").find(":selected").val();
                var token = localStorage.getItem('token')
                if (name == "") {
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
                        type: 'success',
                        message: 'vui lòng điền đầy đủ thông tin loại khóa học'
                    })

                } else {
                    $.ajax({
                        type: "put",
                        url: "/updaterolecourse",
                        data: {
                            token: token,
                            id_education: selected,
                            rolename: name,
                            idrolename:idrolename
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
                                type: 'success',
                                message: 'update loại khóa học thành công'
                            })
                            window.location.reload();
                        }
                    });
                }
            });
        }

       

        function select_role_course(id) {
            $("#select_role"+id).click(function(e) {
                e.preventDefault();
                $('#error-modal21').modal('show');
                $("#submit_update").attr("name", id);
                var name_role_current = $("#name" + id).text();
                var name = $("#name_update_role_course").val(name_role_current);
            });
        }
    </script>
@endsection
