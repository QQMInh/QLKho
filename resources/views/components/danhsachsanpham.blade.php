@extends('khung')
@section('Thongke')
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>

              <!-- Table with stripped rows -->
              
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>Tên sản phẩm</b>
                    </th>
                    <th>Tình trạng</th>
                    <th>Trang Thái</th>
                    <th>Đã xuất kho</th>
                    

                  </tr>
                </thead>
                <tbody>
                    @foreach ( $lo_ as $lo )
                        @foreach ($lo->thietbis as $thietbi )
                        <tr>
                    <td>{{$lo->TenThietBi}}</td>
                    <td>{{$lo->TyLeKhauHao}}</td>
                    <td>{{$thietbi->TrangThai}}</td>
                    <td>{{$thietbi->DaXuatKho}}</td>
                  </tr>
                        @endforeach
                    
                  
                  @endforeach
                </tbody>
              </table>
            
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection