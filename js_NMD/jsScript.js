// Menu
$(document).ready(function () {
    $(".itemOrder").hide();
    $(".cateOrder").click(function (e) { 
        e.preventDefault();
        $(this).next().slideDown();
    });
    $(".itemOrder").mouseleave(function () { 
        $(this).slideUp();
    });


Form
$("#formreg").submit(function (e) { 
    e.preventDefault();
    // Lấy username
    var username = $("input[name*= 'username']").val();
    if(username === 0 || username.length < 6){
        $("input[name*= 'username']").focus();
        $("#noteForm").html('Username chưa hợp lệ !');
        return false;
    }

    //Lấy mật khẩu
    var password = $("input[name *= 'password']").val();
    if(password.length === 0 || password.length < 6){
        $("input[name *= 'password']").focus(function (e) { 
            e.preventDefault();
            
        });
        $("#noteForm").html("Mật khẩu chưa hợp lệ !");
        return false;
    }

    //Lấy họ tên
    var hoten = $("input[name*= 'hoten']").val();
    if (hoten.length === 0 || hoten.length < 6) {
        $("input[name*= 'hoten']").focus(function (e) {});
        $("#noteForm").html("Họ tên chưa hợp lệ !");
        return false;
    }

    //Lấy ngày sinh
    var ngaysinh = $("input[name*= 'ngaysinh']").val();
    if (ngaysinh.length === 0 || ngaysinh.length < 6) {
        $("input[name*= 'ngaysinh']").focus(function (e) {});
        $("#noteForm").html("Ngày sinh chưa hợp lệ !");
        return false;
    }

    //Lấy địa chỉ
    var diachi = $("input[name*= 'diachi']").val();
    if (diachi.length === 0 ) {
        $("input[name*= 'diachi']").focus(function (e) {}); 
        $("#noteForm").html("Địa chỉ chưa hợp lệ !");
        return false;
    }

    //Lấy só điện thoại
    var sodienthoai = $("input[name*= 'sodienthoai']").val();
    if (sodienthoai.length === 0 ) {
        $("input[name*= 'sodienthoai']").focus(function (e) {});
        $("#noteForm").html("Số điện thoại chưa hợp lệ !");
        return false;
    }

    return true;
});



});




