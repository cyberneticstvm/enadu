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
        
    })
});

setTimeout(function () {
    $(".alert").hide('slow');
}, 3000);