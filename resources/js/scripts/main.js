$(document).ready(function(){
    const token = sessionStorage.getItem('token');
    if(token == null && window.location.pathname != '/dang-nhap'){
        window.location = "/dang-nhap";
    }
});
function dangXuat(){
    sessionStorage.clear();
    window.location = "/dang-nhap";
}