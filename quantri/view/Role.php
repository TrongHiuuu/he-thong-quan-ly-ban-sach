    <!-- Content -->
    <main class="container pt-5">
        <!-- Page title -->
        <div class="row">
            <h1 class="page-title">QUẢN LÝ NHÓM QUYỀN</h1>
        </div>
        <!-- ... -->
        <!-- Page control -->
        <div class="row d-flex justify-content-between">
            <div class="col-auto">
                <button class="btn btn-control open_add_form" 
                        type="button" 
                        data-bs-toggle="modal" 
                        data-bs-target="#permissionModal"
                >
                    <i class="fa-regular fa-plus me-2"></i>
                    Thêm nhóm quyền
                </button>
            </div>
            <div class="col">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nhập id, tên nhóm quyền" aria-label="Tìm kiếm nhóm quyền" aria-describedby="search-bar">
                    <button class="btn btn-outline-custom" type="button" id="search-btn">Tìm</button>
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
                            <th scope="col">Mã nhóm quyền</th>
                            <th>Tên nhóm quyền</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //chia mang result thanh tung trang
                        $num_per_page = 5; //total records each page
                        $curr_page = getPage();
                        $start = ($curr_page-1)*$num_per_page; //start divide for this page
                        $total_records = count($result);
                        echo '<input type="hidden" name="curr_page" class="curr_page" value="'.$curr_page.'">';

                        $keys = array_keys($result);
                        for($i=$start; $i<$start+$num_per_page && $i<$total_records; $i++){
                            extract($result[$keys[$i]]);
                        ?>
                        <tr>
                            <td class="role_id"><?=$idNQ?></td>
                            <td><?=$tenNQ?></td>
                            <td>
                                <?php
                                    if($trangthai)
                                        echo '<span class="bagde rounded-2 text-white bg-success p-2">Hoạt động</span>';
                                    else
                                        echo '<span class="bagde rounded-2 text-white bg-secondary p-2">Bị khóa</span>'
                                ?>
                            </td>
                            <td>
                                <button class="btn fs-5 open_view_form" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#permissionModal"
                                >
                                    <i class="fa-regular fa-circle-info"></i>
                                </button>
                                <button class="btn fs-5 open_edit_form"
                                        data-bs-toggle="modal"
                                        data-bs-target="#permissionModal"
                                >
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                
                                <?php
                                    if($trangthai)
                                        echo '
                                            <button class="btn fs-5 lock_role">
                                            <i class="fa-regular fa-lock"></i>';
                                    else
                                        echo '
                                            <button class="btn fs-5 unlock_role">
                                            <i class="fa-regular fa-unlock"></i>'
                                ?>
                                </button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- ... -->
        <!-- Pagination -->
        <div class="row mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                <?php
                    $total_pages = ceil($total_records/$num_per_page);
                    echo '<li class="page-item disabled">';
                    if($curr_page>1) 
                    echo '<a class="page-link" href="index.php?page='.$pageTitle.'&index='.($curr_page-1).'">Trước</a>';
                    else 
                    echo '<a class="page-link" href="index.php?page='.$pageTitle.'&index=1">Trước</a>';
                    echo '</li>';
                    for($i=1; $i<=$total_pages; $i++){
                        echo '<li class="page-item">';
                        if($curr_page==$i)
                            echo '<a class="page-link active" href="index.php?page='.$pageTitle.'&index='.$i.'">'.$i;
                        else echo '<a class="page-link" href="index.php?page='.$pageTitle.'&index='.$i.'">'.$i;
                        echo '</a></li>';
                    }
                    echo '<li class="page-item">';
                    if($curr_page<$total_pages)
                        echo '<a class="page-link text-dark" href="index.php?page='.$pageTitle.'&index='.($curr_page+1).'">Sau</a>';
                    else echo '<a class="page-link text-dark" href="index.php?page='.$pageTitle.'&index='.$total_pages.'">Sau</a>';
                    echo '</li>';
                ?>
                </ul>
              </nav>
        </div>
        <!-- ... -->
    </main>
    <!-- ... -->

    <!-- MODAL-->
    <div class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="permissionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-success" id="permissionModalLabel">Thêm nhóm quyền</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="permissionForm" style="overflow-y: auto;">
                    <input type="hidden" name="idNQ" id="idNQ" value="">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tenNQ" id="permissionGroupName" placeholder="Nhập tên nhóm quyền">
                            <label for="permissionGroupName" style="color: #1D712C;">Tên nhóm quyền</label>
                            <span class="text-message role-name-msg"></span>
                        </div>
    
                        <table class="table table-borderless permission-group">
                            <thead>
                                <tr>
                                    <th class="text-success text-start fs-5">Danh mục chức năng</th>
                                    <th>Xem</th>
                                    <th>Tạo mới</th>
                                    <th>Cập nhật</th>
                                    <th>Xóa</th>
                                    <th>In</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Quản lý nhóm quyền</td>
                                    <td><input type="checkbox" name="NQ_xem" class="form-check-input"></td>
                                    <td><input type="checkbox" name="NQ_them" class="form-check-input"></td>
                                    <td><input type="checkbox" name="NQ_sua" class="form-check-input"></td>
                                    <td><input type="checkbox" name="NQ_xoa" class="form-check-input"></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Quản lý tài khoản</td>
                                    <td><input type="checkbox" name="TK_xem" class="form-check-input"></td>
                                    <td><input type="checkbox" name="TK_them" class="form-check-input"></td>
                                    <td><input type="checkbox" name="TK_sua" class="form-check-input"></td>
                                    <td><input type="checkbox" name="TK_xoa" class="form-check-input"></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Quản lý tác giả</td>
                                    <td><input type="checkbox" name="TG_xem" class="form-check-input"></td>
                                    <td><input type="checkbox" name="TG_them" class="form-check-input"></td>
                                    <td><input type="checkbox" name="TG_sua" class="form-check-input"></td>
                                    <td><input type="checkbox" name="TG_xoa" class="form-check-input"></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Quản lý danh mục</td>
                                    <td><input type="checkbox" name="DM_xem" class="form-check-input"></td>
                                    <td><input type="checkbox" name="DM_them" class="form-check-input"></td>
                                    <td><input type="checkbox" name="DM_sua" class="form-check-input"></td>
                                    <td><input type="checkbox" name="DM_xoa" class="form-check-input"></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Quản lý nhà cung cấp</td>
                                    <td><input type="checkbox" name="NCC_xem" class="form-check-input"></td>
                                    <td><input type="checkbox" name="NCC_them" class="form-check-input"></td>
                                    <td><input type="checkbox" name="NCC_sua" class="form-check-input"></td>
                                    <td><input type="checkbox" name="NCC_xoa" class="form-check-input"></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Quản lý mã giảm giá</td>
                                    <td><input type="checkbox" name="MGG_xem" class="form-check-input"></td>
                                    <td><input type="checkbox" name="MGG_them" class="form-check-input"></td>
                                    <td><input type="checkbox" name="MGG_sua" class="form-check-input"></td>
                                    <td><input type="checkbox" name="MGG_xoa" class="form-check-input"></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Quản lý sản phẩm</td>
                                    <td><input type="checkbox" name="SP_xem" class="form-check-input"></td>
                                    <td><input type="checkbox" name="SP_them" class="form-check-input"></td>
                                    <td><input type="checkbox" name="SP_sua" class="form-check-input"></td>
                                    <td><input type="checkbox" name="SP_xoa" class="form-check-input"></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Quản lý đơn hàng</td>
                                    <td><input type="checkbox" name="DH_xem" class="form-check-input"></td>
                                    <td>-</td>
                                    <td><input type="checkbox" name="DH_sua" class="form-check-input"></td>
                                    <td>-</td>
                                    <td><input type="checkbox" name="DH_in" class="form-check-input"></td>
                                </tr>
                                <tr>
                                    <td>Quản lý phiếu nhập sách</td>
                                    <td><input type="checkbox" name="PN_xem" class="form-check-input"></td>
                                    <td><input type="checkbox" name="PN_them" class="form-check-input"></td>
                                    <td><input type="checkbox" name="PN_sua" class="form-check-input"></td>
                                    <td><input type="checkbox" name="PN_xoa" class="form-check-input"></td>
                                    <td><input type="checkbox" name="PN_in" class="form-check-input"></td>
                                </tr>
                                <tr>
                                    <td>Thống kê doanh thu</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td><input type="checkbox" name="DT_in" class="form-check-input"></td>
                                </tr>
                                <tr>
                                    <td>Thống kê nhập kho</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td><input type="checkbox" name="NK_in" class="form-check-input"></td>
                                </tr>
                                <tr>
                                    <td>Thống kê lợi nhuận</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td><input type="checkbox" name="LN_in" class="form-check-input"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="" id="submit_btn">
                        <button type="submit" class="btn btn-success" id="saveModalBtn">Thêm nhóm quyền</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ... -->

    <!-- Link JS ở chỗ này nè!!! -->
    <script src="./asset/js/Role.js"></script>
</body>
</html>