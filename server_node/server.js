var io = require('socket.io')(6002)

console.log('Connected to port 6002')

io.on('error', function(socket){
    console.log('Error')
})

io.on('connection', function(socket){
    console.log('Co nguoi vua ket noi'+ socket.id)
})

var Redis = require('ioredis')
var redis = new Redis(1000)
redis.psubscribe("*" , function (error, count) {

})

redis.on('pmessage', function(partner, channel, message) {
    console.log(channel)
    console.log(message)
    console.log(partner)

    message = JSON.parse(message)
    io.emit(channel+ ":" + message.event, message.data.message)
    console.log('Sent')
})