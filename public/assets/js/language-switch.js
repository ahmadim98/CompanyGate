const translations = getTranslation();

function translateSite(){

  lang = localStorage.getItem("lang");
    
    var searchNews_index = null;

    if (lang === 'ar') {
        
        for (var i=0; i < translations.length; i++) {
            //console.log(translations[i].id);
            if($('.'+translations[i].id+'').length){
                console.log("now inside "+translations[i].arabic_name);
                $('.'+translations[i].id+'').append(translations[i].arabic_name);
            }

            if(translations[i].id == "placeholder_search") {
                searchNews_index = i;
            }
        }

        $(".newticket_button").append("<i class='fe fe-arrow-left fe-16 ml-2'></i>");
        
        $('#search1').attr('placeholder',translations[searchNews_index].arabic_name);

        //here is the part for employees page
        if($('#dataTable-1').length)
        {
            $("#dataTable-1").dataTable().fnDestroy();
            
            $('#dataTable-1').DataTable(
                {
                  ajax:{url:'http://localhost/api/getemployers',dataSrc:''},
                  columns: [
                    { "title": "رقم الموظف" , data: 'empID' },
                    { "title": "الاسم" , data: 'name' },
                    { "title": "البريد الالكتروني" , data: 'email' },
                    { "title": "رقم الهاتف" , data: 'phone' ,"defaultContent": "0"},
                    { "title": "رقم التحويلة" , data: 'ext' ,"defaultContent": "0"},
                    { "title": "المسمى الوظيفي" , data: 'position' ,"defaultContent": "none"},
                    { "title": "القسم" , data: 'department' ,"defaulContent": "None"},
                  ],
                  "columnDefs": [
                    { "width": "0.5%", "targets": 0 }
                  ],
                  autoWidth: true,
                  "lengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"]
                  ],
                  "language": translateGlobalTable(),
                 //dom: 'fl<"toolbar">rtip',
            });
        }

        console.log('Data table exist or not = '+$('#dataTable-2').length);

        if($('#dataTable-2').length)
        {
            $("#dataTable-2").dataTable().fnDestroy();
            
            $('#dataTable-2').DataTable(
                {
                  ajax:{url:'http://localhost/api/getnews',dataSrc:''},
                  columns: [
                    { "title": "" , data: null, "defaultContent": "<span class='circle circle-sm bg-primary'><i class='fe fe-radio fe-16 text-white'></i></span>" },
                    { "title": "#" , data: 'id' },
                    { "title": "عنوان الخبر" , data: {id: 'id',title: 'title'} , render: function(data, type, full, meta){return "<a href='/news/"+data.id+"' style='text-decoration:none;color:inherit;'>"+data.title+"</a>";} },
                    { "title": "كتب من قبل" , data: 'userid' },
                    { "title": "تاريخ الكتابة" , data: 'created_at'},
                    //{ "title": "خيارات" , data: null ,"defaultContent": "<button type='button' class='btn mb-2 btn-warning' style='margin-left: 4px;margin-right: 4px'>تعديل</button><button type='button' class='btn mb-2 btn-danger'>حذف</button>"},
                    { "title": "خيارات" , data: 'id' , render: function(data, type, full, meta) {return "<a href='/managenews/editnews/"+data+"' class='btn mb-2 btn-warning' style='margin-left: 4px;margin-right: 4px'>تعديل</a><button type='button' class='btn mb-2 btn-danger' data-toggle='modal' data-target='#confirmDeleteModal' onclick='deleteAction("+data+")'>حذف</button>";}},
                  ],
                  "columnDefs": [
                    { "width": "0.7%", "targets": 0 },
                    { "width": "0.5%", "targets": 1 }
                  ],
                  autoWidth: true,
                  "lengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"]
                  ],
                  "language": translateGlobalTable(),
                 //dom: 'fl<"toolbar">rtip',

                 dom: buttonsForGlobalTable(),                 
                 
                 initComplete: function(){
                    $("div.addnews")
                       .html('<a href="/managenews/addnews" class="btn mb-2 btn-success" style="float:left;">نشر خبر</a>');           
                 }  
            });
        }

        if($('#dataTable-3').length)
        {
            $("#dataTable-3").dataTable().fnDestroy();
            
            $('#dataTable-3').DataTable(
                {
                  ajax:{url:'http://localhost/api/getemployers',dataSrc:''},
                  columns: [
                    { "title": "رقم الموظف" , data: 'empID' },
                    { "title": "الاسم" , data: 'name' },
                    { "title": "البريد الالكتروني" , data: 'email' },
                    { "title": "رقم الهاتف" , data: 'phone' ,"defaultContent": "0"},
                    { "title": "رقم التحويلة" , data: 'ext' ,"defaultContent": "0"},
                    { "title": "المسمى الوظيفي" , data: 'position' ,"defaultContent": "none"},
                    { "title": "القسم" , data: 'department' ,"defaulContent": "None"},
                    { "title": "خيارات" , data: 'empID' , render: function(data, type, full, meta) {return "<a href='/manageemployers/editemployer/"+data+"' class='btn mb-2 btn-warning' style='margin-left: 4px;margin-right: 4px'>تعديل</a><button type='button' class='btn mb-2 btn-danger' data-toggle='modal' data-target='#confirmDeleteModal' onclick='deleteAction("+data+")'>حذف</button>";}},
                  ],
                  "columnDefs": [
                    { "width": "0.5%", "targets": 0 }
                  ],
                  autoWidth: true,
                  "lengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"]
                  ],
                  "language": translateGlobalTable(),
                 //dom: 'fl<"toolbar">rtip',

                 dom: buttonsForGlobalTable(),                 
                 
                 initComplete: function(){
                    $("div.addnews")
                       .html('<a href="/manageemployers/newemployer" class="btn mb-2 btn-success" style="float:left;">اضافة موظف</a>')
                 }  
            });
        }

        if($('#dataTable-4').length)
        {
            $("#dataTable-4").dataTable().fnDestroy();
            
            $('#dataTable-4').DataTable(
                {
                  ajax:{url:'http://localhost/api/getusers',dataSrc:''},
                  columns: [
                    { "title": "رقم المستخدم" , data: 'id' },
                    { "title": "اسم المستخدم" , data: 'username'},
                    { "title": "البريد الالكتروني" , data: 'email' ,"defaultContent": "None"},
                    { "title": "الصلاحيات" , data: 'role' ,"defaultContent": "None"},
                    { "title": "رقم الموظف" , data: 'empid' ,"defaultContent": "None"},
                    { "title": "تاريخ التسجيل" , data: 'created_at' ,"defaultContent": "None"},
                    { "title": "خيارات" , data: 'id' , render: function(data, type, full, meta) {return "<a href='/manageusers/edituser/"+data+"' class='btn mb-2 btn-warning' style='margin-left: 4px;margin-right: 4px'>تعديل</a><button type='button' class='btn mb-2 btn-danger' data-toggle='modal' data-target='#confirmDeleteModal' onclick='deleteAction("+data+")'>حذف</button>";}},
                  ],
                  "columnDefs": [
                    { "width": "0.5%", "targets": 0 }
                  ],
                  autoWidth: true,
                  "lengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"]
                  ],
                  "language": translateGlobalTable(),
                 //dom: 'fl<"toolbar">rtip',

                 dom: buttonsForGlobalTable(),                 
                 
                 initComplete: function(){
                    $("div.addnews")
                       .html('<a href="/manageusers/newuser" class="btn mb-2 btn-success" style="float:left;">اضافة مستخدم</a>');           
                 }  
            });
        }

        if($("#donutChartWidget".length)){
            generateCharts("ar");
        }

        if($('#StatisticsChart').length > 0){
          console.log("inside statistics chart");
          generateChartStatistics("ar");
        }
    }else{
        for (var i=0; i < translations.length; i++) {
            //console.log(translations[i].id);
            if($('.'+translations[i].id+'').length){
                $('.'+translations[i].id+'').append(translations[i].english_name);
            }

            if(translations[i].id == "placeholder_search") {
                searchNews_index = i;
            }
        }

        $(".newticket_button").append("<i class='fe fe-arrow-right fe-16 ml-2'></i>");

        $('#search1').attr('placeholder',translations[searchNews_index].english_name);

        //here is the part for employees page
        if($('#dataTable-1').length)
        {
            $("#dataTable-1").dataTable().fnDestroy();
            
            $('#dataTable-1').DataTable(
                {
                  ajax:{url:'http://localhost/api/getemployers',dataSrc:''},
                  columns: [
                    { "title": "Emp #" , data: 'empID' },
                    { "title": "Name" , data: 'name' },
                    { "title": "Email" , data: 'email' },
                    { "title": "Phone" , data: 'phone' ,"defaultContent": "0"},
                    { "title": "Ext." , data: 'ext' ,"defaultContent": "0"},
                    { "title": "Position" , data: 'position' ,"defaultContent": "none"},
                    { "title": "Department" , data: 'department' ,"defaultContent": "none"},
                  ],
                  "columnDefs": [
                    { "width": "0.5%", "targets": 0 }
                  ],
                  autoWidth: true,
                  "lengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"]
                  ],
                  "language": {
                    "info": "Showing page _PAGE_ of _PAGES_",
                  },            
            });
        }

        if($('#dataTable-2').length)
        {
            $("#dataTable-2").dataTable().fnDestroy();
            
            $('#dataTable-2').DataTable(
                {
                  ajax:{url:'http://localhost/api/getnews',dataSrc:''},
                  columns: [
                    { "title": "" , data: null, "defaultContent": "<span class='circle circle-sm bg-primary'><i class='fe fe-radio fe-16 text-white'></i></span>" },
                    { "title": "#" , data: 'id' },
                    { "title": "News Title" , data: 'title' },
                    { "title": "Published By" , data: 'userid' },
                    { "title": "Date" , data: 'created_at' },
                    //{ "title": "Options" , data: null ,"defaultContent": "<button type='button' class='btn mb-2 btn-warning' style='margin-left: 4px;margin-right: 4px'>Edit</button><button type='button' class='btn mb-2 btn-danger'>Delete</button>"},
                    { "title": "Options" , data: 'id' , render: function(data, type, full, meta) {return "<a href='/managenews/editnews/"+data+"' class='btn mb-2 btn-warning' style='margin-left: 4px;margin-right: 4px'>Edit</a><button type='button' class='btn mb-2 btn-danger' data-toggle='modal' data-target='#confirmDeleteModal' onclick='deleteAction("+data+")'>Delete</button>";}},
                  ],
                  "columnDefs": [
                    { "width": "0.7%", "targets": 0 },
                    { "width": "0.5%", "targets": 1 }
                  ],
                  autoWidth: true,
                  "lengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"]
                  ],
                  "language": {
                    "info": "Showing page _PAGE_ of _PAGES_",
             },
             dom: buttonsForGlobalTable(),                 
             
             initComplete: function(){
                $("div.addnews")
                   .html('<a href="/managenews/addnews" class="btn mb-2 btn-success" style="float:right;">Publish News</a>');           
             }  
            });
        }

        if($('#dataTable-3').length)
        {
            $("#dataTable-3").dataTable().fnDestroy();
            
            $('#dataTable-3').DataTable(
                {
                  ajax:{url:'http://localhost/api/getemployers',dataSrc:''},
                  columns: [
                    { "title": "Emp #" , data: 'empID' },
                    { "title": "Name" , data: 'name' },
                    { "title": "Email" , data: 'email' },
                    { "title": "Phone" , data: 'phone' ,"defaultContent": "0"},
                    { "title": "Ext." , data: 'ext' ,"defaultContent": "0"},
                    { "title": "Position" , data: 'position' ,"defaultContent": "none"},
                    { "title": "Department" , data: 'department' ,"defaultContent": "none"},
                    { "title": "Options" , data: 'empID' , render: function(data, type, full, meta) {return "<a href='/manageemployers/editemployer/"+data+"' class='btn mb-2 btn-warning' style='margin-left: 4px;margin-right: 4px'>Edit</a><button type='button' class='btn mb-2 btn-danger' data-toggle='modal' data-target='#confirmDeleteModal' onclick='deleteAction("+data+")'>Delete</button>";}},
                  ],
                  "columnDefs": [
                    { "width": "0.5%", "targets": 0 }
                  ],
                  autoWidth: true,
                  "lengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"]
                  ],
                  "language": {
                    "info": "Showing page _PAGE_ of _PAGES_",
                  },
             dom: buttonsForGlobalTable(),                 
             
             initComplete: function(){
                $("div.addnews")
                .html('<a href="/manageemployers/newemployer" class="btn mb-2 btn-success" style="float:right;">Add Employer</a>')
             }  
            });
        }

        if($('#dataTable-4').length)
        {
            $("#dataTable-4").dataTable().fnDestroy();
            
            $('#dataTable-4').DataTable(
                {
                  ajax:{url:'http://localhost/api/getusers',dataSrc:''},
                  columns: [
                    { "title": "ID" , data: 'id' },
                    { "title": "Username" , data: 'username'},
                    { "title": "Email" , data: 'email' ,"defaultContent": "None"},
                    { "title": "Emp #" , data: 'empid' ,"defaultContent": "None"},
                    { "title": "Date" , data: 'created_at' ,"defaultContent": "None"},
                    { "title": "Options" , data: 'id' , render: function(data, type, full, meta) {return "<a href='/manageusers/edituser/"+data+"' class='btn mb-2 btn-warning' style='margin-left: 4px;margin-right: 4px'>Edit</a><button type='button' class='btn mb-2 btn-danger' data-toggle='modal' data-target='#confirmDeleteModal' onclick='deleteAction("+data+")'>Delete</button>";}},
                  ],
                  "columnDefs": [
                    { "width": "0.5%", "targets": 0 }
                  ],
                  autoWidth: true,
                  "lengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"]
                  ],
                  "language": {
                    "info": "Showing page _PAGE_ of _PAGES_",
                  },
                 dom: buttonsForGlobalTable(),                 
                 
                 initComplete: function(){
                    $("div.addnews")
                       .html('<a href="/manageusers/newuser" class="btn mb-2 btn-success" style="float:right;">Add User</a>');           
                 }  
            });
        }

        if($("#donutChartWidget".length)){
            generateCharts("en");
        }

        if($('#StatisticsChart').length > 0){
            generateChartStatistics("en");
        }
    }
    fixSiteDirection();
}

function clearTranslations(){
    for (var i=0; i < translations.length; i++) {
        //console.log(translations[i].id);
        if($('.'+translations[i].id+'').length){
            $('.'+translations[i].id+'').empty();
        }
    }

    $("#columnChart").empty();
    $("#donutChartWidget").empty();
    $("#StatisticsChart").empty();
}

translateSite();

function fixSiteDirection(){
  var containsRTL = false;
  $.each($('body').attr('class').split(' '), function(index, value) {
      if(value == 'rtl'){
          containsRTL = true;
      }
  });

  var currentLang = localStorage.getItem("lang");

  if(containsRTL && currentLang !== 'ar'){
      $('body').removeClass('rtl');
  }else {
      if(currentLang !== 'en'){
        document.body.classList.add('rtl');
      }
  }
}

$("#switcherbutton").click(function() {

  lang = localStorage.getItem("lang");

  if(lang === 'ar'){
    localStorage.setItem("lang","en");
  }else{
    localStorage.setItem("lang","ar");
  }

  clearTranslations();
  translateSite();
});
