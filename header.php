
<style>
            .img-logoi{
                width: 100px;
                height: 100px;
                margin-left: 30px;
            }
            .header{
                display: flex;
                justify-content: space-between;
                /* background: radial-gradient(circle, rgba(0,36,16,1) 0%, rgba(57,55,57,1) 0%, rgba(8,149,124,1) 57%); */


            }
            .con-btn{
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 40px;
                margin-right: 50px;
            }
            .update{
                width: 100%;
                background:  transparent;
                text-transform: uppercase;
                color: rgb(208, 204, 198);
                height: 30px;
                border-radius: 10px;
                border: 0;
                font-size: 20px;
                font-weight: 600;
                outline: 0;
                cursor: pointer;
                transition: transform 0.2s ease;
                padding: 5px;
            }
            .logout{
                width: 100%;
                background:  transparent;
                text-transform: uppercase;
                color: rgb(208, 204, 198);
                height: 30px;
                border-radius: 10px;
                border: 0;
                font-size: 20px;
                font-weight: 600;
                outline: 0;
                cursor: pointer;
                transition: transform 0.2s ease;
                padding: 5px;
            }
            .about{
                width: 100%;
                background:  transparent;
                text-transform: uppercase;
                height: 30px;
                border-radius: 10px;
                border: 0;
                font-size: 20px;
                font-weight: 600;
                outline: 0;
                cursor: pointer;
                transition: transform 0.2s ease;
                padding: 5px;
                color: rgb(208, 204, 198);
            }
            .services{
                width: 100%;
                background:  transparent;
                text-transform: uppercase;
                color: rgb(208, 204, 198);
                height: 30px;
                border-radius: 10px;
                border: 0;
                font-size: 20px;
                font-weight: 600;
                outline: 0;
                cursor: pointer;
                transition: transform 0.2s ease;
                padding: 5px;
            }
            .home{
                width: 100%;
                background:  transparent;
                text-transform: uppercase;
                color: rgb(208, 204, 198);
                height: 30px;
                border-radius: 10px;
                border: 0;
                font-size: 20px;
                font-weight: 600;
                outline: 0;
                cursor: pointer;
                transition: transform 0.2s ease;
                padding: 5px;
            }
            .con-btn button:hover {
                transform: scale(1.1);
            }
            .btn3 input:hover {
                transform: scale(1.1);
            }
        </style>
<div class="header">
    <div class="logo">
        <img src="logo.png" alt=""  class="img-logoi">
    </div>
    <div class="con-btn">
        <?php if( strpos( $_SERVER['REQUEST_URI'], 'Services') != false ) { ?>
            <div class="btn1">
            <button  class="home" onclick="home()" id="home" >Home</button>
        </div>
        <?php } else { ?>
        <div class="btn1">
            <button  class="services" onclick="services()" id="services" >Services</button>
        </div>
        <?php } ?>
        <div class="btn">
            <button class="update" onclick="update()">Update</button>
        </div>
        <div class="btn2">
            <button name="logout" onclick="logOut()" class="logout">Logout</button>
        </div>
        <div class="btn3">
            <input type="hidden" Value="<?php echo $_SESSION['user']['id'] ?>"  name="user_id">
            <button name="about" onclick="about()" class="about">about</button>    
        </div>
    </div>
</div>

<script>

    function home() {
        window.location.href = "http://localhost/php/project/1st-home.php"
    };
    function services() {
        window.location.href = "http://localhost/php/project/Services-html.php"
    }
    function update() {
        window.location.href = "http://localhost/php/project/1st-update.php"
    }
    function logOut() {
        window.location.href = "http://localhost/php/project/1st-logout.php"
    }
    function about() {
        window.location.href = "http://localhost/php/project/1st-about.php"
    }
        

</script>
