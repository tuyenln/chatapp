<div id="data">
    @foreach ($chats as $chat)
    <p><strong>{{ $chat->author}} </strong>: {{ $chat->content }} </p>

    @endforeach
</div>

<form method="post" action="{{ route('chats.store') }}">
    @csrf
    Name: <input type="text" name="author" >
    <br />
    <br />
    Content: <textarea name="content" rows="5" style="width:100%"></textarea>
    <button name="send" type="submit">Send</button>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.js" integrity="sha512-q/dWJ3kcmjBLU4Qc47E4A9kTB4m3wuTY7vkFJDTZKjTs8jhyGQnaUrxa0Ytd0ssMZhbNua9hE+E7Qv1j+DyZwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var socket = io('http://localhost:6001')
    socket.on('demo_database_chat:message', function(data) {
        console.log('zzz');
        if ($('#'.data.id).length == 0) {
            $("#data").append('<p><strong>' + data.author+ '</strong>: '+data.content+'</p>');
        } else {
            console.log('Da co tin nhan');
        }
    })
</script>