<?php include('header.php'); ?>

<!-- Upon page load, the todo list, grouped if "completed" or "not completed", will show. 
If the user presses the check button, the isComplete id of the to-do item is marked as true. The page will then be refreshed. 
If the user presses the "add new task" button, a pop-up will appear, asking for the details. We have no need to use JS much as we 
don't need to zap the elements XD-->
<body>
    <?php
    include('conn.php');
    // $cart = json_decode($_POST['cart'], true);

    // if ($cart === null) {
    //     header("Location: order.php");
    // }
    ?>

    <div class="container">
        <h1 class="text-center text-dark siteHeader">To-Do</h1>
        <!-- HEADER, where most of the functions can be seen -->
        <div class="alert alert-light shadow sticky-top" role="alert">
            <div class="row form-inline">
                <div class="col-sm-3">
                    <a id="contShopping" class="btn text-primary btn-sm"><span class="oi oi-chevron-left"></span> Continue shopping</a>
                </div>
                <!-- <div class="col-sm-4">
                    <span id="cartCount" class="badge badge-secondary">
                        <script>
                            document.write(Object.keys(cart).length + " item(s)");
                        </script>
                    </span>
                    <span id="totalPrice" class="badge badge-primary">
                        <!-- TEMPLATE TEXT, will be filled upon page load
                    </span>
                </div> -->
                <div class="col-sm-5 input-group searchBox">
                    <input type="text" placeholder="Customer Name (optional)" class="form-control" name="customer">
                    <div class="input-group-append">
                        <button id="checkout" type="submit" class="btn btn-outline-primary btn-sm" name="cart">Checkout <span class="oi oi-chevron-right"></span></button>
                    </div>
                </div>
            </div>
        </div>

        <ul class="list-group">
            <?php
            foreach ($cart as $key => $value) {
                echo "<li id='itm-$key' class='list-group-item'>";
                $sql = "SELECT * FROM product LEFT JOIN category ON category.categoryid=product.categoryid WHERE productID=" . $key;
                $row = $conn->query($sql)->fetch_assoc();
            ?>
                <div class="row form-inline">
                    <div class="col-sm-7 justify-content-between form-inline">
                        <div class="row col-12 form-inline">
                            <div class="col-sm-2">
                                <img width="38px" height="38px" src="<?php if (empty($row['photo'])) {
                                                                            echo "upload/noimage.jpg";
                                                                        } else {
                                                                            echo $row['photo'];
                                                                        } ?>">
                            </div>
                            <div class="col-sm-6 justify-content-between">
                                <h6><?php echo $row["productname"]; ?></h6>
                                <span class="badge badge-custom"><?php echo $row['catname']; ?></span>
                            </div>
                            <div class="col-sm-4">
                                ₱ <?php echo number_format($row['price'], 2); ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-5">
                        <div class="row col-12 form-inline">
                            <div class="col-sm-10 input-group qty-control">
                                <button id="inc-<?php echo $key; ?>" value="<?php echo $row['price']; ?>" class="btn btn-sm text-primary qty-minus"><span class="oi oi-minus"></span></button>
                                <input id="qty-<?php echo $key; ?>" type="numeric" class="form-control qty-field" placeholder="Quantity" disabled>
                                <script>
                                    $("#qty-" + <?php echo $key; ?>).attr("value", cart[<?php echo $key; ?>]);
                                    totalPrice += !(cart[<?php echo $key; ?>] === undefined) ? (<?php echo $row['price']; ?>) * cart[<?php echo $key; ?>] : 0;
                                </script>
                                <button id="dec-<?php echo $key; ?>" value="<?php echo $row['price']; ?>" class="btn btn-sm text-primary qty-plus"><span class="oi oi-plus"></span></button>
                            </div>
                            <div class="col-sm-2">
                                <button id="rem-<?php echo $key; ?>" value="<?php echo $row['price']; ?>" class="btn btn-outline-danger btn-sm rem">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
                </li>
                <script>
                    // cleanup when the page is reloaded 
                    // since the php variable can't be modified once loaded
                    if (cart[<?php echo $key; ?>] === undefined) {
                        $("#itm-" + <?php echo $key; ?>).remove();
                    }
                </script>
            <?php
            }
            ?>
        </ul>
        <script>
            if (!(Object.keys(cart).length > 0)) {
                $("#checkout").attr('disabled', "");
            }

            $("#totalPrice").html("Total: ₱ " + (totalPrice));
        </script>
        <hr>
    </div>
    <script>
        $(document).ready(function() {
            $("#contShopping").click(function(e) {
                e.preventDefault();
                sessionStorage.setItem('cart', JSON.stringify(cart));

                window.location = "order.php";
            });

            $("#checkout").click(function(e) {
                var cartJSON = JSON.stringify(cart);
                $(this).val(cartJSON);
            });

            $('button.qty-minus').click(function(e) {
                e.preventDefault();
                var $this = $(this);
                var $input = $this.closest('div').find('input');
                var price = parseFloat($(this).attr('value'));
                var key = $input.attr('id').slice(4);
                var value = parseInt($input.val()) - 1;

                totalPrice -= (value <= 10 && value > 0) ? price : 0;
                $("#totalPrice").html("Total: ₱ " + (totalPrice));

                value = limiter(value);
                $input.val(value);
                update(key, value);
            });

            $('button.qty-plus').click(function(e) {
                e.preventDefault();
                var $this = $(this);
                var $input = $this.closest('div').find('input');
                var price = parseFloat($(this).attr('value'));
                var key = $input.attr('id').slice(4);
                var value = parseInt($input.val()) + 1;

                totalPrice += (value <= 10 && value > 0) ? price : 0;
                $("#totalPrice").html("Total: ₱ " + (totalPrice));

                value = limiter(value);
                $input.val(value);
                update(key, value);
            });

            $('button.rem').on('click', function(e) {
                e.preventDefault();
                var input = $(this);
                var key = input.attr('id').slice(4);
                var value = parseFloat(input.attr('value'));
                var subTotal = value * parseInt(cart[key]);

                delete cart[key];
                sessionStorage.setItem('cart', JSON.stringify(cart));

                $("#itm-" + key).remove();
                $("#cartCount").html(Object.keys(cart).length + " item(s)");
                totalPrice -= subTotal;
                $("#totalPrice").html("Total: ₱ " + (totalPrice));

                if (!(Object.keys(cart).length > 0)) {
                    $("#checkout").attr('disabled', "");
                }
            });

            function update(key, value) {
                cart[key] = value;
                sessionStorage.setItem('cart', JSON.stringify(cart));
            }

            function limiter(value) {
                if (value <= 0 || isNaN(value)) {
                    return 1;
                } else if (value >= 10) {
                    return 10;
                } else {
                    return value;
                }
            }
        });
    </script>
</body>

</html>