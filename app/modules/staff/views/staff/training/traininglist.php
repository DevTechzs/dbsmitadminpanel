<?php require_once(VIEWPATH . "/basic/header.php"); ?>
<?php require_once(VIEWPATH . "/basic/sidebar.php"); ?>

<link href="assets/js/plugins/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="maincontent">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">

                    <div class="card-header">
                        <div class="card-title">
                            Staff Training List
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="float-right">
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-circle-thin"> <i class="fa fa-plus"></i> </i>New Training</button>
                            </span>
                        </div>
                        <!-- Add Training Type Modal -->
                        <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-xs">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Staff Training </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body text-center">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="training_name">Training Type</label>
                                                        <select id="TrainingType" class="form-control"> </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="staffs">Staff</label>
                                                        <select id="Staffs" class="form-control"> </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="FromDate">From Date</label>
                                                        <input type="date" id="FromDate" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ToDate">ToDate</label>
                                                        <input type="date" id="ToDate" class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <textarea id="Description" class="form-control" placeholder="Description">
</textarea>
                                                <div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary btn-xs" id="btnAddTraining">Save </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>


                                <!-- Edit Training Type Modal -->
                                <div class="modal fade" id="EdittrainingModal">
                                    <div class="modal-dialog modal-xs">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Training Type</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body text-center">
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="edittraining_name">Training Name</label>
                                                                <input type="text" id="edittraining_name" class="form-control" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                        </div>

                        <!-- card for table  -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Staff</th>
                                        <th scope="col">Training Type</th>
                                        <th scope="col">From Date</th>
                                        <th scope="col">To Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once(VIEWPATH . "/basic/footer.php"); ?>

<script src="assets/js/plugins/icheck-bootstrap/icheck.min.js"></script>
<!-- Jasny File -->
<script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
<script>
    $(function() {
        getAllTraining();
        getAllTrainingTypes();
        getStaff();
    });


function getAllTrainingTypes() {
    var obj = new Object();
    obj.Module = "Settings";
    obj.Page_key = "getAllTrainingTypes";
    var json = new Object();
    obj.JSON = json;
    SilentTransportCall(obj);
}


    function getAllTraining() {
        var obj = new Object();
        obj.Module = "Settings";
        obj.Page_key = "getAllTraining";
        var json = new Object();
        obj.JSON = json;
        SilentTransportCall(obj);
    }


    function getStaff() {
        var obj = new Object();
        obj.Module = "Staff";
        obj.Page_key = "getStaff";
        var json = new Object();
        obj.JSON = json;
        SilentTransportCall(obj);
    }


    function onSuccess(rc) {

        if (rc.return_code) {
            switch (rc.Page_key) {

                case "addTraining":
                    notify("success", rc.return_data);
                    $("#modal-lg").modal("hide");
                   getAllTraining();
                    break;
                case "getAllTrainingTypes":
                    loadSelect("#TrainingType", rc.return_data);
                    break;

                case "getStaff":
                    loadSelect("#Staffs", rc.return_data);
                    break;

                    case"getAllTraining":
                        console.log(rc.return_data);
                        loaddata(rc.return_data);
                        break;



                case "editTrainingType":
                    notify("success", rc.return_data);
                    $("#EdittrainingModal").modal('hide');
                    getAllTraining();
                    break;

                default:
                    notify("error", rc.Page_key);
            }
        } else {
            //alert(rc.return_data);
            notify("error", rc.return_data);
        }
        // alert(JSON.stringify(args));
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
                text += '<tr> ';

                text += '<th> ' + (i + 1) + '</th>'; //\'' + escape(JSON.stringify(data[i])) + '\'
                text += '<td>' + data[i].StaffName + '</td>'; 
                // text += '<td> ' + data[i].TrainingType + '&nbsp;&nbsp;<span onClick="onEdit(\'' + escape(JSON.stringify(data[i])) + '\')"><i style="cursor:pointer;" class="fas fa-edit"></i></span></td>';
                text += '<td> ' + data[i].TrainingType + '</td>';
                text += '<td> ' + data[i].FromDate + '</td>';
                text += '<td> ' + data[i].ToDate + '</td>';
                text += '<td>';
                if (data[i].isActive == 1) {
                    text += '<span class="badge badge-success">  Active </button>';
                } else {
                    text += '<span class="badge badge-danger">Not Active</button>';
                }
                text += '</td>';
                // text += '<td> ' + data[i].IsActive + '</td>';
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

    var TrainingData;

    function onEdit(data) {

        TrainingData = JSON.parse(unescape(data));
        $("#edittraining_name").val(TrainingData.TrainingType);
        $("#EdittrainingModal").modal('show');
    }

    $("#edittraining_name").change(function() {
        debugger;
        var obj = new Object();
        obj.Module = "Settings";
        obj.Page_key = "editTrainingType";
        var json = new Object();
        json.TrainingTypeID = TrainingData.TrainingTypeID;
        json.TrainingType = $("#edittraining_name").val();
        obj.JSON = json;
        SilentTransportCall(obj);
    });



    $("#btnAddTraining").click(function() {
        debugger;
        let obj = {};
        obj.Module = "Settings";
        obj.Page_key = "addTraining";
        let json = {};
        json.TrainingTypeID = $("#TrainingType").val();
        json.StaffID = $("#Staffs").val();
        json.FromDate = $("#FromDate").val();
        json.ToDate = $("#ToDate").val();
        json.Description = $("#Description").val();
        obj.JSON = json;
        SilentTransportCall(obj);
    });
</script>