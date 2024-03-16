<!-- ================ Order Details List =================== -->
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>آخرین فروشات</h2>
            <a href="" class="btn-1">مشاهده</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Payment</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $select_orders = mysqli_query($conn, "SELECT * FROM ordered ORDER BY user_id DESC LIMIT 8 ") or die(mysqli_error($conn));
                while ($row = mysqli_fetch_array($select_orders)) :
                ?>
                    <tr>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["payment"]; ?></td>
                        <td><span class='status delivered'>Delivered</span></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>


    </div>
</div>