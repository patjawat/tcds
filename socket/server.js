var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http);

app.get('/', function(req, res){
  res.sendFile(__dirname + '/index.html');
});

io.on('connection', function(socket){
  // แจ้งเตือนสั่งยาด่วน
    socket.on('med_express', function(msg){
      io.emit('med_express', msg);
    });


    socket.on('create_guestbook', function() {
      io.emit('replace_guestbook')
      io.emit('replace_unread_counter')
  })

  
  });

http.listen(3000, function(){
  console.log('listening on *:3000');
});