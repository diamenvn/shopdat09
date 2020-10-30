function Songtotdibansoilamcaigi(str){
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str = str.replace(/đ/g,"d");
    str = str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
    str = str.replace(/-+-/g,"-");
    str = str.replace(/^\-+|\-+$/g,"");
    return str;
}
$(document).ready(function () {
	$.get('/skin', function (data) {
		$('#skinFilter').typeahead({source: data,});
	}, "json");
	$.get('/champion', function (data) {
		$('#champFilter').typeahead({source: data})
	}, "json");
});

var page = 1, rank = 0, frame = 0, price = 0, loai = $('input[name="loainick"]').val(), order = 0, champ_str = "", skin_str = "";

$(document).ready(function() {
    $('#skinFilter').on('change', function(){
        var item = $(".dropdown[data-filter='trang-phuc'] ul.typeahead li.active").data('value');
        skin_str = item;
        load_account_list();
        $(".dropdown[data-filter='trang-phuc'] button").html(item);
        $(".dropdown[data-filter='trang-phuc']").toggleClass("open");
    });
    $('#champFilter').on('change', function(){
        var item = $(".dropdown[data-filter='tim-theo-tuong'] ul.typeahead li.active").data('value');
        champ_str = item;
        load_account_list();
        $(".dropdown[data-filter='tim-theo-tuong'] button").html(item);
        $(".dropdown[data-filter='tim-theo-tuong']").toggleClass("open");
    });
    $(document).on('click', '.acfiit', function (e) {
        e.preventDefault();

        if (!$(this).closest('li').hasClass('is-multi')) {
            $(this).closest('ul').find('a.acfiitac').removeClass('acfiitac');
        }

        $(this).closest('li').find('i').addClass('show-remove');
        $(this).addClass('acfiitac');

        var _name = '';

        $(this).closest('ul').find('li').each(function (i) {
            if ($(this).find('a').hasClass('acfiitac')) {
                _name += (_name === '' ? '' : ', ') + $(this).find('a').text();
            }
        });

        $(this).closest('.dropdown').find('.dropdown-toggle').html(_name + '<span class="caret"></span>');

        if ($(this).closest('li').hasClass('is-multi')) {
            return false;
        }

    });

    $(".dropdown ul.dropdown-menu.select li").click(function() {
        page = 1;
        load_account_list();
    });

    $('.sa-ftbtndel').click(function (e) {
        e.preventDefault();
        page = 1;
        rank = 0;
        frame = 0;
        order = 0;
        price = 0;
        loai = $('input[name="loainick"]').val();
        champ_str = "";
        skin_str = "";
        $(".dropdown[data-filter='tim-theo-rank'] button").html("Tìm Theo Rank <span class='caret'></span>");
        $(".dropdown[data-filter='tim-theo-khung'] button").html("Tìm Theo Khung <span class='caret'></span>");
        $(".dropdown[data-filter='tim-theo-gia'] button").html("Tìm Theo Giá <span class='caret'></span>");
        $(".dropdown[data-filter='sap-xep'] button").html("Sắp Xếp <span class='caret'></span>");
        $(".dropdown[data-filter='tim-theo-tuong'] button").html("Nhập tên tướng");
        $(".dropdown[data-filter='trang-phuc'] button").html("Nhập tên trang phục");
        $(".dropdown[data-filter='loai-nick'] button").html("Loại Nick <span class='caret'></span>");
        $("#skinFilter").val('');
        $("#champFilter").val('');
        $(".txt-filter ul").empty().hide();        
        load_account_list();
    });

    $(".dropdown-menu.filter-clothes").on('click', function(event){
        event.stopPropagation();
    });

    $(".sa-lpmain").on("click", "ul.sa-pagging li", function() {
        load_account_list();
        return false;
    });
});


function load_account_list() {
    var data_post = {page : page, rank : rank, loai : loai, frame : frame, price : price, order : order, champ_str : champ_str, skin_str : skin_str};
    $(".sa-lpmain").empty();
    $("#loading").show();
    $.post("/view/custom", data_post, function(data) {
        $(".sa-lpmain").html(data);
        $("#loading").hide();
        var newUri = {};
        if (loai != "LMHT") {
        $(".dropdown[data-filter='tim-theo-khung']").hide();
        $(".dropdown[data-filter='tim-theo-tuong']").hide();
        $(".dropdown[data-filter='trang-phuc']").hide();  
        newUri.loai = Songtotdibansoilamcaigi(($(".dropdown[data-filter='loai-nick'] button").text()).trim());
        frame = 0;
        champ_str = "";
        skin_str = "";        
        }else{
        $(".dropdown[data-filter='tim-theo-khung']").show();
        $(".dropdown[data-filter='tim-theo-tuong']").show();
        $(".dropdown[data-filter='trang-phuc']").show();
        } 
        if (rank != 1) {
            newUri.rank = Songtotdibansoilamcaigi(($(".dropdown[data-filter='tim-theo-rank'] button").text()).trim());
        }        
        if (frame != 0) {
            newUri.khung = Songtotdibansoilamcaigi(($(".dropdown[data-filter='tim-theo-khung'] button").text()).trim());
        }
        if (price != 0) {
            newUri.gia = Songtotdibansoilamcaigi(($(".dropdown[data-filter='tim-theo-gia'] button").text()).trim()).replace("nick-", "");
        }
        if (order != 0) {
            newUri.sapxep = Songtotdibansoilamcaigi(($(".dropdown[data-filter='sap-xep'] button").text()).trim());
        }
        if (champ_str != "") {
            newUri.tuong = Songtotdibansoilamcaigi(($(".dropdown[data-filter='tim-theo-tuong'] button").text()).trim());
        }
        if (skin_str != "") {
            newUri.trangphuc = Songtotdibansoilamcaigi(($(".dropdown[data-filter='trang-phuc'] button").text()).trim());
        }
        if (page != 1) {
            newUri.page = page;
        }
        if (jQuery.isEmptyObject(newUri)) {
            history.pushState({}, null, '/');
        } else {
            history.pushState({}, null, '?' + $.param(newUri));
        }        
    });
}