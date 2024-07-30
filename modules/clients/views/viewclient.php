<link rel="stylesheet" href="assets/admin/plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="assets/admin/plugins/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.css">
<link rel="stylesheet" href="assets/admin/plugins/bootstrap-toggle-master/css/bootstrap-toggle.min.css">

<div class="content-wrapper" id="maincontent">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Available Clients
                            </div>
                            <span class="float-right">
                                <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-circle-thin"> <i class="fa fa-plus"></i> </i>Add Client(s)</button>
                            </span>
                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form method="post">
                                            <div class="modal-header">
                                                <h4 class="modal-title"> Add Clients</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="client_name">Client Name <span class="text-danger">*</span></label>
                                                                <input type="text" id="client_name" class="form-control" placeholder="Client Name" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="telephone_number">Telephone Number <span class="text-danger">*</span></label>
                                                                <input type="text" id="telephone_number" class="form-control" onkeypress="javascript:return isNum(event)" maxlength="10" placeholder="Telephone Number" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mobile_no">Mobile Number <span class="text-danger">*</span></label>
                                                                <input type="text" id="mobile_no" class="form-control" onkeypress="javascript:return isNum(event)" maxlength="10" placeholder="Mobile Number" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="fileinput fileinput-new text-center " data-provides="fileinput" id="filediv">
                                                                <div class="fileinput-new thumbnail" style="max-width: 50px; max-height: 50px;">

                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail border " style=" margin-top:5px;max-width:50px; max-height: 50px;">
                                                                    <img src="assets/img/image_placeholder.jpg" alt="..." style="max-width: 100px; max-height: 100px;" id="blah">
                                                                </div>
                                                                <div>
                                                                    <span class="btn btn-round btn-file mt-3">
                                                                        <input type="file" id="logo" accept="image/x-png,image/gif,image/jpeg" data-allowed-file-extensions="jpg jpeg png" data-max-file-size="10M" data-height="240" required />
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="fax">Fax</label>
                                                                <input type="text" id="fax" class="form-control" placeholder="Fax" maxlength="15" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="contact_name">Contact Name <span class="text-danger">*</span></label>
                                                                <input type="text" id="contact_name" class="form-control" maxlength="30" placeholder="Contact Name" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="contact_number">Contact Number <span class="text-danger">*</span> </label>
                                                                <input type="text" id="contact_number" class="form-control" onkeypress="javascript:return isNum(event)" placeholder="Mobile Number" maxlength="10" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="person_designation">Person Designation</label>
                                                                <!-- <select name="" id="person_designation" class="form-control"></select> -->
                                                                <input type="text" id="person_designation" class="form-control" maxlength="20" placeholder="Person Designation" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="state">State <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="" id="state">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="district">District <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="" id="district">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="city_name">City<span class="text-danger">*</span></label>
                                                                <input type="text" id="city_name" class="form-control" maxlength="15" placeholder="City" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="pincode">Pincode <span class="text-danger">*</span></label>
                                                                <input type="text" id="pincode" class="form-control" onkeypress="javascript:return isNum(event)" maxlength="6" placeholder="Pincode" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="landmark">Landmark <span class="text-danger">*</span></label>
                                                                <input type="text" id="landmark" class="form-control" placeholder="Landmark" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="maxuser">Max User</label>
                                                                <input type="text" id="maxuser" class="form-control" onkeypress="javascript:return isNum(event)" placeholder="Max User" maxlength="4" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="btnAddClient">Save </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Client</th>
                                        <th scope="col">Fax</th>
                                        <th scope="col">Contact Person</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">MaxUser</th>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function isNum(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        } else {
            return true;
        }
    }
</script>

<!-- Summernote -->
<script src="assets/admin/plugins/summernote/summernote-bs4.min.js"></script>

<script src="assets/admin/plugins/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.js"></script>
<script src="assets/admin/plugins/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>

<script>
    $(function() {
        getClients();
        getState();
        getAllDistrict();
        getDesignation();
    });

    function clearform() {
        $('#client_name').val('');
        $('#telephone_number').val('');
        $('#mobile_no').val('');
        $('#fax').val('');
        $('#contact_name').val('');
        $('#contact_number').val('');
        $('#person_designation').val('');
        $('#state').val('');
        $('#district').val('');
        $('#city_name').val('');
        $('#pincode').val('');
        $('#landmark').val('');
        $('#maxuser').val('');
        $('#logo').val('');
        code = null;
    }

    document.getElementById('filediv').addEventListener('click', function() {
        document.getElementById('logo').click();
    });

    // validation
    $('#client_name,#contact_name,#city_name,#landmark').keypress(function(e) {
        var charCode = (e.which) ? e.which : event.keyCode
        if (String.fromCharCode(charCode).match(/[^A-Za-z0-9.@'_\- ]/g))
            return false;
    });

    function getDesignation() {
        var obj = new Object();
        obj.Module = "Settings";
        obj.Page_key = "getDesignations";
        var json = new Object();
        obj.JSON = json;
        TransportCall(obj);
    }

    //get all the district
    function getAllDistrict() {
        var obj = new Object();
        obj.Module = "Settings";
        obj.Page_key = "getAllDistrict";
        var json = new Object();
        obj.JSON = json;
        TransportCall(obj);
    }

    function getState() {
        var obj = new Object();
        obj.Module = "Settings";
        obj.Page_key = "getState";
        var json = new Object();
        obj.JSON = json;
        TransportCall(obj);
    }

    function getClients() {
        var obj = new Object();
        obj.Module = "Client";
        obj.Page_key = "getClients";
        var json = new Object();
        obj.JSON = json;
        TransportCall(obj);
    }



    let Districts;

    function onSuccess(rc) {
        if (rc.return_code) {
            switch (rc.Page_key) {
                case "getDesignations":
                    loadSelect("#person_designation", rc.return_data);
                    break;

                case "getClients":
                    loaddata(rc.return_data);
                    break;

                case "getState":
                    loadSelect("#state", rc.return_data);
                    break;

                case "getAllDistrict":
                    Districts = rc.return_data;
                    loadSelect("#district", rc.return_data);
                    console.log(rc.return_data);
                    break;

                case "addClient":
                    notify("success", rc.return_data);
                    $("#modal-lg").modal("hide");
                    getClients();
                    clearform();
                    code = null;
                    break;

                case "deleteClient":
                    notify("success", rc.return_data);
                    getClients();
                    break;

                default:
                    notify("warning", rc.Page_key);
            }
        } else {
            notify("warning", rc.return_data);
        }
    }

    function loaddata(data) {
        var table = $("#table");

        try {
            if ($.fn.DataTable.isDataTable($(table))) {
                $(table).DataTable().destroy();
            }
        } catch (ex) {}
        var text = ""
        if (data.length == 0) {
            text += "No Data Found";
        } else {
            for (let i = 0; i < data.length; i++) {
                text += '<tr>';
                text += '<td><b>' + data[i].ClientName + '</b> <br> <i class="fa fa-phone" aria-hidden="true" style="font-size:9px;";></i> <small>' + data[i].MobileNo + '</small>';
                text += '<br><small> LandLine : ' + data[i].TelephoneNo + '</small>';
                text += '</td>';
                text += '<td> ' + data[i].Fax + '</td>';
                text += '<td> ' + data[i].ContactPersonName + '<br> <span class="badge badge-info">' + data[i].DesignationName + '</span> <br> <i class="fa fa-phone" style="font-size:9px;" aria-hidden="true"></i> <small>' + data[i].ContactPersonMobileNo + '</small></td>';
                text += '<td> ' + data[i].Landmark + ' <br> ' + data[i].StateName + ',<br> ' + data[i].DistrictName + ',<br>' + data[i].CityName + ', <br> Pin : ' + data[i].PinCode + '</td>';
                text += '<td> ' + data[i].MaxUsers + '</td>';
                text += '<td>';
                if (data[i].Logo == '' || data[i].Logo == null) {
                    text += '<span class="badge badge-danger">N/A</span>';
                } else {
                    text += ' <br><a href=file?type=client&name=' + data[i].Logo + ' target="_blank" title="VIEW" class="link-black text-sm mr-4"><i class="fas fa-paperclip mr-1"></i>Logo</a>';
                }
                text += '</td>';
                text += '<td class="btn-group btn-group-sm">';
                text += '<a class="btn btn-info btn-sm text-white" onclick="onEdit(\'' + escape(JSON.stringify(data[i])) + '\')"> <i class="fas fa-pencil-alt"> </i> </a>';
                text += '<a class="btn btn-danger btn-sm text-white" onclick="onDelete(' + data[i].ClientID + ')"> <i class="fas fa-trash"> </i> </a>';
                text += '</td>';
                text += '</tr >';
            }
        }
        $("#table tbody").html("");
        $("#table tbody").append(text);

        $(table).DataTable({
            responsive: true,
            "order": [],
            dom: 'Bfrtip',
            "bInfo": true,
            exportOptions: {
                columns: ':not(.hidden-col)'
            },
            "deferRender": true,
            "pageLength": 10,
            buttons: [{
                    exportOptions: {
                        columns: ':not(.hidden-col)'
                    },
                    extend: 'excel',
                    orientation: 'landscape',
                    pageSize: 'A4'
                },
                {
                    exportOptions: {
                        columns: ':not(.hidden-col)'
                    },
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4'
                },
                {
                    exportOptions: {
                        columns: ':not(.hidden-col)'
                    },
                    extend: 'print',
                    orientation: 'landscape',
                    pageSize: 'A4'
                }
            ]
        });
    }

    let data;
    $("#logo").change(function() {
        readURL(this);
        getBase64($(this).prop('files')[0]);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#btnAddClient").click(function() {
        let obj = {};
        obj.Module = "Client";
        obj.Page_key = "addClient";
        let json = {};

        if ($("#state").val() == -1 || $("#district").val() == -1 || $("#client_name").val() == '' || $("#contact_name").val() == '' || $("#city_name").val() == '' || $("#landmark").val() == '') {
            notify("warning", "Please select an Option");
            return false;
        }

        json.ClientName = $("#client_name").val();
        json.telephoneName = $("#telephone_number").val();
        json.MobileNo = $("#mobile_no").val();
        json.Fax = $("#fax").val();
        json.ContactName = $("#contact_name").val();
        json.ContactNumber = $("#contact_number").val();
        json.PersonDesignation = $("#person_designation").val();
        json.State = $("#state").val();
        json.District = $("#district").val();
        json.City = $("#city_name").val();
        json.Pincode = $("#pincode").val();
        json.Landmark = $("#landmark").val();
        json.Maxuser = $("#maxuser").val();
        json.File = data;
        if (code != null) {
            json.ClientID = code;
        }
        obj.JSON = json;
        TransportCall(obj);
    });

    function getBase64(file) {
        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function() {
            data = reader.result;
        };
        reader.onerror = function(error) {};
    }

    var code = null;

    function onEdit(data) {
        data = JSON.parse(unescape(data));
        $("#client_name").val(data.ClientName);
        $("#telephone_number").val(data.TelephoneNo);
        $("#mobile_no").val(data.MobileNo);
        $("#fax").val(data.Fax);
        $("#contact_name").val(data.ContactPersonName);
        $("#contact_number").val(data.ContactPersonMobileNo);
        $("#person_designation").val(data.ContactPersonDesignation);
        $("#city_name").val(data.CityName);
        $("#pincode").val(data.PinCode);
        $("#landmark").val(data.Landmark);
        $("#maxuser").val(data.MaxUsers);
        $('#blah').prop('src', "file?type=client&name=" + data.Logo);
        $("#state").val(data.StateID).change();
        $("#district").val(data.DistrictID).change();
        mode = 2;
        code = data.ClientID;
        $("#modal-lg").modal("show");
    }

    // $("#state").change(function() {
    //     debugger;
    //     $("#district").html("");
    //     var id=$(this).val();
    //     for (let i = 0; i < Districts.length; i++) {
    //         if ($("#state option:selected").val() === Districts[i].StateID) {
    //             $("#district").append('<option value="' + Districts[i].DistrictID + '">' + Districts[i].DistrictName + '</option>');
    //         }
    //     }
    // });
    $("#state").change(function() {
        debugger;
        $("#district").html("");
        var StateID = $(this).val();
        for (let i = 0; i < Districts.length; i++) {
            if (StateID === Districts[i].StateID) { // Use the id variable here
                $("#district").append('<option value="' + Districts[i].DistrictID + '">' + Districts[i].DistrictName + '</option>');
            }
        }
    });


    function onDelete(ClientID) {
        if (confirm("Are you sure you want to delete")) {
            let obj = {};
            obj.Module = "Client";
            let json = {};
            obj.Page_key = "deleteClient";
            json.ClientID = ClientID;
            obj.JSON = json;
            TransportCall(obj);
        }
    }
</script>