
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin-dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Food Items
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Food Items</h4>
                        <div class="ms-auto text-end">
                            <a type="button" href="<?= BASE_URL ?>/admin-dashboard?page=add-food-item" class="btn btn-success btn-lg text-white">
                                <i class="fas fa-plus" style="margin-right: 5px;"></i>
                                Add New Food Item
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <?php
                include "app/models/Food.model.php";

                $food = new Food();

                $tableData = $food::get_all();

                
                include "app/models/Category.model.php";

                $category = new Category();

                $categories = $category::get_all();

                $categoryMap = array();

                foreach ($categories as $category) {
                    $categoryMap[$category['id']] = strtolower($category['name']);
                }

                

            ?>


            <div class="container-fluid">
                
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">All Food Items</h5>
                      <div class="table-responsive">
                        <table
                          id="zero_config"
                          class="table table-striped table-bordered"
                        >
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Image</th>
                              <th>Description</th>
                              <th>Category</th>
                              <th>Visibility</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                                foreach ($tableData as $key => $value) {
                                  
                                  $category_name = $categoryMap[$value['category_id']];
                                  $visibility = $value['visibility'] == 1 ? "Visible" : "Hidden";
                                    echo "<tr>";
                                    echo "<td>" . $value['id'] . "</td>";
                                    echo "<td>" . $value['name'] . "</td>";
                                    echo "<td>" . $value['price'] . "</td>";
                                    echo "<td><img width='50px' src='" . $value['img'] . "' alt=''></td>";
                                    echo "<td>" . substr($value['description'], 0, 50) . '...' . "</td>";
                                    echo "<td>" . $category_name . "</td>";
                                    echo "<td>" . $visibility . "</td>";
                                    if (($_SESSION['admin_role'] == 'admin')) {
                                        echo "<td>
                                            <a href='". BASE_URL ."/admin-dashboard?page=edit-food-item&id=" . $value['id'] . "' class='btn btn-primary'>Edit</a>
                                            <a href='#' class='btn btn-danger' onclick='deleteFoodItem(" . $value['id'] . ")'>Delete</a>
                                          </td>";
                                        echo "</tr>";
                                
                                        
                                }else {
                                    echo "<td>only view</td>"; }
                                    
                                    
                                }
                            ?>
                            
                          </tbody>
                          <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Visibility</th>
                                <th>Actions</th>
                              </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                  
                  <script>
                    function deleteFoodItem(id) {
                        Swal.fire({
                            title: 'Are you sure? You want to delete this Item?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#ff6347',
                            cancelButtonColor: '#48c28d',
                            confirmButtonText: 'Yes, delete it!'

                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Perform actions with the form data, e.g., make an AJAX request
                                $.ajax({
                                    url: '<?=BASE_URL?>/admin/AJAX/delete_food',
                                    type: 'POST',
                                    data: { food_id: id },
                                    success: function (data) {
                                        // Check the response from the server
                                        if (data.success) {
                                            Swal.fire('Success', 'Item deleted successfully', 'success').then(() => {
                                                window.location.reload();
                                            })
                                        } else {
                                            Swal.fire('Failed', 'Item could not be deleted', 'error');
                                            console.log(data);
                                        }
                                    },
                                    error: function () {
                                        Swal.fire('Error', 'An error occurred while submitting the form', 'error');
                                        console.log(data);
                                    }
                                });
                            }
                        })
                    }
                  </script>
                  
                  
                  
                  
    <!--              End-->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Designed and Developed by: Anushka Lakshan <i class="fa fa-heart"></i>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>