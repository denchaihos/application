$(function(){ 
/* Function Handlebars  help get json data render to  element*/
    function handlebarsRender(data){
        
        var source = $('#template').html();
        var template = Handlebars.compile(source);
        var html = template($.parseJSON(data));
        
        $('table#mytable tbody').append(html);
        
    }

$("input#submit_date").click(function(event){ 
    //$("#my").empty();
    
    $('#hn').val('');
    var radios_visit_type = document.getElementsByName("visit_type");
    for (var i = 0; i < radios_visit_type.length; i++) {
        if (radios_visit_type[i].checked) {
            var visit_type = (radios_visit_type[i].value);
            break;
        }
    }
    //creat  page  number  ////////////////////////////////////
    var row_per_page = 10;
    var visit_date = $('#visit_date').val();
    var total_row = new Array();
    //$(".content2").html("หน้าที่ 1 / "+(total_row / row_per_page);
    $("#curpage").val(1);
    $.get('pt_visit_data.php',{visit_date:visit_date,visit_type:visit_type,limit:0},function(data){
        //console.log(data);
        
        handlebarsRender(data);
        
    });
    
});
});