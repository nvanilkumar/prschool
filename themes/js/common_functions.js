// JavaScript Document
//@baseurl is a global varible brings the site url
$(function() {
    var class_list_array, main_class;
    class_list_array = get_class_list(0);
    markup_select_box("class_id",class_list_array);

    main_class = parseInt(main_class_id);
    //main_class_id value is set then only we are activating the section div 
    if(main_class > 0)
    {
        set_selectbox_class_name(main_class_id);
    }  
    
    $("#class_id").on("click",function(){
        main_class=$(this).val();
        class_list_array = get_class_list(main_class);
        markup_select_box("section_list",class_list_array);
        
    });
 
});

//Edit option from the server enable section div
function set_selectbox_class_name(class_id)
{
    //hide the radio buttons div
    $("#class_details").hide();
    $('#class_div').hide();
    $('#section_div').show();
    //radio button value set
    $("input[name=class_type]").val(["section"]);
    //class list box value set
    $('#class_id').val(class_id);


}


//To bring the all the class names
function get_class_list(main_class_id)
{
    var post_url = baseurl + 'remote/get_class_list',
            result = "";
    $.ajax({
        url: post_url,
        type: "POST",
        data : {sc_cls_main_class : main_class_id},
        async: false,
        dataType: 'json',
        success: function(responseText) {
            result = responseText;
        }

    });

    return result;
}

//To markup the select box
//@param element_name -- domelement name
//@param class_names -- all options values
function markup_select_box(element_name,class_names)
{
    $('#'+element_name+'  option:gt(0)').remove().end();
    $.each(class_names, function(index, value) {
        $('#'+element_name).append($('<option/>', {
            value: value.sc_cls_id,
            text: value.sc_cls_name
        }));
    });
    
     //
}




//Brings the class related cross tables data from db
function get_db_class_objects(class_id, type) {
    var post_url = baseurl + 'remote/get_class_object_list',
            result = "";
    $.ajax({
        url: post_url,
        type: "POST",
        data: {type: type, class_id: class_id},
        async: false,
        dataType: 'json',
        success: function(responseText) {
            result = responseText;
        }

    });

    return result;
}


    