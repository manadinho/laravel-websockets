<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    console.log('{{ csrf_token() }}')

    // var pusher = new Pusher('8cd5cf904f2cac714ddc', {
    //   cluster: 'ap2'
    // });

    var pusher = new Pusher('appkey', {
        auth:{
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            }
        },
        wsHost: window.location.hostname,
        wsPort: 6001,
        cluster: 'mt1'
    });

    console.log(pusher)

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>