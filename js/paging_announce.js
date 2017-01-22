// JavaScript Document
(function ($) {
    $.fn.zPaging = function (options) {


        //=============================================
        //Cac gia mac cua options
        //=============================================
        var defaults = {
            "rows": "#row_announce",
            "pages": "#page_announce",
            "items": 5,
            "height": 27,
            "currentPage": 1,
            "total": 0,
            "btnPrevious": ".goPrevious_announce",
            "btnNext": ".goNext_announce",
            "txtCurrentPage": "#currentPage_announce",
            "pageInfo": ".pageInfo_announce"
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
                url: lang + "/controller/getNumberAnncounce",
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


            $(document).on("click", 'div.pages a', function (e) {
                e.preventDefault();
                data = $(this).data("value");
                goCurrentPage(data);
                e.preventDefault();
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

        function goCurrentPage(value) {
            //console.log("goNext: " + options.currentPage);
            loadData(value);
            setCurrentPage(value);
            options.currentPage = value;
            pageInfo();
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
                url: lang + "/controller/getListAnnounce",
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
                        var str = '<div class="col-md-6 col-sm-12 caption_deals"><img class="img-responsive" src="' + base_dir + val.image + '"><h3><a  href="' + val.link + '">' + val.title + '</a></h3><h5 class="content_">' + val.date + '</h5><p class="content_">' + val.content + '</p></div>';
                        rows.append(str);
                    });

                    //console.log(rows);
                    var temp = "";
                    var num_sub = options.total - page;
                    if (num_sub == 0) {
                        for (var i = page - 2; i <= page; i++) {
                            if (i == page)  temp += '<a class="a_active" href="#" style="margin-right: 3px" data-value = ' + i + '>' + i + '</a>';
                            else if (i != 0)
                                temp += '<a href="#" style="margin-right: 3px" data-value = ' + i + '>' + i + '</a>';
                        }
                    }
                    else {
                        for (var i = page - 1; i <= page + 1; i++) {
                            if (i == page)  temp += '<a class="a_active" href="#" style="margin-right: 3px" data-value = ' + i + '>' + i + '</a>';
                            else if (i != 0)
                                temp += '<a href="#" style="margin-right: 3px" data-value = ' + i + '>' + i + '</a>';
                        }
                    }
                    var page_name = "";
                    if (lang == "vi")
                        page_name = "Trang ";
                    else page_name = "Page ";
                    var bottom_content = '<div class="pages"><p >' + page_name + temp + '</p></div>';
                    rows.append(bottom_content);
                }
            });
        }
    }
})(jQuery);

$(document).ready(function (e) {
    var obj = {'items': 2};
    $("#paging_announce").zPaging(obj);
});





