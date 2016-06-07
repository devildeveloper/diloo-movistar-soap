var io = require('socket.io')(5050);

io.on('connection', function (socket) {
  console.log('connected');
  socket.on('new_request',function(data){
	console.log('soap!');
	io.emit('pedido',data);
  });
  socket.on('disconnect', function () {
    console.log('disconnect');
  });
});
