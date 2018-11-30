<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="GET" action="/checkout">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Produto</th>
                                            <th class="product-price">Preço</th>
                                            <th class="product-quantity">Quantidade</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter1=-1;  if( isset($carrinho) && ( is_array($carrinho) || $carrinho instanceof Traversable ) && sizeof($carrinho) ) foreach( $carrinho as $key1 => $value1 ){ $counter1++; ?>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="/">X</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="shop_thumbnail" src="../res/site/img/produtos/<?php echo htmlspecialchars( $value1["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">R$<?php echo htmlspecialchars( $value1["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" class="minus" value="-">
                                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo htmlspecialchars( $value1["qtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" min="0" step="1">
                                                    <input type="button" class="plus" value="+">
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">R$<?php echo htmlspecialchars( $value1["preco"] * $value1["qtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> 
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                    <input type="submit" value="Aplicar cupon" name="apply_coupon" class="button">
                                                </div>
                                                <input type="submit" value="Atualizar carrinho" name="update_cart" class="button">
                                                <input type="submit" value="Finalizar Compra" name="proceed" class="checkout-button button alt wc-forward">
                                            </td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                            </form>

               


                            <div class="cart_totals ">
                                <h2>Total</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">R$<?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?></span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Frete</th>
                                            <td>Gratis</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h3 class="text-right">R$<?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                            </div>        

                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    