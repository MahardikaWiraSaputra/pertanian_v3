<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Checkout</h3>
                    <ul>
                        <li><a href="index.html">home</a>
                        </li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="Checkout_section mt-70">
    <div class="container">
        <div class="row">
            <h3>Alamat Pengiriman</h3>
            <div class="col-12">
                <div class="user-actions">
                    <h3> <i class="fa fa-file-o" aria-hidden="true"></i> Sesuai Alamat Profil <a class="Returning" href="#checkout_coupon" data-bs-toggle="collapse" aria-expanded="true">Ganti Alamat</a></h3>
                    <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                        <div class="checkout_info coupon_info">
                            <form action="#">
                                <input placeholder="Coupon code" type="text">
                                <button type="submit">Apply coupon</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <form action="#">
                        <h3>Pesanan Anda</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Daging Sapi 1 Kg <strong> × 1</strong>
                                        </td>
                                        <td>Rp. 120.000</td>
                                    </tr>
                                    <tr>
                                        <td>Tetelan 1 Kg <strong> × 1</strong>
                                        </td>
                                        <td>Rp. 100.000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>Rp. 220.000</td>
                                    </tr>
                                    <tr>
                                        <th>Ongkos Kirim</th>
                                        <td><strong>0</strong>
                                        </td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td><strong>Rp. 220.000</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="panel-default">
                                <input id="payment" name="check_method" type="radio" data-target="createp_account" /> <a href="#method" data-bs-toggle="collapse" aria-controls="method">Cash on Delivery (COD)</a>
                                <div id="method" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-default">
                                <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" /> <a href="#collapsedefult" data-bs-toggle="collapse" aria-controls="collapsedefult">Bank Transfer <img src="img/icon/papyel.png" alt=""></a>
                                <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="order_button">
                                <button type="submit">Selesaikan Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>