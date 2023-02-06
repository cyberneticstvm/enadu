$(function(){
    "use strict";

    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>");
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('[data-toggle="tooltip"]').tooltip();

    $(".cartQty").change(function(){
        var qty = $(this).val();
        var pdct = $(this).data('pdct');
        $.ajax({
            type: 'GET',
            url: '/cart/update',
            data: {'qty': qty, 'pdct': pdct},
            success: function(response){
                window.location.reload();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log(XMLHttpRequest);
            }
        });
    });

    $(".dltCartItem").click(function(){
        var c = confirm("Do you want to remove this item?");
        if(c){
            var pdct = $(this).data('pdct');
            $.ajax({
                type: 'GET',
                url: '/cart/delete',
                data: {'pdct': pdct},
                success: function(response){
                    window.location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                    console.log(XMLHttpRequest);
                }
            });
        }else{
            return false;
        }
        
    });

    $(".addrServ").click(function(){ alert('asdf')
        $("#addrcat").val('service');
    });
    
    $(".otp").keyup(function(){
        $(this).parent().next('div').find('.otp').focus();
    });

    $(".ptype").change(function(){
        var cls = $(this).val();
        if(cls == 'direct'){
            $(".direct").removeClass("d-none");
            $(".localbody").addClass("d-none");
        }else{
            $(".direct").addClass("d-none");
            $(".localbody").removeClass("d-none");
        }
    });

    $(".district").change(function(){
        var district = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/localbody/'+district,
            data: {'district': district},
            success: function(response){
                $(".localbodysel").html(response);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log(XMLHttpRequest);
            }
        });
    });

    $(".localbodysel").change(function(){
        var selected = $(':selected', this);
        var ltype = selected.closest('optgroup').attr('id');
        $("#localbody_type").val(ltype);
    });

    $('#prod_1').zoom();
});

setTimeout(function () {
    $(".alert").hide('slow');
}, 3000);


