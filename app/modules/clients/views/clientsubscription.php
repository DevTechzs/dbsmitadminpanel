<!-- summernote -->
<link rel="stylesheet" href="assets/admin/plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="assets/admin/plugins/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.css">
<link rel="stylesheet" href="assets/admin/plugins/bootstrap-toggle-master/css/bootstrap-toggle.min.css">
<style>
    .ui-datepicker {
        width: 210px;
        height: auto;
        margin: 5px auto 0;
        font: 9pt Arial, sans-serif;
        -webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
        -moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
    }

    .ui-datepicker table {
        width: 100%;
        background: #FFFBF5;
    }

    .ui-datepicker a {
        text-decoration: none;
    }

    .ui-datepicker-header {
        background: #FFFBF5;
        color: #0F0F0F;
        font-weight: bold;
        -webkit-box-shadow: inset 0px 1px 1px 0px rgba(250, 250, 250, 2);
        -moz-box-shadow: inset 0px 1px 1px 0px rgba(250, 250, 250, .2);
        box-shadow: inset 0px 1px 1px 0px rgba(250, 250, 250, .2);
        text-shadow: 1px -1px 0px #000;
        filter: dropshadow(color=#000, offx=1, offy=-1);
        line-height: 30px;
        border-width: 1px 0 0 0;
        border-style: solid;
        border-color: #111;
    }

    #logo {
        width: 80px;
        height: 60px;
        border-radius: 10px;
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
                                Client Subscription
                            </div>

                            <span class="float-right">
                                <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-circle-thin"> <i class="fa fa-plus"></i> </i>Subscription(s)</button>
                            </span>


                            <!-- modal-unsubcribe-->
                            <!-- ########################################################################### form to UNsubscribe ################################################## -->
                            <div class="modal fade" id="modal-unsubscribe">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Unsubscribe </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="unsubscribereason">Why do you want to unsubscribe? <span class="text-danger">*</span></label>
                                                            <textarea name="" id="unsubscribereason" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="btnUnsubscribe">Save </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- modal-domain-call--->
                            <div class="modal fade" id="modal-domaincall">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Domain </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-12 mt-3">
                                                            <div class="card-header">
                                                            </div>
                                                            <div class="card">
                                                                <div class="formbold-main-wrapper">
                                                                    <div class="formbold-form-wrapper">
                                                                        <form method="POST" action="">
                                                                            <div class="formbold-steps">
                                                                                <ul>
                                                                                    <li class="formbold-step-menu1 active">
                                                                                        <span>1</span>
                                                                                        Server
                                                                                    </li>
                                                                                    <li class="formbold-step-menu2">
                                                                                        <span>2</span>
                                                                                        Domain
                                                                                    </li>
                                                                                    <li class="formbold-step-menu3">
                                                                                        <span>3</span>
                                                                                        Start Up
                                                                                    </li>

                                                                                </ul>
                                                                            </div>
                                                                            <div class="formbold-form-step-1 active">
                                                                                <div class="card-body">
                                                                                    <p>Select Server For The Domain</p>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="form-group">
                                                                                        <label for="server_name">Server Name </label>
                                                                                        <select class="form-control" name=" " id="server_name">
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="formbold-form-step-2">
                                                                                <div class="card-body">
                                                                                    <p>Set Up Domain For First Time Use</p>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="domain_name" class="formbold-form-label"> Domain Name : </label>
                                                                                    <input type="text" id="domain_name" class="form-control" class="formbold-form-input" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="formbold-form-step-3">
                                                                                <div class="card-body">
                                                                                    <i class="icon fas fa-cog  fa-4x"></i>
                                                                                    <br>
                                                                                    <br>
                                                                                    <p>Set Up For First Time Use</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="formbold-form-btn-wrapper">
                                                                                <button class="formbold-back-btn">
                                                                                    Back
                                                                                </button>

                                                                                <button  class="formbold-btn" id="createDomain">
                                                                                    Proceed
                                                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <g clip-path="url(#clip0_1675_1807)">
                                                                                            <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white" />
                                                                                        </g>
                                                                                        <defs>
                                                                                            <clipPath id="clip0_1675_1807">
                                                                                                <rect width="16" height="16" fill="white" />
                                                                                            </clipPath>
                                                                                        </defs>
                                                                                    </svg>
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ########################################################################### form to subscribe ################################################## -->

                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Client Subscription </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="ClientId">Client <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="" id="ClientId">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="productID">Product <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="" id="productID">
                                                            </select>
                                                            <!-- <input type="text" id="productID" class="form-control" placeholder="start Date"  autocomplete="off">   -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"> 
                                                            <label for="subscriptionId">Product Subscription<span class="text-danger">*</span></label>
                                                            <select class="form-control" name="" id="subscriptionId">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="startDate">Start Date <span class="text-danger">*</span></label>
                                                            <input type="text" id="startDate" class="form-control" placeholder="Start Date" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <input type="text" name="" class="form-control" maxlength="6" style="display:none" id="productamount">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="endDate">End date  <span class="text-danger">*</span></label>
                                                            <input type="text" id="endDate" class="form-control" placeholder="End Date" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="maxUser">Max User <span class="text-danger">*</span></label>
                                                            <input type="number" name="" class="form-control" placeholder="Max User" maxlength="4" id="maxUser">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3"> 
                                                        <div class="form-group">
                                                            <label for="amount">Amount <span class="text-danger">*</span></label>
                                                            <input type="number" name="" class="form-control" Placeholder="Amount" maxlength="6" id="amount">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="remark">Rate <span class="text-danger">*</span></label>
                                                            <input type="number" id="rate" class="form-control" placeholder="Rate" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="installment">Installment <span class="text-danger">*</span></label>
                                                            <input type="number" name="" class="form-control" Placeholder="InstallMent" id="installment">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="nextDueDate"> Next Due Date <span class="text-danger">*</span></label>
                                                            <input type="text" name="" class="form-control" placeholder="Next Due date" id="nextDueDate">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="nextDueAmount">Next Due Amount <span class="text-danger">*</span> </label>
                                                            <input type="text" name="" class="form-control" placeholder="Next Due Amount" id="nextDueAmount">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="remark">Remarks <span class="text-danger">*</span> </label>
                                                            <input type="text" id="remark" class="form-control" placeholder="Remarks" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="terms"> Terms</label>
                                                            <input type="file" id="terms" class="form-control" accept="image/x-png,image/jpeg,image/jpg" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="max-width: 50px; max-height: 50px;">
                                                                </div>
                                                                <div>
                                                                    <span class="btn btn-round btn-file mt-3">
                                                                        <span class="">Add logo</span>
                                                                        <input type="file" id="photo" name="PassportPhoto" accept="image/x-png,image/jpeg,image/jpg" onchange="previewImage(event)">
                                                                        <img id="logo" src="assets/img/image_placeholder.jpg"> <!-- added by dev on 03/11/2023 -->
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="api">API <span class="text-danger">*</span></label>
                                                            <input type="text" id="api" class="form-control" placeholder="https://test.com/index.php" autocomplete="off">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="btnSave">Save </button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Client Name</th>
                                        <th scope="col">Product Name </th>
                                        <th scope="col">Subscription</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Max User</th>
                                        <th scope="col">Transaction Id</th>
                                        <th scope="col">Remarks</th>
                                        <th scope="col">InstallMent</th>
                                        <th scope="col">Next Due Date</th>
                                        <th scope="col">Next Due Amount</th>
                                        <th scope="col">API</th>
                                        <th scope="col">Product Logo</th>
                                        <th scope="col">Terms</th>
                                        <th scope="col">Action</th>

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

<!-- Summernote -->

<script src="assets/admin/plugins/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.js"></script>
<script src="assets/admin/plugins/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>

<script>
    $("#startDate").datepicker({

        dateFormat: 'yy-mm-dd',
        onSelect: function(selectedDate) {
            if (this.id == 'startDate') {

                var arr = selectedDate.split("-");
                var date = new Date(arr[0] + "-" + arr[1] + "-" + arr[2]);
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var minDate = new Date(y, m, d + 31);
                var nextduedate = new Date(y, m, d + 62);
                //var mdate=;
                //var mdate= minDate;

                $("#endDate").datepicker('setDate', minDate);
                $("#nextDueDate").datepicker('setDate', nextduedate);

            }
        }
    });
    $("#endDate").datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $("#nextDueDate").datepicker({
        dateFormat: 'yy-mm-dd'
    });

    //############################## CHANGE AMOUNT(TO BE GET FROM THE PRODUCT SUBSCRIPTION) BASED ON MAXUSER ################################
    $('#maxUser').change(function() {
        var maxuser = ($('#maxUser').val());
        var productAmount = ($('#productamount').val());
        var totalAmount = maxuser * productAmount;
        $('#amount').val(totalAmount);
        $('#nextDueAmount').val(totalAmount);
    });

    $(function() {
        getClient_subscription();
        getClients();
        getProducts();
      //  getActiveProductSubscription(); 
        getAllServer();
    });

    function getClient_subscription() {

        var obj = new Object();
        obj.Module = "Client";
        obj.Page_key = "getClient_subscription";
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

    //get all active
    function getActiveProductSubscription() {
        var obj = new Object();
        obj.Module = "Products";
        obj.Page_key = "getActiveProductSubscription";
        var json = new Object();
        obj.JSON = json;
        TransportCall(obj);
    }
    function getProductsubscription(productID) {  
        var obj = new Object();
        obj.Module = "Products";
        obj.Page_key = "getProductsubscription";
        var json = new Object(); 
        json.ProductID=productID;          
        obj.JSON = json;
        TransportCall(obj);
    }

    function getProducts() {
        var obj = new Object();
        obj.Module = "Products";
        obj.Page_key = "getProducts";
        var json = new Object();
        obj.JSON = json;
        TransportCall(obj);
    }

    function getAllServer() {
        var obj = new Object();
        obj.Module = "Settings";
        obj.Page_key = "getAllServer";
        var json = new Object();
        obj.JSON = json;
        TransportCall(obj);
    }

   

    function clearform() {
        $('#ClientId').val('');
        $('#productID').val('');
        $('#subscriptionId').val('');
        $('#startDate').val('');
        $('#endDate').val('');
        $('#amount').val('');
        $('#maxUser').val('');
        $('#remark').val('');
        $('#installment').val('');
        $('#nextDueDate').val('');
        $('#nextDueAmount').val('');
        $('#api').val('');
        $('#unsubscribereason').val('');
    }

    let ProductSubscription;

    function onSuccess(rc) {

        if (rc.return_code) {
            switch (rc.Page_key) {

                case "getActiveProductSubscription":
                    ProductSubscription = rc.return_data;
                    loadSelect("#subscriptionId", rc.return_data);
                    break;

                case "Unsubscribe":
                    $("#modal-unsubscribe").modal("hide");
                    getClient_subscription();
                    clearform();
                    break;


                case "addClientSubscription":
                    notify('success',rc.return_data);
                    getClient_subscription();
                    $("#modal-lg").modal("hide");
                    clearform();
                    getDomainNameById();
                    break;

                case "getClient_subscription":
                    loaddata(rc.return_data);
                    break;

                case "getAllServer":
                    console.log(rc.return_data);
                    loadSelect("#server_name", rc.return_data);
                    break;

                case "getClients":
                    loadSelect("#ClientId", rc.return_data);
                    break;

                case "getProducts":
                    loadSelect("#productID", rc.return_data);
                    break;

                case "deleteClientSubscription":
                    notify("success", rc.return_data);
                    getClient_subscription();
                    break;

                case "getProductsubscription": 
                    ProductSubscription=rc.return_data;
                    loadSelect("#subscriptionId", rc.return_data); 
                    break;

                case "getDomainNameById": // added by dev on 26/10/23
                    $("#modal-domaincall").modal("show");
                    $("#domain_name").val(rc.domain);
                    break;

                    //   case "getBasedURLByProductId": // 
                    //     $("#db_source").val(rc.basedURL);
                    //     // console.log(rc.return_data['basedURL']);
                    //     break; 

                default:
                    notify("error", rc.Page_key);

            }
        } else {
            notify("error", rc.return_data);
        }

    }


 var ExtractClientSubscriptionID,ProductID;
    function loaddata(data) {
        debugger;
        console.log(data);
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
                ExtractClientSubscriptionID = data[i].ClientSubscriptionID;
                text += '<th> ' + data[i].ClientName + '</th>';
                text += '<td> ' + data[i].Name + '</td>';
                text += '<td> ' + data[i].SubscriptionName + '</td>';
                text += '<td> ' + data[i].StartDate + '</td>';
                text += '<td> ' + data[i].EndDate + '</td>';
                text += '<td> ' + data[i].Amount + '</td>';
                text += '<td> ' + data[i].MaxUsers + '</td>';
                if(data[i].TransectionID==null || data[i].TransectionID=="")
                {
                    transaction="<span class='badge badge-danger'>N/A</span>";
                }
                else{
                    transaction= data[i].TransectionID;
                }
                text += '<td> ' + transaction + '</td>';
                text += '<td> ' + data[i].Remarks + '</td>';
                text += '<td> ' + data[i].Installment + '</td>';
                text += '<td> ' + data[i].NextDueDate + '</td>';
                text += '<td> ' + data[i].NextDueAmount + '</td>';
                text += '<td> ' + data[i].API + '</td>';
                //product Logo
                text +='<td>';
                if(data[i].ProductLogoPath=='' || data[i].ProductLogoPath==null )
                 {
                    text +='<span class="badge badge-danger">N/A</span>';
                 }
                 else
                 {
                    text += ' <br><a href=file?type=client&name=' + data[i].ProductLogoPath + ' target="_blank" title="VIEW" class="link-black text-sm mr-4"><i class="fas fa-paperclip mr-1"></i>Logo</a>';
                 }
                 text +='</td>';
                 
                //terms
                text +='<td>';
                if(data[i].TermsPath=='' || data[i].TermsPath==null )
                 {
                    text +='<span class="badge badge-danger">N/A</span>';
                 }
                 else
                 {
                    text += ' <br><a href=file?type=client&name=' + data[i].TermsPath + ' target="_blank" title="VIEW" class="link-black text-sm mr-4"><i class="fas fa-paperclip mr-1"></i>Terms</a>';
                 }
                text +='</td>';
                text += '<td class="btn-group btn-group-sm">';
                text += '    <a class="btn btn-info btn-sm text-white" onclick="onUnsubscribe(\'' + escape(JSON.stringify(data[i])) + '\')"> Unsubscribe </a>';
                text += '   <a class="btn btn-info btn-sm text-white" onclick="onEdit(\'' + escape(JSON.stringify(data[i])) + '\')"> <i class="fas fa-pencil-alt"> </i> </a>';
                text += '   <a class="btn btn-danger btn-sm text-white" onclick="onDelete(' + data[i].ClientSubscriptionID + ')"> <i class="fas fa-trash"> </i> </a>';
                // text += '   <a class="btn btn-success btn-sm text-white" onclick="createDomain(' + data[i].ProductID + ')">Create Domain </a>';
                text += '   <a class="btn btn-success btn-sm text-white"  onClick="ShowModal(\'' + escape(JSON.stringify(data[i])) + '\')">Create Domain </a>';
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

    function ShowModal(data){
        debugger;
        data = JSON.parse(unescape(data));
        ExtractClientSubscriptionID = data.ClientSubscriptionID;
        ProductID = data.ProductID;
        getDomainNameById();
    }

    function getDomainNameById(){
        debugger
        var obj = new Object();
        obj.Module = "Client";
        obj.Page_key = "getDomainNameById";
        var json = new Object();
        obj.JSON = json;
        json.ClientSubscriptionID = ExtractClientSubscriptionID;
        console.log(ExtractClientSubscriptionID);
        TransportCall(obj);
    }


    $("#btnUnsubscribe").click(function() {
        let obj = {};
        obj.Module = "Client";
        obj.Page_key = "Unsubscribe";
        let json = {};

        if($("#unsubscribereason").val()=='' || $("#unsubscribereason").val()==null)
        {
            notify('warning','Please specify the reason for Unsubscribe');
            return false;
        }
        else{
            json.unsubscribereason = $("#unsubscribereason").val();
        }

        if (code != null) {
            json.ClientSubscriptionID = code;
        }
        obj.JSON = json;
        // TransportCall(obj);
    });
    
    let term;
    $("#terms").change(function() {
        getBase64ForTerm($(this).prop('files')[0]);
    });
    let photo;
    $("#photo").change(function() {
        getBase64Logo($(this).prop('files')[0]);
    });

    $("#btnSave").click(function() {
        debugger;
        let obj = {};
        obj.Module = "Client";
        obj.Page_key = "addClientSubscription";
        let json = {};
        json.clientId = $("#ClientId").val();
        json.ProductId = $("#productID").val();
        json.SubscriptionId = $("#subscriptionId").val();
        json.StartDate = $("#startDate").val();
        json.Enddate = $("#endDate").val();
        json.Amount = $("#amount").val();
        json.MaxUser = $("#maxUser").val();
        json.TransactionId = $("#transactionId").val();
        json.Remarks = $("#remark").val();
        json.Installment = $("#installment").val();
        json.NextDueDate = $("#nextDueDate").val();
        json.nextDueAmount = $("#nextDueAmount").val();
        json.aPi = $("#api").val();
        
        json.Terms = term;
        json.Logo = photo;
       
        if (code != null) {
            json.ClientSubscriptionID = code;
        }

        // maxUser,amount,rate,installment,nextDueDate,nextDueAmount, // TO validate
    
        if ($("#ClientId").val() == -1  || $("#subscriptionId").val() == -1 || $("#productID").val() == -1) // added by dev on 26/10/23
        {
            notify("error", "Please Select All the important fields");
            return false;
        }

        if( $("#api").val() == '' || $("#startDate").val() == '' || $("#endDate").val() == '' || $("#remark").val() == '')
        {
            notify("error", "Please Filled all the important fields");
            return false; 
        }

        obj.JSON = json;
        TransportCall(obj);
    });

    //for term
    function getBase64ForTerm(file) {
        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function() {
            term = reader.result;
        };
        reader.onerror = function(error) {
        };
    }

    //for logo
    function getBase64Logo(file) {
        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function() {
            photo = reader.result;
        };
        reader.onerror = function(error) {
        };
    }


    function previewImage(event) { //added by dev on 03/11/2023
        var input = event.target;
        var image = document.getElementById('logo');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#createDomain").click(function() { // added by dev on 25/10/23
        debugger;
        let obj = {};
        obj.Module = "Settings";
        obj.Page_key = "createDomain";
        let data = {};
        data.ProductID = ProductID;
        data.domain_name = $("#domain_name").val();
        data.server = $("#server_name").val();
        obj.JSON = data;
         TransportCall(obj);
    });


    var code = null;

    function onEdit(data) {
        data = JSON.parse(unescape(data));
        //ClientID
        $('#ClientId').val(data.ClientID);
        $("#productID").val(data.ProductID).change();
        $("#productamount").val(data.productAmount);
        $("#subscriptionId").val(data.ProductSubscriptionID).change();
        $("#startDate").val(data.StartDate);
        $("#endDate").val(data.EndDate);
        $("#amount").val(data.Amount);
        $("#maxUser").val(data.MaxUsers);
        $("#remark").val(data.Remarks);
        $("#installment").val(data.Installment);
        $("#nextDueDate").val(data.NextDueDate);
        $("#nextDueAmount").val(data.NextDueAmount);
        $("#api").val(data.API);

        // $('#terms').prop('src', "file?type=client&name=" + data.TermsPath);  //term
        $('#logo').prop('src', "file?type=client&name=" + data.ProductLogoPath); //logo

        mode = 2;
        code = data.ClientSubscriptionID;
        $("#modal-lg").modal("show");
    }

   


    function onDelete(subscriptionId) {
        if (confirm("Are you sure you want to delete")) {
            let obj = {};
            obj.Module = "Client";
            let json = {};
            obj.Page_key = "deleteClientSubscription";
            json.subscriptionId = subscriptionId;
            obj.JSON = json;
            TransportCall(obj);
        }
    }

    // function createDomain(data)
    // {
    //   alert("NOT USING FOR NOW");
    // }


    var code = null;

    function onUnsubscribe(data) {
        data = JSON.parse(unescape(data));
        mode = 2;
        code = data.ClientSubscriptionID;
        $("#modal-unsubscribe").modal("show");
    }

    //$("#").val(data.ProductID).change();
    $("#productID").change(function() {
        getProductsubscription($("#productID").val());
    });
</script>

<script>
  
  const stepMenuOne = document.querySelector('.formbold-step-menu1')
  const stepMenuTwo = document.querySelector('.formbold-step-menu2')
  const stepMenuThree = document.querySelector('.formbold-step-menu3')

  const stepOne = document.querySelector('.formbold-form-step-1')
  const stepTwo = document.querySelector('.formbold-form-step-2')
  const stepThree = document.querySelector('.formbold-form-step-3')

  const formSubmitBtn = document.querySelector('.formbold-btn')
  const formBackBtn = document.querySelector('.formbold-back-btn')

  formSubmitBtn.addEventListener("click", function(event){
    event.preventDefault()
    if(stepMenuOne.className == 'formbold-step-menu1 active') {
        event.preventDefault()

        stepMenuOne.classList.remove('active')
        stepMenuTwo.classList.add('active')

        stepOne.classList.remove('active')
        stepTwo.classList.add('active')

        formBackBtn.classList.add('active')
        formBackBtn.addEventListener("click", function (event) {
          event.preventDefault()

          stepMenuOne.classList.add('active')
          stepMenuTwo.classList.remove('active')

          stepOne.classList.add('active')
          stepTwo.classList.remove('active')

          formBackBtn.classList.remove('active')
 
        })

      } else if(stepMenuTwo.className == 'formbold-step-menu2 active') {
        event.preventDefault()

        stepMenuTwo.classList.remove('active')
        stepMenuThree.classList.add('active')

        stepTwo.classList.remove('active')
        stepThree.classList.add('active')

        formBackBtn.classList.remove('active')
        formSubmitBtn.textContent = 'Submit'
      } else if(stepMenuThree.className == 'formbold-step-menu3 active') {
        document.querySelector('form').submit()
      }
  })
    

 
  
</script>