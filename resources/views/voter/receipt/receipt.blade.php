<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt - {{ auth()->user()->election->election }}</title>

    <style>
        /*
 * Reference - https://codepen.io/mmadeira/pen/wWzrwd
 */

        /* basic */
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font: 16px/1.2 "Roboto", sans-serif;
            color: #000000;
        }

        /* container */
        .container {
            width: 320px;
            height: auto;
            border-radius: 5px;
            background-color: white;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            border: #333 solid 1px;
        }

        /* receipt_box */
        .receipt_box>* {
            padding: 16px 32px;
        }

        /* head */
        .head {
            display: flex;
            align-items: center;
        }

        .head .logo {
            flex: 1 0 30%;
            text-align: center;
            /* padding-top: 20px */
        }

        .head .number {
            flex: 1 0 70%;
            color: slategray;
            font-size: 19px;
            line-height: 1.6;
        }

        /* body */
        .body .info {
            /* margin-bottom: 14px; */
            position: relative;
        }

        .vote-info {
            font-size: 12px;
        }


        .body .info .welcome .username {
            color: chocolate;
        }

        .body .info p {
            color: rosybrown;
            font-size: 14px;
        }

        .cart .title {
            margin-bottom: 16px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            text-transform: capitalize;
        }

        .cart .content {
            font-size: 14px;
        }



        /* foot */
        .foot {
            border-top: 2px dotted rgb(0, 0, 0);
            position: relative;
        }

        .foot:before,
        .foot:after {
            border: 4px solid transparent;
            position: absolute;
            top: -5px;
        }

        .foot:before {
            content: "";
            display: block;
            border-left: 7px solid black;
            left: -1px;
        }

        .foot:after {
            content: "";
            display: block;
            border-right: 7px solid black;
            right: -1px;
        }

        .foot img {
            width: 100%;
        }

        .text-center {
            text-align: center
        }
    </style>
</head>

<body>
    <!-- 	<div class="blog">Visit <a href="#" target="_blank">My Blog</a></div> -->
    <div class="container">
        <div class="receipt_box">
            <div class="head">
                <div class="logo">
                    <img style="width: 80px; height:80px;" src="{{ auth()->user()->election->logo }}" alt="">
                </div>

                <div class="number text-center">
                    <div class="date">{{ auth()->user()->election->election }}</div>
                    <div class="info text-center">
                        {{-- <div class="welcome">{{ auth()->user()->voter_id }}</div> --}}
                    </div>
                </div>

            </div>
            <div class="body">
                <div class="info text-center">
                    <div class="welcome"><span class="username">{{ auth()->user()->voter_id }}</span></div>
                </div>

                <div class="cart">
                    <div class="content  text-center">
                        <div class="cart_list  text-center">
                            <div class=" text-center">
                                <span class="name">You Voted on </span> <br>
                                <span class="price">{{ auth()->user()->voted_at->format('M d, Y g:i A') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="foot text-center">
                <img src={!! asset('receipts/' . $qr_code) !!}>
                {{-- <small class="text-center" style="font-size: 13px">{{ auth()->user()->election->ref }}</small> --}}
            </div>
        </div>
    </div>
</body>

</html>
