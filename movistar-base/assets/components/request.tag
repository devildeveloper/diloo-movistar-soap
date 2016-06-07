<request>
<div class="ui styled fluid accordion animated bounceInLeft"  each={items}>
    <div class="title">
        <i class="dropdown icon"></i>
        Nueva Solicitud de {nombres }
    </div>
    <div class="content">
        <div class="ui comments">
            <div class="comment">

                <div class="content">
                    <a class="author">{ nombres }</a>
                    <div class="text">
                        <i class="icon phone teal"></i> <a href="#">{ nro_celular }</a>
                        <i class="icon home teal"></i> <a href="#">{ nro_fijo }</a>
                        <p><i class="icon payment teal"></i>{ documento }  </p>
                    </div>                            
                </div>
            </div>
        </div>
    </div> 
</div>
<script>
    var cache  = this;
    cache.items=[];
    socket.on('pedido',function(data){
        console.log(data)
 //       var jsonObj = x2js.xml_str2json( data.request ); 
        cache.items.push(data.data); 
        cache.update();  
    });
    cache.on('updated',function(){
        $('.accordion',this.root).accordion();
    })
</script>
</request>
