<!-- <----Header----> 
<?php
include '../inc/header.php';
require '../controller/ql-nha-cung-cap.php';
$sql1 = "SELECT idTinh,tenTinh FROM tinh ORDER BY tenTinh ASC";
$result1 = mysqli_query($GLOBALS['conn'], $sql1);

?>

<body>
    <!-- Content -->
    <div class="container pt-5">
        <!-- Page title -->
        <div class="row">
            <h1 class="page-title">QUẢN LÝ NHÀ CUNG CẤP</h1>
        </div>
        <!-- ... -->
        <!-- Page control -->
        <div class="row d-flex justify-content-between">
            <div class="col-auto">
                <button class="btn btn-control" 
                        type="button" 
                        onclick="openModal(event,'add')"
                        data-bs-toggle="modal" 
                        data-bs-target="#supplierModal"
                >
                    <i class="fa-regular fa-plus me-2"></i>
                    Thêm nhà cung cấp
                </button>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group">
                            <input type="text" 
                                    class="form-control" 
                                    placeholder="Nhập id, tên nhà cung cấp" 
                                    aria-label="Tìm kiếm nhà cung cấp" 
                                    aria-describedby="search-bar"
                            >
                            <button class="btn btn-outline-custom" type="button" id="search-btn">Tìm</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <select id="status-select" class="form-select">
                                <option selected>Tất cả trạng thái</option>
                                <option value="0">Bị khóa</option>
                                <option value="1">Đang hoạt động</option>
                            </select> 
                        </div>
                    </div>
                    <div class="col-auto align-items-center">
                        <span class="me-2">Tên nhà cung cấp</span>
                        <button class="btn btn-control">
                            <i class="fa-regular fa-arrow-down-a-z"></i>
                        </button>
                        <button class="btn btn-control">
                            <i class="fa-regular fa-arrow-up-z-a"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-control">Làm mới</button>
            </div>
        </div>
        <!-- ... -->
        <!-- Table data -->
        <div class="row mt-5">
            <div class="col">
                <table class="table table-bordered text-center table-hover align-middle border-success">
                    <thead class="table-header">
                        <tr>
                            <th scope="col">Mã nhà cung cấp</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Email</th>
                            <th>Điện thoại</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            $sql = "SELECT idNCC, tenNCC, email, dienthoai, trangthai FROM nhacungcap";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Xuất dữ liệu của mỗi hàng
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td class='supplier_id'>" . $row["idNCC"] . "</td>";
                                    echo "<td>" . $row["tenNCC"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["dienthoai"] . "</td>";
                                    if($row['trangthai'] == 0) {
                                        echo '<td><span class="badge rounded-2 text-white bg-secondary p-2">Bị ẩn</span></td>';
                                    } else {
                                        echo '<td><span class="badge rounded-2 text-white bg-success p-2">Hoạt động</span></td>';
                                    }
                                    echo '<td>';
                                    echo '<form>';
                                    echo '<button class="btn fs-5" onclick="openModal(event,\'view\')" data-bs-toggle="modal" data-bs-target="#supplierModal">';
                                    echo '<i class="fa-regular fa-circle-info"></i>';
                                    echo '</button>';
                                    echo '<button class="btn fs-5" onclick="openModal(event,\'edit\')" data-bs-toggle="modal" data-bs-target="#supplierModal">';
                                    echo '<i class="fa-regular fa-pen-to-square"></i>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
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
    </div>
    <!-- ... -->

    <!-- Modal -->


    <div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-success" id="supplierModalLabel">Thêm nhà cung cấp</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="supplierForm" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="supplier-name" class="form-label">Tên nhà cung cấp</label>
                            <input type="text" name="supplier-name" id="supplier-name" class="form-control" placeholder="Nhập tên nhà cung cấp">
                        </div>
                        <div class="mb-3">
                            <label for="supplier-email" class="form-label">Email</label>
                            <input type="email" name="supplier-email" id="supplier-email" class="form-control" placeholder="Nhập địa chỉ email">
                        </div>
                        <div class="mb-3">
                            <label for="supplier-phone" class="form-label">Số điện thoại</label>
                            <input type="tel" name="supplier-phone" id="supplier-phone" class="form-control" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="supplier-city" class="form-label">Tỉnh/thành</label>
                                <select name="supplier-city" id="supplier-city" class="form-select">
                                    <option selected>Chọn tỉnh/thành</option>
                                    <?php
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                    ?>
                                        <option value="<?php echo isset($row1['idTinh']) ? $row1['idTinh'] : ''; ?>">
                                            <?php echo isset($row1['tenTinh']) ? $row1['tenTinh'] : 'Tên tỉnh không tồn tại'; ?>
                                        </option>
                                    <?php
                                        }
                                    ?>


                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="supplier-district" class="form-label">Quận/huyện</label>
                                <select name="supplier-district" id="supplier-district" class="form-select">
                                    <option selected>Chọn quận/huyện</option>
                                  
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="supplier-ward" class="form-label">Phường/xã</label>
                                <select name="supplier-ward" id="supplier-ward" class="form-select">
                                    <option selected>Chọn phường/xã</option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="supplier-address" class="form-label">Địa chỉ</label>
                            <input type="text" name="supplier-address" id="supplier-address" class="form-control" placeholder="Nhập số nhà, tên đường">
                        </div>
                       
                        <div id="statusForm" class="row mb-3 align-items-center edit">
                            <label class="col-form-label col-sm-3">Trạng thái</label>
                            <div class="col form-check form-switch ps-5">
                                <input  type="checkbox" 
                                        name="userstatus" 
                                        id="userstatus" 
                                        class="form-check-input" 
                                        role="switch" 
                                        checked
                                        onchange="document.getElementById('switch-label').textContent = this.checked ? 'Đang hoạt động' : 'Bị khóa';"
                                >
                                <label for="userstatus" class="form-check-label" id="switch-label">Đang hoạt động</label>
                            </div>
                        </div>
                    </div>
                    <div class="alert"></div>
                    <div class="modal-footer"> 
                      <input type="hidden" name="add_data_supplier" value="submit">
                        <button type="submit" class="btn btn-success" id="modalSaveBtn">Thêm nhà cung cấp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ... -->

    <!-- Link JS ở chỗ này nè!!! -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../asset/js/ql-nha-cung-cap.js"></script>
    <script src="../asset/js/address.js"></script>
</body>

</html>