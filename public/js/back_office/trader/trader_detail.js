$(document).ready(function() {
    $.validator.addMethod(
        "myDateFormat",
        function(value, element) {
            // yyyy-mm-dd
            var re = /^\d{4}-\d{1,2}-\d{1,2}$/;

            // valid if optional and empty OR if it passes the regex test
            return (this.optional(element) && value=="") || re.test(value);
        },'Please enter a valid date format YYYY-MM-DD'
    );
    $("#TraderEditForm").validate({
        rules : {
            'data[trader][name]':{required:true},
            'data[trader][zip_code]':{required:true},
            'data[trader][pref_id]':{required:true},
            'data[trader][address]':{required:true},
            'data[trader][phone_number]':{required:true,number:true, digits: true,minlength:8},
            'data[trader][fax_number]':{required:true,number:true, digits: true,minlength:8},
            'data[trader][email]':{required:true,email: true},
            'data[trader][website]':{required:true,url: true},
            'data[trader][service_date]':{required:true,myDateFormat:true},
            'data[trader][curio_date]':{required:true,myDateFormat:true},
            'data[trader][document_confirmation_date]':{myDateFormat:true},
            'data[trader][new_email]':{required:true,email: true},
            'data[trader][promotion_email]':{required:true,email: true},
            'data[trader][business_email]':{required:true,email: true},
            'data[trader][business_type]':{required:true},
            'data[trader][category][]':{required:true},
            'data[trader][additional_correspondence][]':{required:true},
            'data[trader][withdraw_method]':{required:true},
            'data[trader][payment_closing_date]':{required:true},
            'data[trader][customer_degree]':{required:true},
            'data[trader][method_statement]':{required:true},
        }, tooltip_options: {
        }
    });
});

//number format money
String.prototype.reverse = function () {
    return this.split("").reverse().join("");
}
function reformatText(input) {
    var x = input.value;
    x = x.replace(/,/g, ""); // Strip out all commas
    x = x.reverse();
    x = x.replace(/.../g, function (e) {
        return e + ",";
    }); // Insert new commas
    x = x.reverse();
    x = x.replace(/^,/, ""); // Remove leading comma
    input.value = x;
}

function balance_credit() {
    var balace=$('#trader_credit').val()-$('#trader_desposite').val();
    var nf = new Intl.NumberFormat();
   var balance_last= nf.format(balace);
    $('#balance_credit').html(balance_last+'円');
}
$(document).ready(function () {
    $("#container").on('mouseover','.form-horizontal',function(e){
        // alert('dsds');
        var status = $('#erea_status').val();
        if (status == 0) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var current_token = '{{csrf_token()}}';
            $.ajax({
                url: 'getErea',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: {},
                success: function (data, textStatus, jQxhr) {
                    console.log(data);
                    $('#TraderTerritory').val(data['erea']);
                    $('#erea_status').val('0');
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
    });
});

$(document).ready(function () {

})
