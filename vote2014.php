<?php
header('Content-Type: text/html; charset=utf-8');
include("connect.php");
if($_GET['id']<=6 and $_GET['id']>=1){
    $getarea=$_GET['id']-1;
}else{
    $getarea=0;
}
$area=array("TC100000000","TC200000000","TC300000000","TC400000000","TC500000000","TC600000000");
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>拉拉拉拉拉拉拉開票歷程</title>
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }

            p {
                word-break:break-all
            }
        </style>
        <script src="plugin/jquery.min.js"></script>
        <script src="plugin/jquery.cookie.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
        <script src="assets/js/docs.min.js"></script>   
        <script type="text/javascript">

        </script>
        <!--<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js"></script>-->
    </head>
    <body>
        <div id="fb-root"></div>
        <script>
            var nIntervId;
            var URLs="http://api.vote2014.g0v.ronny.tw/api/data/<?php echo $area[$getarea];?>";
            var URL1="insert.php";
            var data=new Object;
            function insert(){
                $.ajax({
                    url: URL1,
                    type:"POST",
                    dataType:'json',
                    data:{vote:data},

                    success: function(msg){
                        console.log(msg);

                    },

                });


            }
            function check(){
                console.log(data);
                for(var key in data.rows){
                    
                    
                    if(data.rows[key].當選註記){
                        clearInterval(nIntervId);
                    }
                }
            }

            function getdata(){
                $.ajax({
                    url: URLs,
                    type:"get",
                    dataType:'json',

                    success: function(msg){
                        data=msg;
                        //delete data.rows[5].當選註記;
                        
                        if(msg.已送投開票所數>0){
                        $('#myTable >tbody').append('<tr><td>'+Date.now()+'</td><td>'+msg.rows[0].候選人得票數+'</td><td>'+msg.rows[1].候選人得票數+'</td><td>'+msg.rows[2].候選人得票數+'</td><td>'+msg.rows[3].候選人得票數+'</td><td>'+msg.rows[4].候選人得票數+'</td><td>'+msg.rows[5].候選人得票數+'</td><td>'+msg.rows[6].候選人得票數+'</td></tr>');
                        
                        
                            insert();
                        }
                        check();
                        
                    },

                });



            }

            //getdata();
            nIntervId=setInterval(function(){getdata()}, 1000*60);
            



        </script>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">拉拉拉拉拉拉拉開票歷程</a>
                </div>

            </div>
        </div>

        <div class="container">
            <br>
            <select onChange="location = this.options[this.selectedIndex].value;" class="form-control">
                <option value="vote2014.php?id=1" <?php if($getarea==0){echo "selected";}?>>台北市</option>
                <option value="vote2014.php?id=2" <?php if($getarea==1){echo "selected";}?>>新北市</option>
                <option value="vote2014.php?id=3" <?php if($getarea==2){echo "selected";}?>>桃園市</option>
                <option value="vote2014.php?id=4" <?php if($getarea==3){echo "selected";}?>>臺中市</option>
                <option value="vote2014.php?id=5" <?php if($getarea==4){echo "selected";}?>>臺南市</option>
                <option value="vote2014.php?id=6" <?php if($getarea==5){echo "selected";}?>>高雄市</option>
            </select>
            <br>
            <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>time</th><th>1號候選人</th><th>2號候選人</th><th>3號候選人</th><th>4號候選人</th><th>5號候選人</th><th>6號候選人</th><th>7號候選人</th>
                </tr>
                </thead>
                <tbody></tbody>

            </table> 
        </div>

    </body>
</html>
