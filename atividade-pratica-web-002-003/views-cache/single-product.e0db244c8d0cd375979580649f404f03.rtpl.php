<?php if(!class_exists('Rain\Tpl')){exit;}?>     <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="background: grey;">
                    <div class="product-bit-title text-center" >
                        <h2>Detalhes do Produto</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="<?php echo htmlspecialchars( $product["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="" style="max-width: 475px;">
                                    </div>
                                 </div>   
                                </div> 
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo htmlspecialchars( $product["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                                    <div class="product-inner-price">
                                        <ins>R$<?php echo htmlspecialchars( $product["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></ins>
                                    </div>    
                                    </div>
                          

                                    <form action="/carrinho/add/<?php echo htmlspecialchars( $product["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="GET" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Adicionar ao carrinho</button>
                                    </form>   
                                </div>
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descrição</a></li>
                                            
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Descrição do Produto</h2>  

                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
