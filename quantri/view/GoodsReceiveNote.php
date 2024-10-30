<main class="container pt-5">
    <!-- Page title -->
    <div class="row">
        <h1 class="page-title">QUẢN LÝ PHIẾU NHẬP SÁCH</h1>
    </div>
    <!-- ... -->
    <!-- Page control -->
    <div class="row d-flex justify-content-between">
        <div class="col">
            <div class="row flex-nowrap">
                <div class="col-auto">
                    <button class="btn btn-control open_add_form"
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#grnCreateModal">
                        <i class="fa-regular fa-plus me-2"></i>
                        Thêm phiếu nhập
                    </button>
                </div>
                <div class="col-auto">
                    <div class="input-group">
                        <input type="text"
                            class="form-control"
                            placeholder="Nhập id, tên nhà cung cấp"
                            aria-label="Tìm kiếm phiếu nhập"
                            aria-describedby="search-bar">
                        <button class="btn btn-outline-custom" type="button" id="search-btn">Tìm</button>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="input-group">
                        <select id="status-select" class="form-select">
                            <option selected>Tất cả trạng thái</option>
                            <option value="1">Chưa hoàn thành</option>
                            <option value="2">Hoàn thành</option>
                            <option value="3">Bị hủy</option>
                        </select>
                    </div>
                </div>
                <div class="col-auto d-flex align-items-center flex-nowrap gap-1">
                    <label for="date-start">Từ ngày</label>
                    <input type="date" style="width: 150px;" name="date_start" id="date-start" class="form-control">
                    <label for="date-end">đến ngày</label>
                    <input type="date" style="width: 150px;" name="date_end" id="date-end" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-auto">
            <button onclick="location.reload()" type="button" class="btn btn-control">Làm mới</button>
        </div>
    </div>
    <!-- ... -->
    <!-- Table data -->
    <div class="row mt-5">
        <div class="col">
            <table class="table table-bordered text-center table-hover align-middle border-success">
                <thead class="table-header">
                    <tr>
                        <th scope="col">Mã phiếu nhập</th>
                        <th>Nhà cung cấp</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nhã Nam</td>
                        <td>13/10/2024</td>
                        <td>28/10/2024</td>
                        <td>105.000 đ</td>
                        <td>
                            <span class="bagde rounded-2 text-white bg-secondary p-2">Chưa hoàn thành</span>
                        </td>
                        <td>
                            <button class="btn fs-5 open_view_form"
                                data-bs-toggle="modal"
                                data-bs-target="#grnViewModal"
                                title="Xem chi tiết">
                                <i class="fa-regular fa-circle-info"></i>
                            </button>
                            <button class="btn fs-5 open_edit_form"
                                data-bs-toggle="modal"
                                data-bs-target="#grnModal"
                                title="Chỉnh sửa">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button class="btn fs-5 print_btn"
                                title="In">
                                <i class="fa-regular fa-print"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Cổ Nguyệt Books</td>
                        <td>13/10/2024</td>
                        <td>28/10/2024</td>
                        <td>105.000 đ</td>
                        <td>
                            <span class="bagde rounded-2 text-white bg-success p-2">Hoàn thành</span>
                        </td>
                        <td>
                            <button class="btn fs-5 open_view_form"
                                data-bs-toggle="modal"
                                data-bs-target="#grnViewModal"
                                title="Xem chi tiết">
                                <i class="fa-regular fa-circle-info"></i>
                            </button>
                            <button class="btn fs-5 print_btn"
                                title="In">
                                <i class="fa-regular fa-print"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>IPM</td>
                        <td>13/10/2024</td>
                        <td>28/10/2024</td>
                        <td>105.000 đ</td>
                        <td>
                            <span class="bagde rounded-2 bg-danger text-white p-2">Bị hủy</span>
                        </td>
                        <td>
                            <button class="btn fs-5 open_view_form"
                                data-bs-toggle="modal"
                                data-bs-target="#grnViewModal"
                                title="Xem chi tiết">
                                <i class="fa-regular fa-circle-info"></i>
                            </button>
                            <button class="btn fs-5 print_btn"
                                title="In">
                                <i class="fa-regular fa-print"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- ... -->
    <!-- Pagination -->
    <div class="row mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Trước</a>
                </li>
                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link text-dark" href="#">Sau</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- ... -->
</main>

<!-- Modal: Tạo phiếu nhập -->
<div class="modal fade"
    id="grnCreateModal"
    tabindex="-1"
    aria-labelledby="grnCreateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-success" id="grnCreateModalLabel">Tạo phiếu nhập</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="grnCreateForm">
                <div class="modal-body">
                    <div class="row mb-3 align-items-center">
                        <label for="grn-supplier-name" class="col-form-label col-sm-4 fw-bold">Tên nhà cung cấp</label>
                        <div class="col">
                            <select name="supplier_name" id="supplier-name" class="form-select">
                                <option value="" selected>Chọn nhà cung cấp</option>
                                <option value="1">Nhã Nam</option>
                                <option value="2">Cổ Nguyệt Books</option>
                                <option value="3">IPM</option>
                            </select>
                            <span class="text-message grn-supplier-name-msg"></span>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label for="grn-discount" class="col-form-label col-sm-4 fw-bold">Chiết khấu (%)</label>
                        <div class="col">
                            <input type="number"
                                name="grn-discount"
                                class="form-control"
                                id="grn-discount"
                                min="0"
                                max="100"
                                placeholder="Nhập phần trăm chiết khấu">
                            <span class="text-message grn-discount-msg"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="" id="submit_btn">
                    <button type="submit" class="btn btn-success" id="saveModalBtn">Tạo phiếu nhập</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ... -->

<!-- Modal: Thêm phiếu nhập -->
    
<!-- ... -->

<!-- Link JS -->
<script src="./asset/js/GoodsReceiveNote.js"></script>