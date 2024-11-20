@extends('khung')
@section('Thongke')

<div class="row d-flex justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <form id="myForm" action="{{ route('phieuxuat.done') }}" method="POST">
                @csrf
                <div class="card-title">
                    <!-- Nếu cần thêm thông tin -->
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Loại Đối Tượng</label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="loaiDoiTuong" id="nguoiDung" value="Người Dùng" required>
                                <label class="form-check-label" for="nguoiDung">Người Dùng</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="loaiDoiTuong" id="phongBan" value="Phòng Ban">
                                <label class="form-check-label" for="phongBan">Phòng Ban</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Đối Tượng</label>
                        <div class="col-sm-8">
                            <select id="doiTuongSelect" name="doiTuong" class="form-select" required>
                                <option value="">Vui lòng chọn loại đối tượng trước</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" name="NgayXuat">Ngày Xuất Kho</label>
                        <div class="col-sm-8">
                            <input type="date" name="ngayXuatKho" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" name="NgayTra">Ngày Trả</label>
                        <div class="col-sm-8">
                            <input type="date" name="ngayTra" class="form-control" required>
                        </div>
                    </div>

                    

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" name="MucDich">Mục Đích</label>
                        <div class="col-sm-8">
                            <textarea name="mucDich" class="form-control" required></textarea>
                        </div>
                    </div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Chọn sản phẩm</button>
<!-- Table Section -->
<div id="selected-products-list" class="mt-3">
    <h5>Danh sách sản phẩm đã chọn:</h5>
    <ul id="selected-products" listSP[] class="list-group">
        <!-- Các sản phẩm được thêm vào sẽ hiển thị ở đây -->
    </ul>
</div>


        
    </div>
                    <div class="btn-container">
                        <button type="submit" class="btn btn-create">Tạo Phiếu</button>
                    </div>
                </div>
              
                <div class="text-end mt-3">
                
                <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Chọn Sản Phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    @foreach ($thietbi_ as $lo)
                        @foreach ($lo->thietbis as $thietbi)
                        <div class="col-lg-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title text-center">Tên Sản Phẩm: {{ $lo->TenThietBi }}</h6>
                                    <p class="card-text">Trạng Thái: {{ $thietbi->TrangThai }}</p>
                                    <div class="text-center mt-3">
                                        <input class="form-check-input product-checkbox" 
                                               type="checkbox" 
                                               data-name="{{ $lo->TenThietBi }}" 
                                               data-status="{{ $thietbi->TrangThai }}" 
                                               data-id="{{ $thietbi->id }}">
                                        <label>Chọn</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="#btnAdd">Thêm</button>
            </div>
        </div>
    </div>
</div>



 
       

   

            </form>
        </div>
    </div>
</div>


<script>
    
    document.getElementById("#btnAdd").addEventListener("click", function() {
    // Lấy danh sách ul để thêm sản phẩm
    const selectedProductsList = document.getElementById('selected-products');

    // Xóa danh sách cũ (nếu cần hiển thị lại đầy đủ các sản phẩm mới)
    selectedProductsList.innerHTML = '';

    // Lấy tất cả các checkbox đã được chọn
    const selectedCheckboxes = document.querySelectorAll('.product-checkbox:checked');

    selectedCheckboxes.forEach(checkbox => {
        const productName = checkbox.getAttribute('data-name');
        const productStatus = checkbox.getAttribute('data-status');
        const productId = checkbox.getAttribute('data-id');

        // Tạo phần tử mới cho mỗi sản phẩm đã chọn
        const li = document.createElement('li');
        li.id = `product-${productId}`;
        li.className = "list-group-item";
        li.innerHTML = `
            <strong>${productName}</strong> - Trạng Thái: ${productStatus}
            <button class="btn btn-sm btn-danger float-end" onclick="removeProduct('${productId}')">Xóa</button>
        `;
        selectedProductsList.appendChild(li);
    });

    // Đóng modal sau khi thêm
    var modal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
    modal.hide();
});

function removeProduct(productId) {
    const productElement = document.getElementById(`product-${productId}`);
    if (productElement) {
        productElement.remove();
    }
}

</script>


<!-- Chuyển dữ liệu PHP sang JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loaiDoiTuongRadios = document.querySelectorAll('input[name="loaiDoiTuong"]');
        const doiTuongSelect = document.getElementById('doiTuongSelect');

        // Dữ liệu Người Dùng từ PHP
        const nguoiDungOptions = [
            @foreach ($nguoidung_ as $value)
                @foreach ($value->nguoidungs as $item)
                    { value: '{{ $item->MaNguoiDung }}', text: '{{ $item->Ten }}' },
                @endforeach
            @endforeach
        ];

        // Dữ liệu Phòng Ban mẫu
        const phongBanOptions = [
            @foreach ($phong_ as $value)
                @foreach ($value->phongs as $item)
                    { value: '{{ $item->id }}', text: '{{ $item->TenPhong }}' },
                @endforeach
            @endforeach
        ];

        // Hàm cập nhật các option trong select box
        function updateSelectOptions(options) {
            doiTuongSelect.innerHTML = '<option value="">Vui lòng chọn</option>'; // Reset options
            options.forEach(option => {
                const opt = document.createElement('option');
                opt.value = option.value;
                opt.textContent = option.text;
                doiTuongSelect.appendChild(opt);
            });
        }

        // Lắng nghe sự kiện thay đổi radio
        loaiDoiTuongRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'Người Dùng') {
                    updateSelectOptions(nguoiDungOptions);
                } else if (this.value === 'Phòng Ban') {
                    updateSelectOptions(phongBanOptions);
                }
            });
        });
    });
</script>

@endsection
