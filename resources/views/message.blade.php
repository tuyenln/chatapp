<html>

    <head>Chat</head>
    <body>
        <div id="data">
            @foreach ($messages as $message)
            <p id="{{$message->id}}"><strong>{{ $message->author }} </strong>: {{ $message->content }}</p>
            @endforeach
        </div>

        <div>
            <form method="POST" action="send-message">
            @csrf
                Name: <input type="text" name="author" >
                <br />
                <br />
                Content: <textarea name="content" rows="5" style="width:100%"></textarea>
                <button name="send" type="submit">Send</button>
            </form>
        </div>
    </body>
</html>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.js"></script>

<script>
    var socket = io('http://localhost:6002')
    socket.on('laravel_database_chat:message', function(data) {
        // console.log(data)
        if ($('#'+data.id).length == 0) {
            $('#data').append('<p><strong>' + data.author + ' </strong>: '+data.content+'</p>');
        } else {
            console.log('Da co tin nhan')
        }

    })

</script>