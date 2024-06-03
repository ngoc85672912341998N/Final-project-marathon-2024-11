@extends('layout.view_dashboard')
@section('content')
    <style>
        #dynamic-form {
            background-color: #fff;
            border-radius: 8px;


            width: 350px;
        }

        body {
            line-height: 1.5;
            /* Độ dãn dòng là 1.5 */
        }

        input[type="text"] {
            width: calc(50% - 22px);
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
            margin-right: 10px;
            margin-bottom: 10px;
            margin-top: 3px;
            /* Cách giữa input và label */
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #007bff;
        }

        .remove-btn {
            background-color: #dc3545;
            margin-top: 10px;
            margin-left: 10px;
        }

        .remove-btn:hover {
            background-color: #c82333;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
            display: none;
            margin-top: 3px;
            /* Cách 3px với các phần tử phía trên */
        }

        /* Tinh chỉnh CSS cho input */
        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-size: 16px;
            outline: none;
        }

        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 200px;
            max-height: 600px;
        }

        .ck-content .image {
            /* Block images */
            max-width: 80%;
            line-height: 1.5;
            /* Độ dãn dòng là 1.5 */
        }

        .ck-editor__editable[role="textbox"] {
            line-height: 1.5;
            /* Thiết lập độ dãn dòng là 1.5 */
        }
    </style>
    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="h3 mb-2 mb-sm-0">Upload Course</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            {{-- hình ảnh upload --}}
            <label for="">
                Thumnail khóa học :
            </label>
            <div class="dropzone dropzone-single p-0" data-dropzone="data-dropzone"
                data-options='{"url":"valid/url","maxFiles":2,"dictDefaultMessage":"Choose or Drop a file here"}'>
                <div class="fallback"><input type="file" name="file" /></div>
                <div class="dz-preview dz-preview-single">
                    <div class="dz-preview-cover dz-complete"><img id="thumnail_course" class="dz-preview-img"
                            src="" alt="..." data-dz-thumbnail="" /><a class="dz-remove text-danger"
                            href="#!" data-dz-remove="data-dz-remove"><span class="fas fa-times"></span></a>
                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                        <div class="dz-errormessage m-1"><span data-dz-errormessage="data-dz-errormessage"></span></div>
                    </div>
                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                </div>
                <div class="dz-message" data-dz-message="data-dz-message">
                    <div class="dz-message-text"><img class="me-2" src="../../../assets/img/icons/cloud-upload.svg"
                            width="25" alt="" />Drop your file here</div>
                </div>
            </div>
        </div>
        <div class="col-9">
            {{-- course choice --}}
            <label for="" class="mt-4">
                Loại khóa học :
            </label>
            <select id="role_course" class="form-select" aria-label="Default select example">
                <option selected="" value="">Open this select menu</option>
                @foreach ($role_course as $key => $item)
                    <option value={{ $item->id }}>{{ $item->name }}-{{ $item->rolename }}</option>
                @endforeach
            </select>


            <label for="" class="mt-4">
                Tên khóa học :
            </label>
            <input id="name_course" type="email" class="form-control" id="exampleFormControlInput1"
                placeholder="Tên khóa học">
            {{-- price --}}
            <label for="" class="mt-4">
                Giá khóa học :
            </label>
            <input id="price_course" class="form-control" id="currencyInputmask"
                data-input-mask='{"alias":"decimal","digits":2,"rightAlign":false,"max":999999999.99,"jitMasking":false,"prefix":"đ","mask":"9.999.999"}'
                placeholder="100000đ" type="text" />

            {{-- mô tả khóa học --}}
            <label for="" class="mt-4">
                Mô tả khóa học :
            </label>
            <div id="container">
                <div style="line-height: 1.5px" class="editor">
                </div>
            </div>


            {{-- thời gian bắt đầu khóa học --}}
            <label for="" class="mt-4">
                Thời gian khóa học :
            </label>
            <input id="calature" class="form-control datetimepicker" id="timepicker2" type="datetime-local"
                placeholder="dd/mm/yy to dd/mm/yy"
                data-options='{"mode":"range","dateFormat":"d/m/y","disableMobile":true}' />

            {{-- thời gian bắt đầu khóa học --}}
            <label for="" class="mt-4">
                Thời gian học trong tuần :
            </label>

            <select id="day_course" multiple>
                <option value="apple">Thứ 2</option>
                <option value="banana">Thứ 3</option>
                <option value="orange">Thứ 4</option>
                <option value="grape">Thứ 5</option>
                <option value="melon">Thứ 6</option>
                <option value="melon">Thứ 7</option>
                <option value="melon">Chủ Nhật</option>
            </select>

            <div class="row">
                <div class="col">
                    <label for="" class="mt-4">
                        Khung giờ bắt đầu học :
                    </label>
                    <input type="datetime-local" class="form-control datetimepicker" id="startTime" type="text"
                        placeholder="H:i"
                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' />
                </div>
                <div class="col">
                    <label for="" class="mt-4">
                        Khung giờ kết thúc học :
                    </label>
                    <input type="datetime-local" class="form-control datetimepicker" id="hour_corse_end" type="text"
                        placeholder="H:i"
                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' />
                </div>
            </div>



            {{-- Số lượng trong khóa học --}}
            <label for="" class="mt-4 mb-3">
                Số lượng học sinh trong khóa học :
            </label>
            <div class="mb-3" data-nouislider="data-nouislider"></div>

            <div class="col" id="module_course">
                <label for="" class="mt-4">
                    Title module khóa học :
                </label>
                <input type="text" id="title_module" class="title_module">
                <label for="" class="mt-4">
                    Mô tả module khóa học :
                </label>
                <div style="line-height: 1.5px" class="editor2 mb-2">
                </div>
                <div class="mb-2"></div>
            </div>
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                    <button type="submit" class="btn btn-success mt-3" id="insert_module">Thêm module khóa học</button>
                </div>
                <div class="btn-group mb-2 me-2" role="group" aria-label="Second group">
                    <button type="submit" class="btn btn-success mt-3" id="submit_insert">Thêm khóa học</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var mySelect = new Choices('#day_course', {
                removeItemButton: true,
                placeholder: true,
                placeholderValue: 'Select options',
                searchPlaceholderValue: 'Search',
            });
        });
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://prium.github.io/falcon/v3.20.0/vendors/inputmask/inputmask.min.js"></script>
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <!-- Boxicons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/super-build/ckeditor.js"></script>

    <script>
        var count_local2 = localStorage.getItem('count_modal');
        if (!count_local2) {
            console.log("bắt đầu thêm khóa học");
        } else {
            for (let index = 0; index < count_local2; index++) {
                localStorage.removeItem("savedContent" + index)
                localStorage.removeItem("count_modal")
            }
        }

        flatpickr("input[type='datetime-local']", {
            mode: "range",
            minDate: "today",
            dateFormat: "d-m-Y"
        });
        flatpickr("#startTime", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            onClose: function(selectedDates, dateStr, instance) {
                const endInstance = instance.config._input[1]._flatpickr;
                endInstance.set("minTime", dateStr);
            }
        });

        flatpickr("#hour_corse_end", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            onClose: function(selectedDates, dateStr, instance) {
                const endInstance = instance.config._input[1]._flatpickr;
                endInstance.set("minTime", dateStr);
            }
        });

        function removePoweredBy() {
            var poweredByElement = document.querySelector('.ck-powered-by');
            if (poweredByElement) {
                poweredByElement.parentNode.removeChild(poweredByElement);
            } else {
                setTimeout(removePoweredBy, 100); // Thử lại sau mỗi 100ms nếu class name chưa xuất hiện
            }
        }

        // Bắt đầu chờ đợi
        removePoweredBy();



        function created_element(element_name, i, k) {
            CKEDITOR.ClassicEditor
                .create(document.getElementsByClassName(element_name)[i], {
                    toolbar: {
                        items: [
                            'exportPDF', 'exportWord', '|',

                            'findAndReplace', 'selectAll', '|',
                            'heading', '|',
                            'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                            'removeFormat', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'undo', 'redo',
                            '-',
                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                            'alignment', '|',
                            'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock',
                            'htmlEmbed',
                            '|',
                            'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                            'textPartLanguage', '|',
                            'sourceEditing'
                        ],
                        shouldNotGroupWhenFull: true
                    },

                    list: {
                        properties: {
                            styles: true,
                            startIndex: true,
                            reversed: true
                        }
                    },

                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            },
                            {
                                model: 'heading3',
                                view: 'h3',
                                title: 'Heading 3',
                                class: 'ck-heading_heading3'
                            },
                            {
                                model: 'heading4',
                                view: 'h4',
                                title: 'Heading 4',
                                class: 'ck-heading_heading4'
                            },
                            {
                                model: 'heading5',
                                view: 'h5',
                                title: 'Heading 5',
                                class: 'ck-heading_heading5'
                            },
                            {
                                model: 'heading6',
                                view: 'h6',
                                title: 'Heading 6',
                                class: 'ck-heading_heading6'
                            }
                        ]
                    },

                    placeholder: 'Bạn vui lòng điền vào đây',

                    fontFamily: {
                        options: [
                            'default',
                            'Arial, Helvetica, sans-serif',
                            'Courier New, Courier, monospace',
                            'Georgia, serif',
                            'Lucida Sans Unicode, Lucida Grande, sans-serif',
                            'Tahoma, Geneva, sans-serif',
                            'Times New Roman, Times, serif',
                            'Trebuchet MS, Helvetica, sans-serif',
                            'Verdana, Geneva, sans-serif'
                        ],
                        supportAllValues: true
                    },

                    fontSize: {
                        options: [10, 12, 14, 'default', 18, 20, 22],
                        supportAllValues: true
                    },

                    htmlSupport: {
                        allow: [{
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }]
                    },

                    htmlEmbed: {
                        showPreviews: true
                    },

                    link: {
                        decorators: {
                            addTargetToExternalLinks: true,
                            defaultProtocol: 'https://',
                            toggleDownloadable: {
                                mode: 'manual',
                                label: 'Downloadable',
                                attributes: {
                                    download: 'file'
                                }
                            }
                        }
                    },

                    mention: {
                        feeds: [{
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                                '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                                '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                                '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }]
                    },

                    removePlugins: [
                        'AIAssistant',
                        'CKBox',
                        'CKFinder',
                        'EasyImage',
                        'MultiLevelList',
                        'RealTimeCollaborativeComments',
                        'RealTimeCollaborativeTrackChanges',
                        'RealTimeCollaborativeRevisionHistory',
                        'PresenceList',
                        'Comments',
                        'TrackChanges',
                        'TrackChangesData',
                        'RevisionHistory',
                        'Pagination',
                        'WProofreader',
                        'MathType',
                        'SlashCommand',
                        'Template',
                        'DocumentOutline',
                        'FormatPainter',
                        'TableOfContents',
                        'PasteFromOfficeEnhanced',
                        'CaseChange'
                    ]
                }).then(editor => {
                    removePoweredBy();
                    console.log("Editor was initialized", editor);

                    // Xử lý khi nhấn vào nút button để lưu nội dung vào local storage
                    document.getElementById("submit_insert").addEventListener("click", function() {
                        // Lấy nội dung từ trình soạn thảo CKEditor
                        const content = editor.getData();

                        // Tạo một đối tượng JSON chứa nội dung
                        const contentObject = {
                            "content": content
                        };

                        // Chuyển đổi đối tượng JSON thành chuỗi JSON
                        const contentJSON = JSON.stringify(contentObject);

                        // Lưu chuỗi JSON vào local storage
                        localStorage.setItem("savedContent" + k, contentJSON);

                        // Thông báo cho người dùng biết rằng nội dung đã được lưu
                    })
                })
        }
        created_element("editor", 0, 0);
        created_element("editor2", 0, 1);
        var module_count = []

        function check_input() {
            var check = false
            var input = document.getElementsByClassName("title_module");
            console.log(input);
            for (let index = 0; index < input.length; index++) {
                var element = input[index];
                value2 = element.value;
                if (value2 == "") {
                    check = true;
                }
            }
            var count_stored = localStorage.getItem("count_modal")
            try {
                for (let index = 0; index < count_stored; index++) {
                var content_editor = localStorage.getItem("savedContent" + index);
                var jsonObject = JSON.parse(content_editor);
                if (jsonObject.content == "") {
                    check = true;
                }
            }
            } catch (error) {
                console.log("loi");
            }
            

            // var role_course = document.getElementById("role_course");
            // var selectedValue = role_course.value;
            // var name_course = document.getElementById("name_course");
            // var name_corse2 = name_course.value;
            // var price_course = document.getElementById("price_course");
            // var price_course2 = price_course.value;
           

            // if (selectedValue == "" || name_corse2 == "" || price_course2 == "") {
            //     check = true;
            // }

            if (check == true) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "warning",
                    title: "vui lòng điền đầy đủ thông tin"
                });
                return false;
            }
            return true
        }

        var button = document.getElementById("insert_module");
        var local = 1
        var count_local = 2
        button.onclick = function() {
            var check_status2 = check_input();
            if (check_status2 != false) {
                module_count.push(0);
                var element2 = document.getElementById("module_course");
                var elementcol = document.createElement("div");
                elementcol.classList.add("col");

                var lable_input = document.createElement("lable");
                lable_input.classList.add("mt-2", "lable_title", "module_title" + module_count.length);
                lable_input.innerHTML = "Title module khóa học: "
                var element_name = document.createElement("input");
                element_name.setAttribute("type", "text")
                element_name.setAttribute("class", "title_module");
                element_name.setAttribute("id", "title_module" + module_count.length);
                elementcol.appendChild(lable_input);
                elementcol.appendChild(element_name);

                var lable_input2 = document.createElement("lable");
                lable_input2.classList.add("mt-2", "lable_title2", "module_decription" + module_count.length);
                lable_input2.innerHTML = "Mô tả module khóa học: "
                var element_editor2 = document.createElement("div");
                element_editor2.classList.add("editor_module" + module_count.length, "mt-2", "mb-2");
                element_editor2.setAttribute("id", "editor_module" + module_count.length);
                elementcol.appendChild(lable_input2);
                elementcol.appendChild(element_editor2);
                element2.appendChild(elementcol);
                created_element("editor_module" + module_count.length, 0, local + 1);
                local = local + 1
                count_local = count_local + 1
                localStorage.setItem("count_modal", count_local)

                var button_remove = document.createElement("button");
                button_remove.innerHTML = "<i class='bx bx-trash'></i>"
                button_remove.classList.add("btn", "btn-outline-primary", "mt-2");
                button_remove.setAttribute("id", "remove_button" + module_count.length);
                button_remove.onclick = function() {
                    element2.removeChild(elementcol);
                    element2.removeChild(button_remove);
                };
                element2.appendChild(button_remove);
                removePoweredBy();
            } else {
                console.log("loi");
            }

        }


        // function fetchData(url,data) {
            

        //     // Tùy chọn cấu hình cho yêu cầu fetch
        //     const options = {
        //         method: 'GET', // Phương thức yêu cầu
        //         headers: {
        //             'Content-Type': 'application/json' // Kiểu dữ liệu của body là JSON
        //         },
        //         body: JSON.stringify(data) // Chuyển đổi dữ liệu thành chuỗi JSON và gửi trong body
        //     };

        //     // URL mà bạn muốn gửi yêu cầu đến
        //     const url = url;

        //     // Thực hiện yêu cầu fetch
        //     fetch(url, options)
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error('Network response was not ok');
        //             }
        //             return response.json();
        //         })
        //         .then(data => {
        //             // Xử lý dữ liệu phản hồi
        //             console.log(data);
        //         })
        //         .catch(error => {
        //             // Xử lý lỗi
        //             console.error('There was a problem with your fetch operation:', error);
        //         });
        // }

        
        var button_submit = document.getElementById("submit_insert");
        button_submit.onclick = function() {
            var check_status = check_input();
            if (check_status != false) {
                var result = []
                var element21 = document.getElementsByClassName("title_module")
                console.log(element21);
                for (let index = 0; index < element21.length; index++) {
                    const element = console.log("value titlte decription: "+element21[index].value);
                }
                var local_count5 = localStorage.getItem("count_modal")
                for (let index = 0; index < local_count5; index++) {
                    var content_editor5 = localStorage.getItem("savedContent" + index);
                
                    console.log("value ckeditor: "+content_editor5);
                }
                var count_student_class = document.getElementsByClassName("noUi-connect")[0].value
                console.log(count_student_class);
                var role_course = document.getElementById("role_course");
                var selectedValue = role_course.value;
                console.log("value role course: "+selectedValue);
                var name_course = document.getElementById("name_course");
                var name_corse2 = name_course.value;
                console.log("value name course: "+name_corse2);
                var price_course = document.getElementById("price_course");
                var price_course2 = price_course.value;
                console.log("value price course: "+price_course2);
                var calature = document.getElementById("calature");
                var calature2 = calature.value;
                console.log("value calature course"+calature2);
                var day_course = document.getElementById("day_course");
                var day_course2 = day_course.value;
                // console.log("value day course: "+day_course2);
                // // var hour_corse_start = document.getElementById("hstartTime");
                // console.log(hour_corse_start);
                // // console.log(hour_corse_start2);
                // var hour_corse_end = document.getElementById("hour_corse_end")
                // // var hour_corse_end2 = hour_corse_end.value;
                console.log(hour_corse_end);
                var thumnail_course = document.getElementById("thumnail_course");
                var thumnail_course2 = thumnail_course.getAttribute("src");
                console.log("value thumnail course: "+thumnail_course2);
                
                
            }
        }
    </script>
@endsection
