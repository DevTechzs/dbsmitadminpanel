<!-- summernote -->
<link rel="stylesheet" href="assets/admin/plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="assets/admin/plugins/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.css">
<link rel="stylesheet" href="assets/admin/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css">
<link rel="stylesheet" href="assets/admin/plugins/bootstrap-toggle-master/css/bootstrap-toggle.min.css">


<style>
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .slide-in {
        animation: slideIn 0.5s ease-in-out;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="maincontent">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Prayagedu Leads
                            </div>

                            <span class="float-right">
                                <a href="clients-archivedleads" class="btn"> <i class="fa fa-archive" title="Archived Leads List" aria-hidden="true"></i></a>
                            </span>
                            <!-- <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                     <form method="post" >
                                        <div class="modal-header">
                                            <h4 class="modal-title"> Add Clients</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body text-center">

                                                <div class="row">
                                                   
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="client_name">Client Name</label>
                                                            <input type="text" id="client_name" class="form-control" maxlength="30" placeholder="Client Name" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="telephone_number">Telephone Number</label>
                                                            <input type="text" id="telephone_number" class="form-control" onkeypress="javascript:return isNum(event)" maxlength="10" placeholder="Telephone Number" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="mobile_no">Mobile Number</label>
                                                            <input type="text" id="mobile_no" class="form-control" onkeypress="javascript:return isNum(event)" maxlength="10" placeholder="Mobile Number"  autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">                                  
                                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="max-width: 50px; max-height: 50px;">
                                                               
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail " style="max-width:50px; max-height: 50px;">
                                                                <img src="assets/img/image_placeholder.jpg" alt="..." style="max-width: 100px; max-height: 100px;">
                                                            </div>
                                                            <div>
                                                                <span class="btn btn-round btn-file mt-3">
                                                                   
                                                                    <span class="">Add logo</span>
                                                                    <input type="file" id="logo" name="PassportPhoto" accept="image/x-png,image/jpeg,image/jpg" required>
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
                                                            <label for="contact_name">Contact Name</label>
                                                            <input type="text" id="contact_name" class="form-control" maxlength="30" placeholder="Contact Name"  autocomplete="off">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="contact_number">Contact Number </label>
                                                            <input type="text" id="contact_number" class="form-control" onkeypress="javascript:return isNum(event)" placeholder="Mobile Number" maxlength="10" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="person_designation">Person Designation</label>
                                                            <input type="text" id="person_designation" class="form-control" maxlength="20" placeholder="Person Designation" autocomplete="off">
                                                        </div>
                                                    </div>            
                                                </div>
                                                                                      
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="state">State</label>
                                                            <select class="form-control" name="" id="state"> 
                                                            </select>
                                                         </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="district">District</label>
                                                            <select class="form-control" name="" id="district">
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="city_name">City Name</label>
                                                            <input type="text" id="city_name" class="form-control" maxlength="15" placeholder="City" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="pincode">Pincode</label>
                                                            <input type="text" id="pincode" class="form-control" onkeypress="javascript:return isNum(event)" maxlength="6" placeholder="Pincode" autocomplete="off">
                                                        </div>
                                                    </div>

                                                </div>
                                                  
                                                <div class="row">
                                                   
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="landmark">Landmark </label>
                                                            <input type="text" id="landmark" class="form-control" placeholder="Landmark" autocomplete="off">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="maxuser">Max User </label>
                                                            <input type="text" id="maxuser" class="form-control" placeholder="Max User" maxlength="3" autocomplete="off">
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
                               
                            </div> -->


                        </div>

                        <!-- Delete Lead  Confirmation  Modal   -->
                        <div class="modal fade" id="DeleteLeadModal">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center" id="output"></p>
                                        <!-- <input type="text" id="LeadsName"> -->
                                        <input type="hidden" id="LeadsID">
                                        <p class="text-center">Click Yes If You Are Sure.</p>
                                    </div>
                                    <div class="modal-footer justify-content-between border-0">
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-info btn-sm" onclick="DeleteLeads()">Yes</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>



                        <!-- Ends here  -->


                        <div class="card-body">

                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Organisation</th>
                                        <th scope="col">School Name</th>
                                        <th scope="col">isPositive</th>
                                        <th scope="col">isContacted </th>
                                        <th scope="col">AddedOn </th>
                                        <th scope="col">Remarks </th>
                                        <th scope="col">Action </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
<!-- validating input -->

<!-- Summernote -->
<script src="assets/admin/plugins/summernote/summernote-bs4.min.js"></script>

<script src="assets/admin/plugins/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.js"></script>
<script src="assets/admin/plugins/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>

<script>
    $(function() {
        getPrayagEduLeads();

    });

    function getPrayagEduLeads() {
        var obj = new Object();
        obj.Module = "Client";
        obj.Page_key = "getPrayageduLeads";
        var json = new Object();
        obj.JSON = json;
        TransportCall(obj);
    }

    function onSuccess(rc) {
        if (rc.return_code) {
            switch (rc.Page_key) {
                case "getPrayageduLeads":
                    console.log(rc.return_data);
                    loaddata(rc.return_data);
                    break;
                case "deletePrayageduLeads":
                    notify("success", rc.return_data);
                    $("#DeleteLeadModal").modal('hide');
                    getPrayagEduLeads();
                    break;

                case "moveToRawLeads":
                    notify("success", rc.return_data);
                    getPrayagEduLeads();
                    break;

                    case "changeactivestatus":
                    notify("success", rc.return_data);
                    getPrayagEduLeads();
                    break;

                    case "changeactivestatusContacted":
                    notify("success", rc.return_data);
                    getPrayagEduLeads();
                    break;
                    




                default:
                    alert(rc.Page_key);
            }
        } else {
            alert(rc.return_data);
        }
        // alert(JSON.stringify(args));
    }

    function loaddata(data) {
        // console.assert(data);
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
                text += '<td> ' + data[i].Name + '</td>';
                text += '<td> ' + data[i].ContactNo + ' <br> ' + (data[i].Email ? data[i].Email : "<span class='badge badge-danger'>NA</span>") + '</td>';
                if (data[i].OrganizationTypeID == 1) {
                    Organization = "Independent";
                } else {
                    Organization = "Group <br>Count - <span class='badge badge-info'> " + data[i].BrandCount + "</span>";
                }
                text += '<td> ' + Organization + '</td>';
                text += '<td> ' + data[i].SchoolGroupName + '</td>';
                //isActive
                if (data[i].isPositive == "1") {
                    status = "on";
                    statustext = "checked";
                    text += '<td><div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"> <input type="checkbox" ' + statustext + '  class="custom-control-input" id="activestatusPositive' + i + '" onclick="changeactivestatus(this.id,' + data[i].LeadsID + ')" value="' + status + '">  <label class="custom-control-label" for="activestatusPositive' + i + '"></label> </div> </td>';
                } else if (data[i].isPositive == null || data[i].isPositive == 0) {
                    status = "off";
                    statustext = "";
                    text += '<td>   <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"> <input type="checkbox"   class="custom-control-input" id="activestatusPositive' + i + '" onclick="changeactivestatus(this.id,' + data[i].LeadsID + ')" value="' + status + '">  <label class="custom-control-label" for="activestatusPositive' + i + '"></label> </div> </td>';
                }

                if (data[i].isContacted == "1") {
                    isContactedStatus = "on";
                    ContactedStatusText = "checked";
                    text += '<td><div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"> <input type="checkbox" ' + ContactedStatusText + '  class="custom-control-input" id="activestatusContacted' + i + '" onclick="changeactivestatusContacted(this.id,' + data[i].LeadsID + ')" value="' + isContactedStatus + '">  <label class="custom-control-label" for="activestatusContacted' + i + '"></label> </div> </td>';
                } else if (data[i].isContacted == null || data[i].isContacted==0) {
                    isContactedStatus = "off";
                    ContactedStatusText = "";
                    text += '<td> <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"> <input type="checkbox"   class="custom-control-input" id="activestatusContacted' + i + '" onclick="changeactivestatusContacted(this.id,' + data[i].LeadsID + ')" value="' + isContactedStatus + '">  <label class="custom-control-label" for="activestatusContacted' + i + '"></label> </div> </td>';
                }

                // // text += '<td> ' + (data[i].isPositive ? "<span  class='badge badge-success'> Yes </span>" : "<i class='badge badge-danger'> No </i>") + '</td>';
                // text += '<td> ' + (data[i].isContacted ? "<span class='badge badge-success'> Yes </span>" : "<span class='badge badge-danger'> No </span>") + '</td>';
                text += '<td> ' + data[i].EntryDateTime + '</td>';
                text += '<td> ' + (data[i].ContactedRemarks ? data[i].ContactedRemarks : "<span class='badge badge-danger'>NA</span>") + '</td>';
                text += '<td class="btn-group btn-group-sm">';
                text += ' <a class="btn btn-danger btn-xs text-white ml-1" title="Delete Lead" onclick="onDeleteLeads(\'' + escape(JSON.stringify(data[i])) + '\')"><i class="fas fa-archive"></i></a>';
                text += '<a class="btn btn-success btn-xs text-white ml-1" title="Move To Raw  Lead" onclick="MoveToRawLeads(\'' + escape(JSON.stringify(data[i])) + '\')"><i class="fas fa-share"></i></a>';
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



    function changeactivestatus(id, LeadsID) {
        var status = "";
        if ($("#" + id).is(':checked')) {
            status = "1";
        } else {
            status = "0";
        }
        var obj = new Object();
        obj.Module = "Client";
        obj.Page_key = "changeactivestatus";
        var json = new Object();
        obj.JSON = json;
        json.LeadsID = LeadsID;
        json.isPositive = status;
        SilentTransportCall(obj); 
    }

    function changeactivestatusContacted(id, LeadsID) {
        debugger;
        var status = "";
        if ($("#" + id).is(':checked')) {
            status = "1";
        } else {
            status = "0";
        }
        var obj = new Object();
        obj.Module = "Client";
        obj.Page_key = "changeactivestatusContacted";
        var json = new Object();
        obj.JSON = json;
        json.LeadsID = LeadsID;
        json.isContacted = status;
        SilentTransportCall(obj);
    }

    function onDeleteLeads(data) {
        data = JSON.parse(unescape(data));
        $("#LeadsID").val(data.LeadsID);
        var LeadsName = data.Name;
        $("#DeleteLeadModal").modal('show');
        var outputElement = document.getElementById("output");
        outputElement.innerHTML = "Are You Sure to Delete  " + LeadsName + " Leads ? ";
    }


    function MoveToRawLeads(data) {
        debugger;
        data = JSON.parse(unescape(data));
        var obj = new Object();
        obj.Module = "Client";
        obj.Page_key = "moveToRawLeads";
        var json = new Object();
        obj.JSON = json;
        json.LeadsID = data.LeadsID;
        json.ContactpersonName = data.Name;
        json.ClientName = data.SchoolGroupName;
        json.ContactPersonDesignation = data.Role;
        json.PhoneNumbers = data.ContactNo;
        SilentTransportCall(obj);
        // $("#DeleteLeadModal").modal('show');
        // var outputElement = document.getElementById("output");
        // outputElement.innerHTML = "Are You Sure to Delete  " + LeadsName + " Leads ? ";



    }

    function DeleteLeads() {
        debugger;
        var LeadID = $("#LeadsID").val();
        var obj = new Object();
        obj.Module = "Client";
        obj.Page_key = "deletePrayageduLeads";
        var json = new Object();
        obj.JSON = json;
        json.LeadsID = LeadID;
        SilentTransportCall(obj);
    }

    // Modal Animation For Delete Lead Modal 
    $('#DeleteLeadModal').on('show.bs.modal', function() {
        $(this).find('.modal-dialog').addClass('slide-in');
    });

    $('#DeleteLeadModal').on('hidden.bs.modal', function() {
        // Reset the modal animation class when the modal is hidden
        $(this).find('.modal-dialog').removeClass('slide-in');
    });
</script>