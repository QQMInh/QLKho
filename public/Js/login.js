function Login() {
    var user = document.getElementById('yourUsername').value.trim();
    var password = document.getElementById('yourPassword').value.trim();

    if (user === "" || password === "") {
        alert("Vui lòng nhập đầy đủ thông tin đăng nhập.");
        return;
    }

    $.ajax({
        type: 'POST',
        url: 'http://localhost:8080/QuanLyKho/public/login',
        data: {
            _token: tokenminh, // Chắc chắn rằng tokenminh được định nghĩa và có giá trị
            usenames: user,
            passwords: password
        },
        success: function(response) {
            if (response.success) { 
                window.location.href = 'http://localhost:8080/ORCHanNom/public/post';
            } else {
                alert(response.message); 
            }
        },
        error: function() {
            alert("Đã xảy ra lỗi trong quá trình đăng nhập. Vui lòng thử lại.");
        }
    });
}