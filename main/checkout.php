<html>
    <head>
        <title>Checkout</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
        <script type="text/javascript">
            function suggest(inputString) {
                if (inputString.length == 0) {
                    $('#suggestions').fadeOut();
                } else {
                    $('#cname').addClass('load');
                    $.post("autosuggestname.php", {queryString: "" + inputString + ""}, function (data) {
                        if (data.length > 0) {
                            $('#suggestions').fadeIn();
                            $('#suggestionsList').html(data);
                            $('#cname').removeClass('load');
                        }
                    });
                }
            }

            function fill(thisValue) {
                $('#cname').val(thisValue.split(";")[0]);
                $('#mobile').val(thisValue.split(";")[1]);
                setTimeout("$('#suggestions').fadeOut();", 600);
            }
            $(function () {
                $("#savecheckout").click(function (event) {
                    event.preventDefault();
                    var sp = $("input[name='amount']").val().replace(",", "");//buying price
                    var mpesa = $("input[name='mpesa']").val();
                    var cash = $("input[name='cash']").val();

                    var bp = Number(mpesa) + Number(cash); //selling price

                    if (Number(sp) > Number(bp)) {
                        alert("Amount cannot be less than the cost of product");
                        return false;
                    }
                    if ($('#ptype').val() === "Payment Method") {
                        alert("Please select a valid payment method");
                        return false;
                    }
                    if ($("#ptype").val() === "Credit" && $("#orderno").val().length === 0) {
                        alert("Please input order number");
                        return false;
                    }
                    if ($("#ptype").val() === "Mpesa" && $("#mpesaref").val().length === 0) {
                        alert("Please input mpesa ref number");
                        return false;
                    }
                    if ($("#ptype").val() === "MPCash" && $("#mpesaref").val().length === 0) {
                        alert("Please input mpesa ref number");
                        return false;
                    }
                    if ($("#ptype").val() === "MPCash" && $("#mpesa").val().length === 0) {
                        alert("Please input mpesa amount");
                        return false;
                    }
                    var info = 'productid=' + $("input[name='invoice']").val() + '&qty=1&type=duplicatesales';
                    $.ajax({
                        type: "GET",
                        url: "confirmqty.php",
                        data: info,
                        success: function (mydata) {
                            if (mydata.length > 1) {
                                alert("Duplicate transaction detected. Failed to save.Recheck reports: " + $("input[name='invoice']").val());
                                return false;
                            } else {
                                $("#addsavecheckout").submit();
                            }
                        }
                    });
                });
            });
            $(function () {
                $("#ptype").change(function () {
                    if ($("#ptype").val() === "Cash") {
                        $("#mpesaref").css("display", "none");
                        $("#mpesa").css("display", "none");
                        $("#orderno").css("display", "none");
                    }

                    if ($("#ptype").val() === "Mpesa") {
                        $("#mpesaref").css("display", "block");
                        $("#mpesa").css("display", "none");
                        $("#orderno").css("display", "none");
                    }

                    if ($("#ptype").val() === "MPCash") {
                        $("#mpesaref").css("display", "block");
                        $("#mpesa").css("display", "block");
                        $("#orderno").css("display", "none");
                    }

                    if ($("#ptype").val() === "Credit") {
                        $("#orderno").css("display", "block");
                        $("#mpesa").css("display", "none");
                        $("#mpesaref").css("display", "none");
                    }
                });
            });

        </script>

        <style>
            #result {
                height:20px;
                font-size:16px;
                font-family:Arial, Helvetica, sans-serif;
                color:#333;
                padding:5px;
                margin-bottom:10px;
                background-color:#FFFF99;
            }
            #country{
                border: 1px solid #999;
                background: #EEEEEE;
                padding: 5px 10px;
                box-shadow:0 1px 2px #ddd;
                -moz-box-shadow:0 1px 2px #ddd;
                -webkit-box-shadow:0 1px 2px #ddd;
            }
            .suggestionsBox {
                position: absolute;
                left: 10px;
                margin: 0;
                width: 268px;
                top: 40px;
                padding:0px;
                background-color: #000;
                color: #fff;
            }
            .suggestionList {
                margin: 0px;
                padding: 0px;
            }
            .suggestionList ul li {
                list-style:none;
                margin: 0px;
                padding: 6px;
                border-bottom:1px dotted #666;
                cursor: pointer;
            }
            .suggestionList ul li:hover {
                background-color: #FC3;
                color:#000;
            }
            ul {
                font-family:Arial, Helvetica, sans-serif;
                font-size:11px;
                color:#FFF;
                padding:0;
                margin:0;
            }

            .load{
                background-image:url(loader.gif);
                background-position:right;
                background-repeat:no-repeat;
            }

            #suggest {
                position:relative;
            }
            .combopopup{
                padding:3px;
                width:268px;
                border:1px #CCC solid;
            }

        </style>	
    </head>
    <body onLoad="document.getElementById('country').focus();">
        <form action="savesales.php" id="addsavecheckout" method="post">
            <div id="ac">
                <center><h4><i class="icon icon-money icon-large"></i> Cash</h4></center><hr>
                <input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
                <input type="hidden" name="invoice" id="invoice" value="<?php echo $_GET['invoice']; ?>" />
                <input type="hidden" name="amount" value="<?php echo $_GET['total']; ?>" />
                <input type="hidden" name="cashier" value="<?php echo $_GET['cashier']; ?>" />
                <center>
                    <input type="text" size="25" value="Customer" name="cname" id="cname" onkeyup="suggest(this.value);" onblur="fill();" class="" autocomplete="off" placeholder="Enter Customer Name" style="width: 268px; height:30px;" />
                    <input type="text" size="25" value="0726328253" name="mobile" id="mobile"  autocomplete="off" placeholder="Enter Customer Mobile" style="width: 268px; height:30px;" />
                    <div class="suggestionsBox" id="suggestions" style="display: none;">
                        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
                    </div>
                    <select name="ptype" id="ptype" style="width: 290px; height:40px;  margin-bottom: 15px;" required>
                        <option value="Cash" selected>Cash</option>
                        <option value="MPCash">Mpesa & Cash</option>
                        <option value="Mpesa">Mpesa</option>
                        <option value="Credit">Credit</option>
                    </select>
                    <input type="text" size="25" value="" name="mpesaref" id="mpesaref"  class="" autocomplete="off" placeholder="Enter Mpesa Reference" style="width: 268px; height:30px;display: none" />
                    <input type="text" size="25" value="" name="orderno" id="orderno"  class="" autocomplete="off" placeholder="Enter Order Number" style="width: 268px; height:30px;display: none" />
                    <input type="number" name="cash" id="cash" placeholder="Amount" value="<?php echo round($_GET['total'], 0); ?>" style="width: 275px; height:30px;  margin-bottom: 15px;"  required/><br>
                    <input type="number" name="mpesa" id="mpesa" placeholder="Mpesa Amount" style="width: 275px; height:30px;  margin-bottom: 15px;display: none"/><br>
                    <button class="btn btn-success btn-block btn-large" style="width:267px;" id="savecheckout"><i class="icon icon-save icon-large"></i> Save</button>
                </center>
            </div>
        </form>
    </body>
</html>