var socket = io('http://40.114.93.162:5050');
var x2js = new X2JS();
socket.on('connect',function(){
   console.dir('connected') 
});
/*    socket.on('pedido',function(data){
        console.log(data)
        var jsonObj = x2js.xml_str2json( data.request );
       // cache.items.push(jsonObj);
       // cache.update();
    });*/
//Global Riot Mixins
var globalMixin={
    init:function(){
        this.on('updated',function(){
            
        })
    }
    ,setOpts:function(opts,update){
        console.log('updated')
        this.opts = opts;
        if(!update) this.update()
        return this;
    }
}

var requestTag = {};
var popupTag   = {};
//compile reference
riot.compile(function(){
    requestTag = riot.mount('request');
    //popupTag   = riot.mount('popup')[0];
});
//setting global mixin
riot.mixin(globalMixin);


