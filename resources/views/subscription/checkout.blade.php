<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SkillSwap</title>
    @paddleJS
</head>
<body>
<script type="text/javascript">
    Paddle.Environment.set('sandbox');
    var sellerId = {{env('PADDLE_VENDOR_ID')}}
    Paddle.Setup({"seller": sellerId});
</script>
<script>
    Paddle.Checkout.open({
        settings: {
            displayMode: "overlay",
            theme: "light",
            successUrl: "{!! route('subscription.success',['payment_method'=>1]) !!}"
        },
        transactionId: "{{ $id }}"
    });
</script>
</body>
</html>
