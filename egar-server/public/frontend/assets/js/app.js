$(window).scroll(function(){
    var scrollTop = $(window).scrollTop();
    if (scrollTop >= 250){
        $('#navigation').addClass('scroll');
        $('#toTop').fadeIn();
    }
    else{
        $('#navigation').removeClass('scroll');
        $('#toTop').fadeOut();
    }
});

$(document).ready(function(){
    $('#scrToTop').click(function(){
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });

    {
        // ******** drop-down menu hover
        $('.by-side-menu').hover(function(){
            var $this = $(this);
            var parentId = $this.parents('li.drop-down').attr('dropdown-target');
            var showingTarget = $this.attr('data-target');
            $('#'+parentId+' .by-side-menu.active').removeClass('active');
            $this.addClass('active');
            $('#'+parentId+' .description-wrap').not('.hidden').addClass('hidden');
            $('#'+showingTarget).removeClass('hidden');
        });
    }

    {
        // ******** toggle menu drop-down
        $('.drop-down').each(function(){
            var _this = $(this);
            var dest = _this.attr('dropdown-target');
            _this.click(function(){
                if ($('#'+dest).is(':visible')){
                    return;
                }
                else{
                    var $this = $(this);
                    $('#'+dest).slideDown();
                    $(document).mouseup(function(e)
                    {
                        var container = $('#'+dest+' drop-down-menu-container');
                        var destBlock = $('#'+dest);
                        if (!container.is(e.target) && container.has(e.target).length === 0)
                        {
                            destBlock.slideUp();
                        }
                    });
                }
            });
        });
    }

    {
        // ******* toggle shop sidebar module
        $('.dropdown-toggle').click(function(e){
            var dropdownTarget = $(this).attr('toggle-target');
            var objTarget = $('#'+dropdownTarget);

            if(objTarget.is(':visible')){
                objTarget.slideUp();
            }
            else{
                objTarget.slideDown();
            }
        });
    }

    {
        // reduce word @shop: prd-info-title
        var limit = 20;
        $('.prd-info-title').each(function(){
            var text = $(this).text();
            if (text.length > limit){
                var newString = text.substr(0, limit-3)+'...';
                $(this).html(newString);
            }
        });
        
    }

    {
        //Numeric only

        $(".number-only").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
                 // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                 // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    }

    {
        updateTotal();
        $('.inp-qty').each(function(){
            var input = $(this);
            input.change(function(){
                var $this = $(this);
                var val = $this.val()*1;
                var price = $this.parent().next().find('.item-price').html()*1;
                var sum = val*price;
                $this.parents('.cart-table-item').find('.item-total').html(sum);
                updateTotal();
            });
        });
    }

    //gallery 
    {
        $('#viewImg .btn-close').click(function(){
            $('#viewImg').fadeOut();
        });

        $('.item').click(function(){
            var url = $(this).attr('data-click');
            $('.view-selected').removeClass('view-selected');
            $(this).addClass('view-selected');
            galleryShowImg(url);
        });

        $('#viewImg .prev').click(function(){
            var objPrev = $('.item.view-selected').parent().prev().find('.item');
            if (objPrev.attr('data-click') != undefined && objPrev.attr('data-click') != '') {
                $('.view-selected').removeClass('view-selected');
                objPrev.addClass('view-selected');
                galleryShowImg(objPrev.attr('data-click'));
            }
        });

        $('#viewImg .next').click(function(){
            var objNext = $('.item.view-selected').parent().next().find('.item');
            if (objNext.attr('data-click') != undefined && objNext.attr('data-click') != '') {
                $('.view-selected').removeClass('view-selected');
                objNext.addClass('view-selected');
                galleryShowImg(objNext.attr('data-click'));
            }
        });
    }
});

var galleryShowImg = function(path) {
    $('#viewImg .wrap img').attr('src', path);
    $('#viewImg').fadeIn();
}

var updateTotal = function(){
    var itemTotal = $('#cart .item-total');
    var _sum = 0;
    itemTotal.each(function(){
        var cost = $(this).html()*1;
        _sum += cost;
    });
    $('input[name=totalBill]').val(_sum);
    _sum += ' VND';
    $('#cart .total-title .money').html(_sum);
}