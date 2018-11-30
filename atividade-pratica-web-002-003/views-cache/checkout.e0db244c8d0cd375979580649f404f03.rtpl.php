<?php if(!class_exists('Rain\Tpl')){exit;}?>   <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="background: grey;">
                    <div class="product-bit-title text-center">
                        <h2>Finalizar Compra</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                <h3 id="order_review_heading">Seu Pedido</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Produto</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter1=-1;  if( isset($carrinho) && ( is_array($carrinho) || $carrinho instanceof Traversable ) && sizeof($carrinho) ) foreach( $carrinho as $key1 => $value1 ){ $counter1++; ?>

                                            <tr class="cart_item">
                                                <td class="product-name"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?><strong class="product-quantity"> x </strong><?php echo htmlspecialchars( $value1["qtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </td>
                                                <td class="product-total">
                                                    <span class="amount"><?php echo htmlspecialchars( $value1["qtd"] * $value1["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> </td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td><span class="amount"><?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Frete</th>
                                                <td>Grátis
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>


                                            <tr class="order-total">
                                                <th>Total do pedido</th>
                                                <td><strong><span class="amount"><?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?></span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>


                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                <label for="payment_method_bacs">Boleto Bancário </label>
                                            </li>
                                            <li class="payment_method_paypal">
                                                <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal">
                                                <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"><a title="What is PayPal?" onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" class="about_paypal" href="https://www.paypal.com/gb/webapps/mpp/paypal-popup">O que é PayPal?</a>
                                                </label>
                                                <div style="display:none;" class="payment_box payment_method_paypal">
                                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="form-row place-order" style="    margin-bottom: 15px;
">

                                            <input type="submit" data-value="Place order" value="Finalizar Pedido" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                        </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>
