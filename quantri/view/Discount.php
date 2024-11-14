<main class="container pt-5">
        <!-- Page title -->
        <div class="row">
            <h1 class="page-title">QUẢN LÝ MÃ GIẢM GIÁ</h1>
        </div>
        <!-- ... -->
        <!-- Page control -->
        <div class="row d-flex justify-content-between">
            <div class="col-auto">
                <button class="btn btn-control open_add_form" 
                        type="button" 
                        data-bs-toggle="modal" 
                        data-bs-target="#discountModal"
                >
                    <i class="fa-regular fa-plus me-2"></i>
                    Thêm mã giảm giá
                </button>
            </div>
            <div class="col">
                <div class="input-group">
                    <input type="text" 
                            class="form-control" 
                            placeholder="Nhập id, phần trăm giảm giá" 
                            aria-label="Tìm kiếm mã giảm giá" 
                            aria-describedby="search-bar"
                    >
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
                            <th scope="col">Mã giảm giá</th>
                            <th>Phần trăm giảm</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
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
                        <tr class="discount_row">
                            <td class="discount_id"><?=$idMGG?></td>
                            <td class="discount_percentage"><?=$phantram?></td>
                            <td class="discount_start_date"><?=$ngaybatdau?></td>
                            <td class="discount_end_date"><?=$ngayketthuc?></td>
                            <td class="discount_status">
                                <?php
                                    if($trangthai === "hd") echo '<span  class="bagde rounded-2 text-white bg-success p-2">Hoạt động</span></td>';
                                    else if($trangthai === "cdr") echo '<span class="bagde rounded-2 text-white bg-primary p-2">Chưa diễn ra</span></td>';
                                    else if($trangthai === "huy") echo '<span class="bagde rounded-2 text-white bg-danger p-2">Hủy</span></td>';
                                    else echo '<span class="bagde rounded-2 text-white bg-secondary p-2">Hết hạn</span></td>';
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($trangthai=="cdr"){  
                                ?>
                                    <button class="btn fs-5 open_edit_form"
                                        data-bs-toggle="modal"
                                        data-bs-target="#discountModal"
                                    >
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn fs-5 lock_discount">
                                        <i class="fa-regular fa-trash"></i>
                                    </button>
                                <?php 
                                }
                                ?>
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

    <!-- Modal -->
    <div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-success" id="discountModalLabel">Thêm mã giảm giá</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="discountForm">
                    <input type="hidden" name="discount_id" id="discount_id">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="discount-percent" class="col-form-label col-sm-4">Phần trăm giảm</label>
                            <div class="col">
                                <input type="number" min="1" max="100" name="discount-percent" class="form-control" id="discount-percent">
                                <span class="text-message discount-percent-msg"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="discount-date-start" class="col-form-label col-sm-4">Ngày bắt đầu</label>
                            <div class="col">
                                <input type="date" name="discount-date-start" class="form-control" id="discount-date-start">
                                <span class="text-message discount-date-start-msg"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="discount-date-end" class="col-form-label col-sm-4">Ngày kết thúc</label>
                            <div class="col">
                                <input type="date" name="discount-date-end" class="form-control" id="discount-date-end">
                                <span class="text-message discount-date-end-msg"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="" id="submit_btn">
                        <button type="submit" id="saveModalBtn" class="btn btn-success">Thêm mã giảm giá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ... -->

    <!-- Link JS ở chỗ này nè!!! -->
    <script src="./asset/js/Discount.js"></script>
</body>
</html>