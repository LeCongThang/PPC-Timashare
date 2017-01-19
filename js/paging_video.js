// JavaScript Document
(function ($) {
    $.fn.zPaging = function (options) {


        //=============================================
        //Cac gia mac cua options
        //=============================================
        var defaults = {
            "rows": "#rows",
            "pages": "#pages",
            "items": 5,
            "height": 27,
            "currentPage": 1,
            "total": 0,
            "btnPrevious": ".goPrevious",
            "btnNext": ".goNext",
            "txtCurrentPage": "#currentPage",
            "pageInfo": ".pageInfo"
        };
        options = $.extend(defaults, options);
        //=============================================
        //Cac bien se su dung trong Plugin
        //=============================================
        var rows = $(options.rows);
        var pages = $(options.pages);
        var btnPrevious = $(options.btnPrevious);
        var btnNext = $(options.btnNext);
        var txtCurrentPage = $(options.txtCurrentPage);
        var lblPageInfo = $(options.pageInfo);

        var aRows = '';

        //=============================================
        //Khoi tao cac ham can thi khi Plugin duoc su dung
        //=============================================
        init();
        setRowsHeight();

        //=============================================
        //Ham khoi dong
        //=============================================
        function init() {

            //Lay tong so trang
            $.ajax({
                url: "vi/controller/laySoLuongVideo",
                type: "GET",
                dataType: "json"
            }).done(function (data) {
                options.total = data.total;
                loadData(options.currentPage);
            });

            //Gan su kien vao cho btnPrevious - btnNext - txtCurrentPage
            setCurrentPage(options.currentPage);

            btnPrevious.on("click", function (e) {
                goPrevious();
                e.stopImmediatePropagation();
            });

            btnNext.on("click", function (e) {
                goNext();
                e.stopImmediatePropagation();
            });

            txtCurrentPage.on("keyup", function (e) {

                if (e.keyCode == 13) {
                    var currentPageValue = parseInt($(this).val());
                    console.log(currentPageValue);
                    if (isNaN(currentPageValue) || currentPageValue <= 0
                        || currentPageValue > options.total) {
                        alert("Gia tri nhap vao khong phu hop");
                    } else {
                        loadData(currentPageValue);
                        options.currentPage = currentPageValue;
                        pageInfo();
                    }
                }

            });


        }

        //=============================================
        //Ham xu ly khi nhan vao nut btnPrevious
        //=============================================
        function goPrevious() {
            //console.log("goPrevious: " + options.currentPage);
            if (options.currentPage != 1) {
                var p = options.currentPage - 1;
                loadData(p);
                setCurrentPage(p);
                options.currentPage = p;
                pageInfo();
            }
        }

        //=============================================
        //Ham xu ly khi nhan vao nut btnNext
        //=============================================
        function goNext() {
            //console.log("goNext: " + options.currentPage);
            if (options.currentPage != options.total) {
                var p = options.currentPage + 1;
                loadData(p);
                setCurrentPage(p);
                options.currentPage = p;
                pageInfo();
            }
        }

        //=============================================
        //Ham xu ly gan gia tri vao
        //trong o textbox currentPage
        //=============================================
        function setCurrentPage(value) {
            txtCurrentPage.val(value);
        }

        //=============================================
        //Ham hien thi thong tin phan trang
        //=============================================
        function pageInfo() {
            lblPageInfo.text("Page " + options.currentPage + " of " + options.total);
        }

        //=============================================
        //Thiet lap chieu cao cho ul#rows
        //=============================================
        function setRowsHeight() {
            var ulHeight = (options.items * options.height) + "px";
            rows.css("height", ulHeight);
        }

        //=============================================
        //Ham load cac thong trong database va dua vao #row
        //=============================================
        function loadData(page) {
            //console.log("loadData");
            $.ajax({
                url: "vi/controller/layDanhSachVideo",
                type: "POST",
                dataType: "json",
                cache: false,
                data: {
                    "items": options.items,
                    "currentPage": page
                }

            }).done(function (data) {
                //console.log(data);
                if (data.length > 0) {
                    rows.empty();

                    $.each(data, function (i, val) {
                        var str = '<div class="media"> <div class="media-left" style="width: 20%;height: 10%"> <img src="https://img.youtube.com/vi/' + val.url_video.substring(30) + '/0.jpg" style="width:100%;"> </div><div class="media-left name-video video"> <a href="#" data-value="' + val.url_video + '"><span class="link_video">' + val.ten_video + '</span></a> </div> </div>';
                        rows.append(str);
                    });

                    //console.log(rows);
                }
            });
        }
    }
})(jQuery);

$(document).ready(function (e) {
    var obj = {'items': 2};
    $("#paging").zPaging(obj);
});





