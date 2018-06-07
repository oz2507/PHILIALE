<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

    <div id="loader">
        <div id="load_img">
            <img class="logo" src="../assets/img/philia_san.jpg" />
            <p>Now Loading....</p>
        </div>
    </div>

    <div id="container">
        <p></p>
    </div>

<style type="text/css">
    #loader{
        width: 100%;
        height: 100%;
        background: #D1D1D1;
        position: fixed;
        top: 0;
        left: 0;
    }
    #load_img{
        position: fixed;
        width: 150px;
        height: 100px;
        top: 20%;
        left: 40%;
        color: #2174B8;
        /*background:black;*/
    }
    .logo{
        width: 100px;
        height: 100px;
        animation: load 2s linear infinite;
    }
    #container{
        /*display: none;*/
        color: black;
        text-align: center;
        font-size: 50px;
    }

    @keyframes load{
        from{
            transform:rotate(0deg);
            }
        to{
            transform:rotate(360deg);
        }
    }
</style>

<script type="text/javascript">

    window.onload = function(){
        $(function(){
            setTimeout(function(){
                $('#loader').fadeOut(); $('#container').fadeIn();
            }, 3000);
        });
    }

</script>


</body>
</html>