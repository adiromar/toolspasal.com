<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Sastoshowroom Order</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="icon" href="{{ asset('image/favicon.jpg') }}" alt="SS">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .columns{
        padding-top: 65px;
    }
    .column{
        height: auto;width: 592px;background-color: rgb(255, 255, 255);
        box-shadow: rgba(50, 50, 50, 0.74) 1px 0px 11px 0px;
        border-radius: 3px;    padding-bottom: 50px;

    }
    .text-center{
        text-align: center; 
    }
    .center {
    margin: auto;width: 590px
    }
    .column-row1{
        padding-top: 10px;
    }
    .column-row2 p{
            font-family: "Abril Fatface";
    font-size: 25px;
    font-weight: normal;
    text-align: center;
    line-height: 32px;
    letter-spacing: 0px;
    color: rgb(59, 59, 59);
    font-style: normal;
    text-decoration: none;margin-top: 55px;
    }
    .column-row3{
        padding: 0px 48px;
    }
    .column-row3 textarea{
        height: 65px !important;
    }
    .column-row3 #form-name , .column-row3 #form-address , .column-row3 input[type='number'], .column-row3 textarea{
    color: rgb(0, 0, 0);
    font-weight: normal;
    font-size: 15px;
    font-style: normal;
    letter-spacing: 0px;
    width: 100%;
    border: none;
    border-bottom: 1px solid lightgrey;height: 36px;
    padding-left: 5px;
    }
    .column-row3 #form-address , .column-row3 input[type='number']{
        margin-top: 20px;
    }
    .column-row3 textarea{
        margin-top: 25px
    }
    .column-row3 #form-name::placeholder , .column-row3 #form-address::placeholder , .column-row3 input[type='number']::placeholder, .column-row3 textarea::placeholder{
        font-weight: normal;color: black;font-family: "Arial"
    }
    .column-row3 input[type='text']:focus, .column-row3 input[type='number']:focus , .column-row3 textarea:focus{
        outline: none;
    }
    .column-row3 p{
        font-family: lato;
    font-size: 16px;
    font-weight: normal;
    text-align: left;
    line-height: 32px;
    letter-spacing: 0px;
    color: rgb(79, 79, 79);
    font-style: normal;
    text-decoration: none;
    }
    .column-row3 input[type="submit"]{
        background-color: rgb(221, 75, 57);
    color: rgb(255, 255, 255);
    font-weight: bold;
    font-size: 22px;
    font-style: normal;
    line-height: 28px;
    letter-spacing: 0px;
    margin: 0px;
    width: 100%;
    float: none;
    border-style: solid;
    border-width: 0px;
    border-radius: 3px;
    border-color: rgba(0, 0, 0, 0);    margin-top: 12px;
    margin-bottom: 12px;padding-top: 12px;padding-bottom: 12px;
    }
</style>
</head>
<body style="background-image: url(https://s3-us-west-2.amazonaws.com/formget/upload/bg_img/default.jpg) !important;padding-bottom: 50px;">
    
    <div class="columns">
        <div class="column center">
            <div class="column-row1 text-center">
                <a href="https://www.sastoshowroom.com" target="_blank">
                    <img src="https://www.sastoshowroom.com/image/logoname.png" class="mt-2" alt="Sastoshowroom.com" height="35">
                </a>    
            </div>
            <div class="column-row2 text-center">
                <p>समान अर्डर गर्न तलको फर्म भर्नुहोस</p>
            </div>
            <div class="column-row3">
                <form action="{{ route('boost.order.store') }}" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="name" id="form-name" placeholder="Name" required>
                    <input type="number" name="mobile" placeholder="Mobile Number" required>
                    <input type="text" name="delivery_address" id="form-address" placeholder="Delivery address" required>
                    <textarea name="message" placeholder="Message"></textarea>
                    <p>हजुरको अर्डर  २४ घण्टा भित्र फ्री होम डेलिभरी हुनेछ</p>
                    <input type="submit" value="Send Message">
                </form>
            </div>
            
            
        </div>
    </div>
    
    <script>
        @if (Session::has('success'))
                toastr.success('{{ Session::get("success") }}');
        @endif
    </script>
    
    </body>
</html>