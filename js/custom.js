var manageuserTable;
var manageclassesTable;
var managesectionsTable;
var managestudentsTable;
var manageteachersTable;
var manageSchool;
var managecategories;
var managesub_categories;
var manageproducts;
var managesupplier;

$(document).ready(function () {

    //Click on Image for Uploading Image
    $("#blah").click(function() {
    $("#uploadPic").click();
    });

    $('.datepicker').datepicker();

    $.fn.dataTable.ext.errMode = 'throw';
    manageSchool = $('#school').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "js/loaddata.php", // json datasource
            data: {action: 'loadSchool'},
            type: 'post',  // method  , by default get
        },
        'order': []     
    });

    manageuserTable = $('#users').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "js/loaddata.php", // json datasource
            data: {action: 'loadUsers'},
            type: 'post',  // method  , by default get
        },
        'order': []     
    });

    manageclassesTable = $('#classes').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "js/loaddata.php", // json datasource
            data: {action: 'loadclasses'},
            type: 'post',  // method  , by default get
        },
        'order': []
    });

    managesectionsTable = $('#sections').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "js/loaddata.php", // json datasource
            data: {action: 'loadsections'},
            type: 'post',  // method  , by default get
        },
        'order': []
    });

    managestudentsTable = $('#students').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "js/loaddata.php", // json datasource
            data: {action: 'loadstudents'},
            type: 'post',  // method  , by default get
        },
        'order': []
    });

    manageteachersTable = $('#teachers').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "js/loaddata.php", // json datasource
            data: {action: 'loadteacher'},
            type: 'post',  // method  , by default get
        },
        'order': []
    });

    managecategories = $('#categories').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "js/loaddata.php", // json datasource
            data: {action: 'loadcategories'},
            type: 'post',  // method  , by default get
        },
        'order': []
    });

    managesub_categories = $('#sub_categories').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "js/loaddata.php", // json datasource
            data: {action: 'loadsub_categories'},
            type: 'post',  // method  , by default get
        },
        'order': []
    });

    manageproducts = $('#products').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "js/loaddata.php", // json datasource
            data: {action: 'loadproducts'},
            type: 'post',  // method  , by default get
        },
        'order': []
    });

    managesupplier = $('#supplier').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "js/loaddata.php", // json datasource
            data: {action: 'loadsupplier'},
            type: 'post',  // method  , by default get
        },
        'order': []
    });

    loadAttendance = $('#loadAttendance').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "js/loaddata.php", // json datasource
            data: {action: 'loadAttendance'},
            type: 'post',  // method  , by default get
        },
        'order': []
    });

    $('.feeReport').DataTable({
        dom: 'lBfrtip',
        buttons: [{
            extend: 'print',
            exportOptions: {
            columns: ':visible'
            }
        }, 'colvis'],
        columnDefs: [{
            targets: -1,
            visible: false
        }],
        select: true,
        responsive: true,
        stateSave: true,
        'autoWidth'   : true,
    });

    $('.operationalReport').DataTable({
        dom: 'lBfrtip',
        'order': [],
        buttons: [{
            extend: 'print',
            exportOptions: {
            columns: ':visible'
            }
        }, 'colvis'],
        columnDefs: [{
            targets: -1,
            visible: true
        }],
        select: true,
        responsive: false,
        stateSave: true,
        'autoWidth'   : true,
    });

    //Save Data into Database
    $("#formData").on('submit',function(e) {
        e.preventDefault();
        var form = $('#formData');
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function() {
                $('#saveData').attr("disabled","disabled");
                $('#saveData').text("Loading...");
            },
            success:function (msg,status) {
                console.log(msg)
                $('#saveData').text("Save");
                $('#formData').each(function(){
                    this.reset();
                    // setTimeout(function(){
                    //     location.reload()
                    // }, 2000);

                });    
                $('#saveData').removeAttr("disabled");
                $('#formData').css("opacity","");   
                $("#blah").attr("src","img/place.png");
                $('.msg').text(msg).addClass("alert alert-success").fadeIn(6000).fadeOut(4000);
                manageuserTable.ajax.reload(null, false);
                manageclassesTable.ajax.reload(null, false);
                managesectionsTable.ajax.reload(null, false);
                managestudentsTable.ajax.reload(null, false);
                manageteachersTable.ajax.reload(null, false);
                manageSchool.ajax.reload(null, false);
                managecategories.ajax.reload(null, false);
                managesub_categories.ajax.reload(null, false);
                manageproducts.ajax.reload(null, false);
                managesupplier.ajax.reload(null, false);
            }
        });//ajax call
    });//main

    //Save Fee Module into Database
    $("#collectFee").on('submit',function(e) {
        e.preventDefault();
        var form = $('#collectFee');
        var page_pointer = $("#page_pointer").val();
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function() {
                $('#saveFee').attr("disabled","disabled");
                $('#saveFee').text("Loading...");
            },
            success:function (msg,status) {
                console.log(msg);
                $('#saveFee').text("Save");
                $('#saveFee').removeAttr("disabled");
                $('#collectFee').css("opacity","");
                $('#collectFee').each(function(){
                    this.reset();
                });    
                $('.msg').text(msg[2]).addClass("alert alert-success").fadeIn(6000).fadeOut(4000);
                // window.location = "print_receipt.php?student_id="+msg[0]+"&paid_month="+msg[1];
                window.open("print_receipt.php?student_id="+msg[0]+"&paid_month="+msg[1], '_blank'); 
            }
        });//ajax call
    });//main

    //Fetech Data From Database For Editing
    $(document).on('click','.update',function () {
        var edit_user_id = $(this).attr("id");
        var tbl = $("#table_name").val();
        var col = $("#col_name").val();
        console.log(edit_user_id)
        $.ajax({
            url:'inc/code.php',
            type:"POST",
            data:{edit_user_id:edit_user_id, tbl2:tbl, col2:col},
            dataType:"json",
            success:function(data) {       
                if (tbl == 'users') {
                    //userss table 
                    $("#blah").attr("src","img/"+data.user_pic);
                    $("#user_id").val(data.user_id);
                    $("#user_name").val(data.user_name);
                    $("#user_address").val(data.user_address);
                    $("#user_phone").val(data.user_phone);
                    $("#user_email").val(data.user_email);
                    $("#user_pass").val(data.user_pass);
                    $('#user_sts option[value="'+data.user_sts+'"]').prop("selected", true); 
                    $("#dataModal").modal("show");
                }else if (tbl == 'supplier') {
                    $("#supplier_id").val(data.supplier_id);
                    $("#supplier_name").val(data.supplier_name);
                    $("#supplier_phone").val(data.supplier_phone);
                    $("#supplier_previous").val(data.supplier_previous);
                    $('#supplier_sts option[value="'+data.supplier_sts+'"]').prop("selected", true); 
                    $("#dataModal").modal("show");
                }else if (tbl == 'classes') {
                    $("#class_id").val(data.class_id);
                    $("#class_name").val(data.class_name);
                    $("#class_fee").val(data.class_fee);
                    $("#dataModal").modal("show");
                }else if (tbl == 'sections') {
                    $("#section_id").val(data.section_id);
                    $("#section_name").val(data.section_name);
                    $('#section_sts option[value="'+data.section_sts+'"]').prop("selected", true); 
                    $("#dataModal").modal("show");
                }else if (tbl == 'categories') {
                    $("#category_id").val(data.category_id);
                    $("#category_name").val(data.category_name);
                    $('#category_sts option[value="'+data.category_sts+'"]').prop("selected", true); 
                    $("#dataModal").modal("show");
                }else if (tbl == 'sub_categories') {
                    $("#sub_category_id").val(data.sub_category_id);
                    $("#sub_category_name").val(data.sub_category_name);
                    $('#sub_category_sts option[value="'+data.sub_category_sts+'"]').prop("selected", true); 
                    $("#dataModal").modal("show");
                }else if (tbl == 'products') {
                    $("#product_name").val(data.product_name);
                    $("#product_id").val(data.product_id);
                    $("#purchase_price").val(data.purchase_price);
                    $("#sale_price").val(data.sale_price);
                    $("#product_qty").val(data.product_qty);
                    $('#category_id option[value="'+data.category_id+'"]').prop("selected", true); 
                    $('#sub_category_id option[value="'+data.sub_category_id+'"]').prop("selected", true); 
                    $('#product_sts option[value="'+data.product_sts+'"]').prop("selected", true); 
                    $("#dataModal").modal("show");
                }else if (tbl == 'teachers') {
                    $("#blah").attr("src","img/"+data.teacher_pic);
                    $('#teacher_name').val(data.teacher_name);
                    $('#teacher_id').val(data.teacher_id);
                    $('#f_name').val(data.f_name);
                    $('#teacher_cnic').val(data.teacher_cnic);
                    $('#teacher_email').val(data.teacher_email);
                    $('#teacher_dob').val(data.teacher_dob);
                    $('#teacher_fee').val(data.teacher_fee);
                    $('#teacher_qualification').val(data.teacher_qualification); 
                    $('#teacher_gender option[value="'+data.teacher_gender+'"]').prop("selected", true); 
                    $('#teacher_contact').val(data.teacher_contact);
                    $('#teacher_role').val(data.teacher_role);
                    $('#teacher_sts option[value="'+data.teacher_sts+'"]').prop("selected", true); 
                    $('#teacher_address').val(data.teacher_address);
                }else if (tbl == 'students') {
                    $("#blah").attr("src","img/"+data.student_pic);
                    $("#student_id").val(data.student_id)
                    $("#student_name").val(data.student_name)
                    $("#f_name").val(data.f_name)
                    $("#student_cnic").val(data.student_cnic)
                    $("#student_dob").val(data.student_dob)
                    $('#class_id option[value="'+data.class_id+'"]').prop("selected", true); 
                    $('#section_id option[value="'+data.section_id+'"]').prop("selected", true); 
                    $('#student_gender option[value="'+data.student_gender+'"]').prop("selected", true); 
                    $("#student_phone").val(data.student_phone)
                    $('#student_sts option[value="'+data.student_sts+'"]').prop("selected", true); 
                    if (data.january == 1) {
                        $('#jan').prop("checked", true);
                    }
                    if (data.february == 1) {
                        $('#february').prop("checked",true);
                    }
                    if (data.march == 1) {
                        $('#march').prop("checked",true);
                    }
                    if (data.april == 1) {
                        $('#april').prop("checked",true);
                    }
                    if (data.may == 1) {
                        $('#may').prop("checked",true);
                    }
                    if (data.june == 1) {
                        $('#june').prop("checked",true);
                    }
                    if (data.july == 1) {
                        $('#july').prop("checked",true);
                    }
                    if (data.august == 1) {
                        $('#august').prop("checked",true);
                    }
                    if (data.september == 1) {
                        $('#september').prop("checked",true);
                    }
                    if (data.october == 1) {
                        $('#october').prop("checked",true);
                    }
                    if (data.november == 1) {
                        $('#november').prop("checked",true);
                    }
                    if (data.december == 1) {
                        $('#december').prop("checked",true); 
                    }
                    
                    $("#student_address").val(data.student_address)
                }
            }
        });
    });//main 

    //Delete Data Modules
    $(document).on('click','.delete',function () {
        var deleteid = $(this).attr("id");
        var tbl = $("#table_name").val();
        var col = $("#col_name").val();
        var alert = confirm("Are You Sure You want to Delete? Because You cant Restore it?");
        if (alert == true) {
            $.ajax({
                type: 'POST',
                url:'inc/code.php',
                data:{deleteid:deleteid, tbl2:tbl, col2:col},
                success:function (data) {
                    console.log(data)
                    manageuserTable.ajax.reload(null, true);
                    manageclassesTable.ajax.reload(null, false);
                    managesectionsTable.ajax.reload(null, false);
                    managestudentsTable.ajax.reload(null, false);
                    manageteachersTable.ajax.reload(null, false);
                    manageSchool.ajax.reload(null, false);
                    managecategories.ajax.reload(null, false);
                    managesub_categories.ajax.reload(null, false);
                    manageproducts.ajax.reload(null, false);
                    managesupplier.ajax.reload(null, false);
                    $('.msg').text("Data Deleted Successfully").addClass("alert alert-danger").fadeIn(3000).fadeOut(3000);
                }
            });//ajax call
        }else{
            return false;
        }
    });//main 

    var a = new Date();
    var b = a.getFullYear();
    $('.collect_fee_year option').filter(function() { 
        return ($(this).text() == b); //To select Blue
    }).prop('selected', true);

    $(document).on('click',function () {
        grandTotal();
        grandTotalPurchase();
    });

    $(document).on('change','#supplier_id',function () {
        var supplier_id = $("#supplier_id").val();
        $.ajax({
            url:'inc/code.php',
            type:"POST",
            data:{supplier_id:supplier_id},
            dataType:"json",
            success:function(data) {  
                $('#supplier_previous').html(data.supplier_previous);
            }
        });
    });

    $(document).on('change','#student_id',function () {
        var student_id = $("#student_id").val();
        $.ajax({
            url:'inc/code.php',
            type:"POST",
            data:{student_id:student_id},
            dataType:"json",
            success:function(data) {  
                $('#student_previous').html(data.student_previous);
            }
        });
    });

    //Edit Purchase
    if ($(".editModule") != "") {
        $("#supplier_id").trigger('change'); 
        $("#student_id").trigger('change'); 
        var i;
        for(i=1; i<=10; i++){
            getProductData(i);
        }
    }

    // alert($('#loggedin_user').val());

}); //document ready



// ****************************************************** Functions ***************************************************************\\
// ****************************************************** Functions ***************************************************************\\
// ****************************************************** Functions ***************************************************************\\

function getPaidDue() {
    var purchase_grand_total = $("#purchase_grand_total").val();
    var supplier_previous = $("#supplier_previous").html();
    var purchase_paid = $("#purchase_paid").val();
    var ggTotal = Number(purchase_grand_total) + Number(supplier_previous);
    var due = (Number(purchase_grand_total) + Number(supplier_previous)) - Number(purchase_paid);
    $('#ggTotal').html(ggTotal);
    $('#purchase_due').val(due);
}

var focus_on = 1;

//Add Dynamic Row form
function addRow() {
    $("#addRowBtn").button("loading");
    var tableLength = $("#feeTable tbody tr").length;
    var tableRow;
    var arrayNumber;
    var count;
    if (tableLength > 0) {
        tableRow = $("#feeTable tbody tr").last().attr('id');
        arrayNumber = $("#feeTable tbody tr").last().attr('id');
        count = tableRow.substring(3);
        arrayNumber = arrayNumber.substring(3);
        count = Number(count) + 1;
        arrayNumber = Number(arrayNumber) + 1;
    }else{
        count = 1;
        arrayNumber = 1;
    }
    var getData = 'options';

    $.ajax({
        url:"js/loaddata.php",
        type:"POST",
        data:{getData:getData},
        dataType:"json",
        success:function(response) {
            $('#addRowBtn').button('reset');
            var tr = '<tr id="row'+count+'" class="'+arrayNumber+'"><td><input onchange="getStudentData('+count+');" list="lst" id="student_id'+count+'" autocomplete="off" name="student_id[]" class="form-control"><datalist id="lst"><option>~~SELECT~~</option>';
                    $.each(response.data,function(index,value) {
                        tr += '<option value="'+value["student_id"]+'">'+value["student_name"]+'</option>';
                    });

            tr += '</datalist><input type="text" id="student_name'+count+'" name="student_name[]" class="form-control" readonly></td><td>\
                                    <input type="text" onkeyup="subTotal('+count+');" id="student_fee'+count+'" name="student_fee[]" class="form-control">\
                                </td>\
                                <td>\
                                    <input type="text" id="student_previous'+count+'" name="student_previous[]" readonly class="form-control"><span class="text-danger">Remaining Dues = <span id="remain_due'+count+'"></span></span>\
                                </td>\
                                <td>\
                                    <input type="text" id="student_total'+count+'" name="student_total[]" readonly class="form-control">\
                                </td>\
                                <td>\
                                    <input type="text" onkeyup="calcRemain('+count+');" id="student_received'+count+'" name="student_received[]" class="form-control">\
                                </td><td><button type="button" onclick="removeRow('+count+')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td></tr>';
            
            if (tableLength > 0) {
                $("#feeTable tbody tr").last().after(tr);
                focus_on = focus_on+1;
                $("#student_id"+focus_on).focus();
            }else{
                $("#feeTable tbody tr").last().append(tr);
            }
        }//ajax success
    });//ajax call
}//add row   

function getStudentData(row = null) {
    var student_id = $('#student_id'+row).val();
    $.ajax({
        url:'inc/code.php',
        type:"POST",
        data:{student_id:student_id},
        dataType:"json",
        success:function(data) {  
            $('#student_name'+row).val(data.student_name+" ("+data.class_name+")"+" S/O "+data.f_name);
            $('#student_fee'+row).val(data.class_fee);
            $('#student_previous'+row).val(data.student_previous);
            if (data.january == 1) {
                $('.january'+row).prop("selected", true);
            }
            if (data.february == 1) {
                $('.february'+row).prop("selected",true);
            }
            if (data.march == 1) {
                $('.march'+row).prop("selected",true);
            }
            if (data.april == 1) {
                $('.april'+row).prop("selected",true);
            }
            if (data.may == 1) {
                $('.may'+row).prop("selected",true);
            }
            if (data.june == 1) {
                $('.june'+row).prop("selected",true);
            }
            if (data.july == 1) {
                $('.july'+row).prop("selected",true);
            }
            if (data.august == 1) {
                $('.august'+row).prop("selected",true);
            }
            if (data.september == 1) {
                $('.september'+row).prop("selected",true);
            }
            if (data.october == 1) {
                $('.october'+row).prop("selected",true);
            }
            if (data.november == 1) {
                $('.november'+row).prop("selected",true);
            }
            if (data.december == 1) {
                $('.december'+row).prop("selected",true); 
            }
            subTotal(row); 
            grandTotal();
        }
    });
}// For Collect Fee

function getStudentID(row = null){
    var student_id = $('#student_id'+row).val();
    $.ajax({
        url:'inc/code.php',
        type:"POST",
        data:{student_id:student_id},
        dataType:"json",
        success:function(data) {  
            $('#student_name'+row).val(data.student_name+" ("+data.class_name+")"+" S/O "+data.f_name);
            $('#searChBtn').html('<a href="index.php?nav=attendance_report&class_id='+data.class_id+'&student_id='+data.student_id+'" id="showID" class="btn btn-sm btn-info" style="margin-top:10px;border-radius:7px;"> Search</a>')
        }
    });
}//For attendance Report

function subTotal(row = null) {
    if (row) {
        var student_fee = $('#student_fee'+row).val();
        var student_previous = $('#student_previous'+row).val();
        var total = parseInt(student_fee) + parseInt(student_previous);
        $("#student_total"+row).val(parseInt(total));
    }else{
        alert("Error Please Refresh Your Page For Fetching Data");
    }
}

function calcRemain(row = null) {
    if (row) {
        var student_total = $('#student_total'+row).val();
        var student_received = $('#student_received'+row).val();
        var total = parseInt(student_total) - parseInt(student_received);
        $("#remain_due"+row).html(parseInt(total));
    }else{
        alert("Error Please Refresh Your Page For Fetching Data");
    }
}

function grandTotal() {
    var feeTable = $("#feeTable tbody tr").length;
    var subtotalAmount = 0;
    for (var i = 0; i < feeTable; i++) {
        var tr = $("#feeTable tbody tr")[i]
        var count = $(tr).attr('id');
        count = count.substring(3);
        subtotalAmount = Number(subtotalAmount)+Number($("#student_total"+count).val());
    }
    subtotalAmount = subtotalAmount.toFixed(2);
    //sub total
    $("#student_grand_total").val(subtotalAmount);
}



//********************************************** TEacher Module Start *********************************************************\\
//********************************************** TEacher Module Start *********************************************************\\
//********************************************** TEacher Module Start *********************************************************\\



//Add Dynamic Row form
function addTeacherRow() {
    $("#addRowBtnTeacher").button("loading");
    var tableLength = $("#salaryTable tbody tr").length;
    var tableRow;
    var arrayNumber;
    var count;
    if (tableLength > 0) {
        tableRow = $("#salaryTable tbody tr").last().attr('id');
        arrayNumber = $("#salaryTable tbody tr").last().attr('id');
        count = tableRow.substring(3);
        arrayNumber = arrayNumber.substring(3);
        count = Number(count) + 1;
        arrayNumber = Number(arrayNumber) + 1;
    }else{
        count = 1;
        arrayNumber = 1;
    }
    var getTeachers = 'teachers';

    $.ajax({
        url:"js/loaddata.php",
        type:"POST",
        data:{getTeachers:getTeachers},
        dataType:"json",
        success:function(response) {
            $('#addRowBtnTeacher').button('reset');
            var tr = '<tr id="row'+count+'" class="'+arrayNumber+'"><td><input onchange="getTeachersData('+count+');" list="lst" id="teacher_id'+count+'" autocomplete="off" name="teacher_id[]" class="form-control"><datalist id="lst"><option>~~SELECT~~</option>';
                    $.each(response.data,function(index,value) {
                        tr += '<option value="'+value["teacher_id"]+'">'+value["teacher_name"]+'</option>';
                    });

            tr += '</datalist><input type="text" id="teacher_name'+count+'" name="teacher_name[]" class="form-control" readonly><input type="hidden" id="teacher_previous'+count+'" name="teacher_previous[]" class="form-control"</td>';
            tr +=   '<td><input type="text" class="form-control" name="teacher_salary[]" id="teacher_salary'+count+'"></td>';           
            tr += '<td>\
                        <input type="text" onkeyup="subTotalForSalary('+count+');" class="form-control" name="teacher_paid[]" id="teacher_paid'+count+'"><span class="text-danger">Remaining Dues = <span id="balance'+count+'"></span></span>\
                    </td>\
            <td><button type="button" onclick="removeRow('+count+')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td></tr>';
            
            if (tableLength > 0) {
                $("#salaryTable tbody tr").last().after(tr);
                focus_on = focus_on+1;
                $("#teacher_id"+focus_on).focus();
            }else{
                $("#salaryTable tbody tr").last().append(tr);
            }
        }//ajax success
    });//ajax call
}//add row   

function getTeachersData(row = null){
    var teacher_id = $('#teacher_id'+row).val();
    $.ajax({
        url:'inc/code.php',
        type:"POST",
        data:{teacher_id:teacher_id},
        dataType:"json",
        success:function(data) {  
            $('#teacher_name'+row).val(data.teacher_name+" S/O "+data.f_name);
            $('#teacher_salary'+row).val(data.teacher_fee);
            $('#teacher_previous'+row).val(data.teacher_balance);
            $('#balance'+row).val(data.teacher_balance);
            subTotalForSalary(row);
        }
    });
}

function subTotalForSalary(row = null) {
    if (row) {
        var teacher_transaction = $('#teacher_transaction').val();
        var teacher_previous = $('#teacher_previous'+row).val();
        var teacher_salary = $('#teacher_salary'+row).val();
        var teacher_paid = $('#teacher_paid'+row).val();
        var total = (parseInt(teacher_previous) + parseInt(teacher_salary)) - parseInt(teacher_paid);
        $("#balance"+row).html(total);
    }else{
        alert("Error Please Refresh Your Page For Fetching Data");
    }
}

//********************************************** Purchase Module Start *********************************************************\\
//********************************************** Purchase Module Start *********************************************************\\
//********************************************** Purchase Module Start *********************************************************\\



function addPurchaseRow() {
    $("#addRowBtnTeacher").button("loading");
    var tableLength = $("#productTable tbody tr").length;
    var tableRow;
    var arrayNumber;
    var count;
    if (tableLength > 0) {
        tableRow = $("#productTable tbody tr").last().attr('id');
        arrayNumber = $("#productTable tbody tr").last().attr('id');
        count = tableRow.substring(3);
        arrayNumber = arrayNumber.substring(3);
        count = Number(count) + 1;
        arrayNumber = Number(arrayNumber) + 1;
    }else{
        count = 1;
        arrayNumber = 1;
    }
    var product_id = 'product_id';

    $.ajax({
        url:"inc/code.php",
        type:"POST",
        data:{product_id:product_id},
        dataType:"json",
        success:function(response) {
            $('#addRowBtnTeacher').button('reset');
            console.log(response.data)
            var tr = '<tr id="row'+count+'" class="'+arrayNumber+'"><td><input onchange="getProductData('+count+');" list="lst1" id="product_id'+count+'" autocomplete="off" name="product_id[]" class="form-control"><datalist id="lst1"><option>~~SELECT~~</option>';
                    $.each(response.data,function(index,value) {
                        tr += '<option value="'+value["product_id"]+'">'+value["product_name"]+'</option>';
                    });
            tr += '</datalist><input type="text" id="product_name'+count+'" name="product_name[]" class="form-control" readonly></td>\
                                <td>\
                                    <input type="number" onkeyup="subTotalQty('+count+');" id="sale_price'+count+'" name="sale_price[]" class="form-control">\
                                    <div class="input-group input-group-primary">\
                                    <span class="input-group-prepend"><label class="input-group-text">Previous Price :</label></span>\
                                    <input class="form-control" readonly="" id="previous_price'+count+'" name="previous_price[]">\
                                    <div class="input-group input-group-primary">\
                                        <span class="input-group-prepend"><label class="input-group-text">Stock :</label></span>\
                                        <input class="form-control" readonly="" id="stock'+count+'" name="stock[]">\
                                    </div>\
                                </td>\
                                <td>\
                                    <input type="number" onkeyup="subTotalQty('+count+');" id="product_qty'+count+'" name="product_qty[]" class="form-control">\
                                </td>\
                                <td>\
                                    <input type="number" id="product_total'+count+'" name="product_total[]" class="form-control">\
                                </td>\
                                <td>\
                                    <button type="button" onclick="removeRow('+count+')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>\
                                </td>\
                            </tr>';
            
            if (tableLength > 0) {
                $("#productTable tbody tr").last().after(tr);
                focus_on = focus_on+1;
                $("#product_id"+focus_on).focus();
            }else{
                $("#productTable tbody tr").last().append(tr);
            }
        }//ajax success
    });//ajax
}// main

function getProductData(row = null) {
    var product_id = $('#product_id'+row).val();
    var saleORpuchase = $('#saleORpuchase').val();
    $.ajax({
        url:'inc/code.php',
        type:"POST",
        data:{product_id:product_id},
        dataType:"json",
        success:function(response) {  
            $('#product_name'+row).val(response.data.product_name+" "+response.data.category_name+" "+response.data.sub_category_name);
            if (saleORpuchase == 'sale') {
                $('#sale_price'+row).val(response.data.sale_price);
            }else{
                $('#sale_price'+row).val(response.data.purchase_price);
            }
            $('#stock'+row).val(response.data.product_qty);            
            $('#previous_price'+row).val(response.data.purchase_price); 
            subTotalQty(row);   
            getPaidDue();    
            getPaidDueForSale();     
        }
    });    
}

function subTotalQty(row = null) {
    if (row) {
        var sale_price = $('#sale_price'+row).val();
        var product_qty = $('#product_qty'+row).val();
        var stock = $('#stock'+row).val();
        if ($(".editModule") == "") {
            if (parseInt(product_qty) > parseInt(stock)) {
                alert("You Don't have enough Quantity In Stock");
                $('#product_qty'+row).val("");
            }else{
                var product_total = parseInt(sale_price) * parseInt(product_qty);
                $("#product_total"+row).val(parseInt(product_total));
                grandTotalPurchase();
                getPaidDue();
                getPaidDueForSale();
            }
        }else{
            var product_total = parseInt(sale_price) * parseInt(product_qty);
            $("#product_total"+row).val(parseInt(product_total));
            grandTotalPurchase();
            getPaidDue();
            getPaidDueForSale();
        }
    }else{
        alert("Error Please Refresh Your Page For Fetching Data");
    }
}

function grandTotalPurchase() {
    var productTable = $("#productTable tbody tr").length;
    var subtotalAmount = 0;
    for (var i = 0; i < productTable; i++) {
        var tr = $("#productTable tbody tr")[i]
        var count = $(tr).attr('id');
        count = count.substring(3);
        subtotalAmount = Number(subtotalAmount)+Number($("#product_total"+count).val());
    }
    subtotalAmount = subtotalAmount.toFixed(2);
    //sub total
    $("#purchase_grand_total").val(subtotalAmount);
}



// ****************************************************** Sale Module ***************************************************************\\
// ****************************************************** Sale Module ***************************************************************\\
// ****************************************************** Sale Module ***************************************************************\\

function getPaidDueForSale() {
    var purchase_grand_total = $("#purchase_grand_total").val();
    var student_previous = $("#student_previous").html();
    var purchase_paid = $("#purchase_paid").val();
    var ggTotal = Number(purchase_grand_total) + Number(student_previous);
    var due = (Number(purchase_grand_total) + Number(student_previous)) - Number(purchase_paid);
    $('#ggTotal').html(ggTotal);
    $('#purchase_due').val(due);
}



//***************************************************** General Functions ****************************************************\\
//***************************************************** General Functions ****************************************************\\
//***************************************************** General Functions ****************************************************\\



function removeRow(row=null) {
    if (row) {
        $("#row"+row).remove();
        focus_on--;
        $("#student_id"+focus_on).focus();
        $("#teacher_id"+focus_on).focus();
        $("#product_id"+focus_on).focus();
        getPaidDue();
        getPaidDueForSale();
        grandTotal();
        grandTotalPurchase();
    }else{
        alert("Error Please Refresh Your Page");
    }
}

//File Input With Preview and Validation
function readURL(input) {
    if (input.files && input.files[0]) {
        var fileExtension = ['jpeg', 'jpg', 'png'];
        var fileSize = (input.files[0].size);
        var reader = new FileReader;
        reader.onload = function () { //file is loaded
            //check image Extentions
            if ($.inArray($(input).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            Swal.fire({
                type: 'error',
                title: 'Only formats are allowed :' + fileExtension.join(', '),
                showConfirmButton: true,
                timer: 4000
            });
            }else{
                //check image size
                if (fileSize > 2000000) {
                Swal.fire({
                    type: 'error',
                    title: 'You can upload More Than 2MB of Image',
                    showConfirmButton: true,
                    timer: 4000
                });
                }else{
                    var img = new Image;
                    img.src = reader.result;
                    img.onload = function() {
                        if (this.width != this.height) {
                            $('#blah').attr('src', reader.result);   
                        }else{
                        Swal.fire({
                        type: 'error',
                        title: 'The Image Must be 1:1 Size',
                        showConfirmButton: true,
                        timer: 4000
                        });
                        }
                    }    
                }
            }
        };
    reader.readAsDataURL(input.files[0]); 
    }
}//image upload function

//PROMOTE CLASS
$(document).on('click','#promoteBTN',function (){
     var promote_val = [];
        $(':checkbox:checked').each(function(i){
          promote_val[i] = $(this).val();
        });
        var opt=$('#whichClass :selected').val();
        $.ajax({
            url:'inc/code2.php',
            type:"POST",
            data:{promote_val:promote_val,opt:opt},
            dataType:"json",
            success:function(data) {
               $('.msg').text(data).addClass("alert alert-success").fadeIn(1000).fadeOut(4000);
               setTimeout(function () {
                   window.location.href= 'index.php?nav=promote_classes&class_id='+opt; // the redirect goes here

                },4000); // 5 seconds
            }
        });
})
