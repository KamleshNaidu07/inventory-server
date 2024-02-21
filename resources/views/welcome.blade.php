<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <style>
        body {
            background: var(--background);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .creepster-regular {
            font-family: "Creepster", system-ui;
            font-weight: 400;
            font-style: normal;
            color: #ffffff
        }

        .creepster-regular span{
            color: red;
        }

        :root {
            --background: #00034b;
            --white: #ffffff;
            --grey: #dbdbdb;
            --pink: #ffbeff;
            --shadow: #000232;
        }

        .ghost {
            position: relative;
            width: 150px;
            height: 225px;
            background: var(--white);
            box-shadow: -17px 0px 0px var(--grey) inset, 0 0 50px #5939db;
            border-radius: 100px 100px 0 0;
            animation: float 2s infinite;
        }

        .ghost__eyes {
            display: flex;
            justify-content: space-around;
            margin: 0 auto;
            padding: 70px 0 0;
            width: 90px;
            height: 20px;
        }

        .ghost__eyes:before,
        .ghost__eyes:after {
            content: "";
            display: block;
            width: 15px;
            height: 25px;
            background: var(--background);
            border-radius: 50%;
        }

        .ghost__dimples {
            display: flex;
            justify-content: space-around;
            margin: 0 auto;
            padding: 35px 0 0;
            width: 130px;
            height: 20px;
        }

        .ghost__dimples:before,
        .ghost__dimples:after {
            content: "";
            display: block;
            width: 15px;
            height: 15px;
            background: var(--pink);
            border-radius: 50%;
        }

        .ghost__feet {
            width: 100%;
            position: absolute;
            bottom: -13px;
            display: flex;
            justify-content: space-between;
        }

        .ghost__feet-foot {
            width: 25%;
            height: 26px;
            border-radius: 50%;
            background: var(--white);

            &:last-child {
                background-image: linear-gradient(to right, var(--white) 55%, var(--grey) 45%);
            }
        }

        .shadow {
            background: var(--shadow);
            width: 150px;
            height: 40px;
            margin-top: 50px;
            border-radius: 50%;
            animation: shadow 2s infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        @keyframes shadow {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(0.9);
            }
        }
    </style>
</head>

<body>
    <div class="ghost">
        <div class="ghost__eyes"></div>
        <div class="ghost__dimples"></div>
        <div class="ghost__feet">
            <div class="ghost__feet-foot"></div>
            <div class="ghost__feet-foot"></div>
            <div class="ghost__feet-foot"></div>
            <div class="ghost__feet-foot"></div>
        </div>
    </div>
    <div class="shadow"></div>
    <div class="welcome-heading">
        <h1 class="creepster-regular">Welcome to my <span>inventory</span></h1>
    </div>
</body>

</html>
