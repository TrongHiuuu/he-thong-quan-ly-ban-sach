<!-- Content -->
<main class="container pt-5">
    <!-- Page title -->
    <div class="row">
        <h1 class="page-title">QUẢN LÝ SẢN PHẨM</h1>
    </div>
    <!-- ... -->
    <!-- Page tabs -->
    <div class="row mb-2">
        <div class="col">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link"
                        i class="text-end w-50"d="pills-all-tab"
                        type="button"
                        role="tab">
                        Tất cả
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link"
                        id="pills-on-sale-tab"
                        type="button"
                        role="tab">
                        Đang bán
                        <span class="badge rounded-pill bg-danger">
                            13
                        </span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active"
                        id="pills-out-of-stock-tab"
                        type="button"
                        role="tab">
                        Hết hàng
                        <span class="badge rounded-pill bg-danger">
                            12
                        </span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link"
                        id="pills-disabled-tab"
                        type="button"
                        role="tab">
                        Bị ẩn
                        <span class="badge rounded-pill bg-danger">
                            4
                        </span>
                    </button>
                </li>
            </ul>
        </div>
        <div class="col d-flex justify-content-end align-items-center">
            <button class="btn btn-control open_add_form"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#productModal"
            >
                <i class="fa-regular fa-plus me-2"></i>
                Thêm sản phẩm
            </button>
        </div>
    </div>
    <!-- ... -->
    <!-- Page control -->
    <div class="row d-flex justify-content-between">
        <div class="col">
            <div class="row flex-nowrap">
                <div class="col-auto">
                    <div class="input-group">
                        <select id="category-select" class="form-select">
                            <option selected>Tất cả danh mục</option>
                            <option value="1">Văn học</option>
                            <option value="2">Đời sống</option>
                            <option value="3">Kinh dị</option>
                            <option value="4">Tâm lý</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <input type="text"
                            class="form-control"
                            placeholder="Nhập id, tên sản phẩm"
                            aria-label="Tìm kiếm sản phẩm"
                            aria-describedby="search-bar">
                        <button class="btn btn-outline-custom" type="button" id="search-btn">Tìm</button>
                    </div>
                </div>
                <div class="col-auto d-flex align-items-center flex-nowrap">
                    <span class="me-2">Khoảng giá</span>
                    <input class="form-control me-2" style="width: 120px;" type="number" name="price-min" id="price-min">
                    <span class="mx-2">-</span>
                    <input class="form-control" style="width: 120px;" type="number" name="price-max" id="price-max">
                </div>
                <div class="col-auto d-flex align-items-center gap-2">
                    <span>Tồn kho</span>
                    <button class="btn btn-control">
                        <i class="fa-regular fa-arrow-down-1-9"></i>
                    </button>
                    <button class="btn btn-control">
                        <i class="fa-regular fa-arrow-down-9-1"></i>
                    </button>
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
                        <th scope="col">Mã sách</th>
                        <th>Hình ảnh</th>
                        <th>Tên sách</th>
                        <th>Tồn kho</th>
                        <th>Giá bán</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="../asset/img/example-book2.jpg" class="book-img">
                        </td>
                        <td>Không sợ thất bại chỉ sợ bạn nuông chiều bản thân chưa nỗ lực hết mình</td>
                        <td>100</td>
                        <td>105.000 đ</td>
                        <td>
                            <span class="bagde rounded-2 text-white bg-success p-2">Hoạt động</span>
                        </td>
                        <td>
                            <button class="btn fs-5 open_view_form"
                                    data-bs-toggle="modal"
                                    data-bs-target="#productViewModal"
                            >
                                <i class="fa-regular fa-circle-info"></i>
                            </button>
                            <button class="btn fs-5 open_edit_form"
                                    data-bs-toggle="modal"
                                    data-bs-target="#productModal"
                            >
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <img src="../asset/img/example-book3.jpg" class="book-img">
                        </td>
                        <td>Đập chắn Thái Bình Dương</td>
                        <td>100</td>
                        <td>105.000 đ</td>
                        <td>
                            <span class="bagde rounded-2 text-white bg-secondary p-2">Bị ẩn</span>
                        </td>
                        <td>
                            <button class="btn fs-5 open_view_form"
                                data-bs-toggle="modal"
                                data-bs-target="#productViewModal">
                                <i class="fa-regular fa-circle-info"></i>
                            </button>
                            <button class="btn fs-5 open_edit_form"
                                data-bs-toggle="modal"
                                data-bs-target="#productModal">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <img src="../asset/img/example-book6.jpg" class="book-img">
                        </td>
                        <td>Giáo trình Triết học Mác Lênin</td>
                        <td>0</td>
                        <td>105.000 đ</td>
                        <td>
                            <span class="bagde rounded-2 text-white bg-danger p-2">Hết hàng</span>
                        </td>
                        <td>
                            <button class="btn fs-5 open_view_form"
                                data-bs-toggle="modal"
                                data-bs-target="#productViewModal">
                                <i class="fa-regular fa-circle-info"></i>
                            </button>
                            <button class="btn fs-5 open_edit_form"
                                data-bs-toggle="modal"
                                data-bs-target="#productModal">
                                <i class="fa-regular fa-pen-to-square"></i>
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
<!-- ... -->

<!-- Modal -->
<div class="modal fade"
    id="productModal"
    tabindex="-1"
    aria-labelledby="productModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-success" id="productModalLabel">Thêm sản phẩm</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="productForm" style="overflow-y: auto;">
                <input type="hidden" name="product_id" id="product_id" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 modal-body-left px-3">
                            <div class="img-preview-container">
                                <div class="upload-img-preview">
                                    <img src="./asset/img/blank-image.png" alt="" id="img-preview" class="img-preview">
                                </div>
                            </div>
                            <div class="form-group-file">
                                <label for="upload-img" class="form-label-file">
                                    <i class="fa-regular fa-up-from-dotted-line"></i>
                                    Tải hình ảnh
                                </label>
                                <input type="file"
                                    name="productImg"
                                    id="upload-img"
                                    class="form-control"
                                    accept="image/jpeg, image/png, image/jpg, image/webp">
                                <input type="hidden" name="product_images">
                            </div>
                        </div>
                        <div class="col-8 modal-body-right px-4">
                            <div class="row mb-3">
                                <label for="product-name" class="col-form-label col-sm-3 fw-bold">Tên sách</label>
                                <div class="col">
                                    <input type="text"
                                        name="product-name"
                                        class="form-control"
                                        id="product-name"
                                        placeholder="Nhập tên sách">
                                    <span class="text-message product-name-msg"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="product-publisher" class="col-form-label col-sm-3 fw-bold">Nhà xuất bản</label>
                                <div class="col">
                                    <input type="text"
                                        name="product-publisher"
                                        class="form-control"
                                        id="product-publisher"
                                        placeholder="Nhập tên nhà xuất bản">
                                    <span class="text-message product-publisher-msg"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="product-supplier" class="col-form-label col-sm-3 fw-bold">Nhà cung cấp</label>
                                <div class="col">
                                    <select name="product-supplier" id="product-supplier" class="form-select">
                                        <option selected="selected">Chọn nhà cung cấp</option>
                                        <option value="1">Nhã Nam</option>
                                        <option value="2">AZ Việt Nam</option>
                                        <option value="3">Cổ Nguyệt Books</option>
                                        <option value="4">Phúc Minh Books</option>
                                    </select>
                                    <span class="text-message product-supplier-msg"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="product-author" class="col-form-label col-sm-3 fw-bold">Tác giả</label>
                                <div class="col">
                                    <button class="btn btn-success"
                                        id="openSelectAuthorModalBtn"
                                        type="button">
                                        Chọn tác giả
                                    </button>
                                    <span class="text-message product-author-msg"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="product-category" class="col-form-label col-sm-3 fw-bold">Thể loại</label>
                                <div class="col">
                                    <select name="product-category" id="product-category" class="form-select">
                                        <option selected="selected">Chọn thể loại</option>
                                        <option value="1">Trinh thám</option>
                                        <option value="2">Kinh dị</option>
                                        <option value="3">Văn học Việt Nam</option>
                                        <option value="4">Pháp luật</option>
                                    </select>
                                    <span class="text-message product-category-msg"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="product-original-price" class="col-form-label col-sm-3 fw-bold">Giá bìa</label>
                                <div class="col">
                                    <div class="input-group">
                                        <input type="number"
                                            name="product-original-price"
                                            class="form-control"
                                            id="product-original-price"
                                            placeholder="Nhập giá bìa">
                                        <span class="input-group-text">đồng</span>
                                    </div>
                                    <span class="text-message product-original-price-msg"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="product-sale-price" class="col-form-label col-sm-3 fw-bold">Giá bán</label>
                                <div class="col">
                                    <div class="input-group">
                                        <input type="number"
                                            name="product-sale-price"
                                            class="form-control"
                                            id="product-sale-price"
                                            placeholder="Nhập giá bán">
                                        <span class="input-group-text">đồng</span>
                                    </div>
                                    <span class="text-message product-sale-price-msg"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="product-publish-year" class="col-form-label col-sm-3 fw-bold">Năm xuất bản</label>
                                <div class="col">
                                    <input type="number"
                                        name="product-publish-year"
                                        class="form-control"
                                        id="product-publish-year"
                                        placeholder="Nhập năm xuất bản">
                                    <span class="text-message product-publish-year-msg"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="product-weight" class="col-form-label col-sm-3 fw-bold">Trọng lượng</label>
                                <div class="col">
                                    <div class="input-group">
                                        <input type="number"
                                            name="product-weight"
                                            class="form-control"
                                            id="product-weight"
                                            placeholder="Nhập trọng lượng">
                                        <span class="input-group-text">g</span>
                                    </div>
                                    <span class="text-message product-weight-msg"></span>
                                </div>
                            </div>
                            <div class="row mb-3 edit">
                                <label for="product-discount" class="col-form-label col-sm-3 fw-bold">Giảm giá (%)</label>
                                <div class="col">
                                    <select name="product-discount" id="product-discount" class="form-select">
                                        <option selected="selected">Chọn mã giảm giá</option>
                                        <option value="1">10</option>
                                        <option value="2">20</option>
                                        <option value="3">30</option>
                                        <option value="4">40</option>
                                        <option value="5">50</option>
                                    </select>
                                    <span class="text-message product-discount-msg"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="product-description" class="col-form-label col-sm-3 fw-bold">Mô tả</label>
                                <div class="col">
                                    <textarea
                                        rows="5"
                                        name="product-description"
                                        class="form-control"
                                        id="product-description">
                                        </textarea>
                                    <span class="text-message product-description-msg"></span>
                                </div>
                            </div>
                            <div class="row align-items-center edit">
                                <label class="col-form-label col-sm-3 fw-bold">Trạng thái</label>
                                <div class="col form-check form-switch ps-5">
                                    <input type="checkbox"
                                        name="status"
                                        id="status"
                                        class="form-check-input"
                                        role="switch"
                                        checked
                                        onchange="document.getElementById('switch-label').textContent = this.checked ? 'Đang bán' : 'Bị ẩn';">
                                    <label for="status" class="form-check-label" id="switch-label">Đang bán</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="" id="submit_btn">
                    <button type="submit" class="btn btn-success" id="saveModalBtn">Thêm sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade"
    id="selectAuthorModal"
    tabindex="-1"
    aria-labelledby="selectAuthorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-success" id="selectAuthorModalLabel">Chọn tác giả</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fs-5">
                <div class="modal-body">
                    <div class="row row-cols-sm-1 row-cols-md-2 g-3">
                        <div class="col form-check">
                            <input  type="checkbox" 
                                    id="author-id_1"
                                    value="Nam Cao"
                                    class="form-check-input me-2"
                            >
                            <label class="form-check-label" for="author-id_1">Nam Cao</label>
                        </div>
                        <div class="col form-check">
                            <input  type="checkbox" 
                                    id="author-id_2"
                                    value="Nam Cao"
                                    class="form-check-input me-2"
                            >
                            <label class="form-check-label" for="author-id_2">Kim Lân</label>
                        </div>
                        <div class="col form-check">
                            <input  type="checkbox" 
                                    id="author-id_3"
                                    value="Tô Hoài"
                                    class="form-check-input me-2"
                            >
                            <label class="form-check-label" for="author-id_3">Tô Hoài</label>
                        </div>
                        <div class="col form-check">
                            <input  type="checkbox" 
                                    id="author-id_4"
                                    value="Vũ Trọng Phụng"
                                    class="form-check-input me-2"
                            >
                            <label class="form-check-label" for="author-id_4">Vũ Trọng Phụng"</label>
                        </div>
                        <div class="col form-check">
                            <input  type="checkbox" 
                                    id="author-id_5"
                                    value="Nguyễn Nhật Ánh"
                                    class="form-check-input me-2"
                            >
                            <label class="form-check-label" for="author-id_5">Nguyễn Nhật Ánh</label>
                        </div>
                        <div class="col form-check">
                            <input  type="checkbox" 
                                    id="author-id_6"
                                    value="Gabriel García Márquez"
                                    class="form-check-input me-2"
                            >
                            <label class="form-check-label" for="author-id_6">Gabriel García Márquez</label>
                        </div>
                        <div class="col form-check">
                            <input  type="checkbox" 
                                    id="author-id_7"
                                    value="Nguyễn Phạm Quỳnh Hương"
                                    class="form-check-input me-2"
                            >
                            <label class="form-check-label" for="author-id_7">Nguyễn Phạm Quỳnh Hương</label>
                        </div>
                        <div class="col form-check">
                            <input  type="checkbox" 
                                    id="author-id_8"
                                    value="Ái Tân Giác La Hoằng Lịch"
                                    class="form-check-input me-2"
                            >
                            <label class="form-check-label" for="author-id_8">Ái Tân Giác La Hoằng Lịch</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="saveSubModalBtn">Chọn</button>
            </div>
        </div>
    </div>
</div>

<div    class="modal fade"
        id="productViewModal"
        tabindex="-1"
        aria-labelledby="productViewModalLabel"
        aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-success" id="productViewModalLabel">Chi tiết sản phẩm</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4 modal-body-left px-3">
                        <div class="img-preview-container">
                            <div class="upload-img-preview">
                                <!-- Backend: đổi đường dẫn src thành .../uploads/... -->
                                <img src="../asset/img/example-book5.jpg" alt="" id="product-img-preview" class="img-preview">
                            </div>
                        </div>
                    </div>
                    <div class="col-8 modal-body-right px-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Tên sách</span>
                                <span class="detail-value text-end w-50">Nghĩ hoài hổng ra tên sách nào dài dài, thôi thì ghi đỡ vậy nha</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Nhà xuất bản</span>
                                <span class="detail-value text-end w-50">AZ Việt Nam</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Nhà cung cấp</span>
                                <span class="detail-value text-end w-50">NXB Hội Nhà Văn</span>
                            </li>
                            <li class="list-group-item d-flex flex-column">
                                <span class="fw-bold">Tác giả</span>
                                <textarea disabled class="detail-value w-100 rounded-2 mt-2" rows="3">Nguyễn Ngọc Ánh, Nguyễn Ngọc Ngạn, Sherlock Holmes, Edogawa Conan, Kudo Shinichi</textarea>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Thể loại</span>
                                <span class="detail-value text-end w-50">Kinh dị</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Giá bìa</span>
                                <span class="detail-value text-end w-50">102.000.000 đ</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Giá bán</span>
                                <span class="detail-value text-end w-50">102.000.000 đ</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Năm xuất bản</span>
                                <span class="detail-value text-end w-50">2077</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Trọng lượng</span>
                                <span class="detail-value text-end w-50">65g</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Giảm giá</span>
                                <span class="detail-value text-end w-50">0%</span>
                            </li>
                            <li class="list-group-item d-flex flex-column">
                                <span class="fw-bold">Mô tả</span>
                                <textarea disabled class="detail-value w-100 rounded-2 mt-2" rows="5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis unde molestias laudantium inventore reiciendis? Velit similique tenetur doloremque ipsam corporis. Architecto excepturi iste doloremque maxime in ipsam dolorem adipisci minus?</textarea>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Trạng thái</span>
                                <span class="detail-value text-end w-50">Đang bán</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ... -->

<!-- Script -->
<script src="./asset/js/Product.js"></script>