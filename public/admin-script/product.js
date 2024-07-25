$(function() {

    if ($('.dataList').length > 0) {
     
        $('.dataList').DataTable({
            language: { search: '', searchPlaceholder: "Search..." },
            processing: true,
            serverSide: true,
            pageLength: 50,
            "dom": "lifrtp",
            initComplete: function() {},
            'ajax': {
                'url': base_url + '/product/product-list',
               'data': function(data) {
                    var type = $('input[name="type"]:checked').val();
                    data.type = type;
                }
            },
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                if (aData['deleted_at']) {
                    $('td', nRow).css('background-color', 'rgb(243, 204, 204)');
                }
            },
            columns: [{
                    orderable: true,
                    data: "null",
                    width: '100',
                    autoWidth: false,
                    render: function(data, type, row, meta) {
                     if(row.recordId){
                         return row.recordId;
                     }else{
                         return  1;
                     }
                    }
                },
               
                {
                    orderable: false,
                    data: "null",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                     if(full.name){
                         return full.name;
                     }else{
                         return "No Data"
                     }
                        
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                     if(full.description){
                         return full.description;
                     }else{
                         return "No Data"
                     }
                        
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                     if(full.price){
                         return full.price;
                     }else{
                         return "No Data"
                     }
                        
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                        if(full.status==1)
                            var checkvalue  =   'checked';
                        else
                            var checkvalue  =   "";
                        return '<label class="switch pr-5 switch-primary mr-3"><span></span><input type="checkbox" id="status'+full.id+'" onclick="toggle_button('+full.id+')" '+checkvalue+'><span class="slider"></span></label>';                    
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                        if (full.created_at) {
                            var date = new Date(full.created_at);
                            var options = { 
                                year: 'numeric', 
                                month: 'long', 
                                day: 'numeric',
                                hour: '2-digit', 
                                minute: '2-digit', 
                                second: '2-digit',
                                hour12: true 
                            };
                            var formattedDateTime = date.toLocaleString('en-US', options);
                
                            return formattedDateTime;
                        } else {
                            return "No Data";
                        }
                    }
                }
                
                
            ],
            "columnDefs": [{
                width: '100',
                "targets": 6,
                "visible": true,
                "render": function(data, type, full) {
                
                 return '<td><a class="text-success  btn bg-gray-100" href="' + base_url + '/product/edit/' + full.encrypt_id + '""><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>'+
                     '<button type="button" class="text-danger  btn bg-gray-100" onclick="deleteConfirm('+full.id+')"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>'+
                     '</td>';
               
 
                  
                }
            }],
            createdRow: function(row, data, dataIndex) {
                setTimeout(function() {
                    $('.dataList tbody').addClass("m-datatable__body");
                    $('.dataList tbody tr:odd').addClass("m-datatable__row m-datatable__row--odd");
                    $('.dataList tbody tr:even').addClass("m-datatable__row m-datatable__row--even");
                    $('.dataList td').addClass("m-datatable__cell");
                    $('.dataList input').addClass("form-control m-input");
                    $('.dataList tr').css('table-layout', 'fixed');
                });
            }
        });
    }
 });
 
 
 


 function deleteConfirm(id) {
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0CC27E',
        cancelButtonColor: '#FF586B',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success mr-5',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function() {
        $.ajax({
            type: "get",
            url: base_url + '/product/delete/' + id,
            success: function(data) {
                if (data.status == 'success') {
                    swal('Deleted');
                    $('.dataList').DataTable().ajax.reload();
                } else {
                    swal('Cancelled', 'Scheme Available');
                }
              
            }
        });
    }, function(dismiss) {
        if (dismiss === 'cancel') {
            swal('Cancelled', 'Your file is safe :)', 'error');
        }
    });
}
function toggle_button(id){
 
    if (document.getElementById('status'+id).checked)
        status_val = '1';
    else
        status_val = '0';
    var data = {
        id: id,
        status: status_val
    };
   
    $.ajax({
        type: "post",
        data: data,
        url: base_url + '/product/status',
        async: true,
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
         if (data.status == 'success') {
             swal(  'Status Updated');
             $('.dataList').DataTable().ajax.reload();
         } else {
             swal('Cancelled', 'Scheme Available');
         }
        }
    });
 }