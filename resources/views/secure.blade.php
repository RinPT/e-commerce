<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body style="background: #e6e6e6;text-align:center">

<div class="redirect-box">
    <div style="border: 1px solid #bfbfbf;display: inline-block;padding: 50px 100px;margin-top: 50px;">
        <h3>Redirecting...</h3>
        <form action="{{ route('order.complete') }}" method="post">
            @csrf
            <input type="hidden" name="ptype" value="{{ $ptype }}">
            <input type="hidden" name="delivery_id" value="{{ $delivery_id }}">
            <input type="hidden" name="billing_id" value="{{ $billing_id }}">
            <input type="hidden" name="status" value="paid">
            <button type="submit" style="
    background: black;
    display: block;
    text-decoration: none;
    color: white;
    outline: 0;
    border: 0;
    padding: 20px;
    font-weight: bold;
    cursor: pointer;
">
                Place Order
            </button>
        </form>
    </div>
</div>
</body>
</html>
