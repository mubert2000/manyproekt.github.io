function login2() {
        var login = $('#login').val();
        var password = $('#password').val();
        var params = "login=" + login + "&password=" + password;
        $.ajax({
            type: "POST",
            url: "ajax/login.php",
            data: params,
            beforeSend: function() {
                document.getElementById('btn_26').innerHTML = "<img src='tpl/img/load.gif'/>";
            },
            success: function(data) {
                if (data == '1') {
                    window.location.href = "account.php";
                } else {
                    $('#result4526').html(data).fadeIn("slow");
                    document.getElementById('btn_26').innerHTML = '<input type="button" onclick="login2()" value="Войти" class="baton" />';
                }
            }
        });
    }
    /////////////////////////////////////////////////////////////
function registration() {
    var login = $('#login_r').val();
    var password1 = $('#password1').val();
    var password2 = $('#password2').val();
    var email = $('#email_r').val();
    var perfect = $('#perfect_r').val();
    var referal = $('#referal_r').val();
    if (checkbox1.checked) {
        var che = 1;
    } else {
        var che = 0;
    };
    var params = {
        login: login,
        pas: password1,
        pass: password2,
        email: email,
        perfect: perfect,
        referal: referal,
        che: che
    };
    $.ajax({
        type: "POST",
        url: "ajax/registration.php",
        data: params,
        beforeSend: function() {
            document.getElementById('btn_').innerHTML = "<img src='tpl/img/load.gif'/>";
        },
        success: function(data) {
            if (data == '1') {
                window.location.href = "account.php";
                document.getElementById('ddfssaewew').style.display = "none";
                document.getElementById('rega_okkk').style.display = "block";
            }
            $('#result45').html(data).fadeIn("slow");
            document.getElementById('btn_').innerHTML = '<input type="button" onclick="registration()" value="РЕГИСТРАЦИЯ" class="baton mr" />';
        }
    });
}

///////////////////////
function foggot() {
        var login = $('#login_f').val();
        var em = $('#email_f').val();
        var params = {
            login: login,
            em: em
        };
        $.ajax({
            type: "POST",
            url: "ajax/foggot.php",
            data: params,
            beforeSend: function() {
                document.getElementById('btn_25').innerHTML = "<div style=\"padding-top:10px;\"><img src='tpl/img/load.gif'/></div>";
            },
            success: function(data) {
                if (data == '1') {
                    document.getElementById('dfd4354').style.display = "none";
                    document.getElementById('rega_okkk22').style.display = "block";
                } else {
                    $('#result4525').html(data).fadeIn("slow");
                    document.getElementById('btn_25').innerHTML = '<input onclick="foggot()" type="button" value="Восстановить" class="baton" />';
                }
            }
        });
    }
    ////////////////////////////
function smena_opis() {
        var pd = $('#tip').val();
        document.getElementById('bla').value = pd;
        document.getElementById('banner45').value = '';
        document.getElementById('img_c').innerHTML = '';
        document.getElementById('ortersd').value = '';
        document.getElementById('FileInput').value = '';
        if (pd == '3') {
            document.getElementById('fgrt568').style.display = 'block';
            document.getElementById('fgrt56').style.display = 'none';
        }
        if (pd == '1' || pd == '2') {
            document.getElementById('fgrt568').style.display = 'none';
            document.getElementById('fgrt56').style.display = 'block';
        }
    }
    /////////////////////////
function otpravka() {
        var summ = $('#summ').val();
        var tar = $('input[name=cher]:checked').val();
        var sys = $('#sestr').val();

        var params = {
            summ: summ,
            tar: tar,
            sys: sys
        };
        $.ajax({
            type: "POST",
            url: "ajax/vvod.php",
            data: params,
            beforeSend: function() {
                document.getElementById('dfdsftrrf').innerHTML = "<div style=\"padding-top:30px;padding-left:50px;float:left;\"><center><img src='tpl/img/load.gif'/></center></div>";
            },
            success: function(data) {
                $('#sfdrgy656hf').html(data).fadeIn("slow");
                document.getElementById('dfdsftrrf').innerHTML = '<input class="but" value="Сделать вклад" onclick="otpravka()" type="button" />';
                document.forms["dfert78"].submit();
            }
        });
    }
    ///////////////////////
function fgrd(sys) {
        if (sys == '1') {
            document.getElementById('fgrt56').innerHTML = "<img src='images/perfect.png' width=\"40px\"/>";
            document.getElementById('fgrt561').innerHTML = "<img src='images/payeer_n.png' width=\"40px\"/>";
            document.getElementById('sestr').value = '1';
        } else {
            document.getElementById('fgrt56').innerHTML = "<img src='images/perfect_n.png' width=\"40px\"/>";
            document.getElementById('fgrt561').innerHTML = "<img src='images/payeer.png' width=\"40px\"/>";
            document.getElementById('sestr').value = '2';
        }
    }
    ///////////////////////////////////////
function editinfo() {
    var payeer = $('#payeer_i').val();
    var perfect = $('#perfect_i').val();
    var pas = $('#pas').val();
    var pass = $('#pass').val();
    var old = $('#pas_old').val();
    var params = {
        payeer: payeer,
        perfect: perfect,
        pas: pas,
        pass: pass,
        old: old
    };
    $.ajax({
        type: "POST",
        url: "ajax/edit.php",
        data: params,
        beforeSend: function() {
            document.getElementById('btn_123').innerHTML = "<img src='tpl/img/load.gif'/>";
            document.getElementById('btn_1234').innerHTML = "<img src='tpl/img/load.gif'/>";
        },
        success: function(data) {
            $('#reserult4545677').html(data).fadeIn("slow");
            document.getElementById('btn_123').innerHTML = '<input type="button" onclick="editinfo()" class="baton" value="Сохранить">';
            document.getElementById('btn_1234').innerHTML = '<input type="button" onclick="editinfo()" class="baton" value="Сохранить">';
        }
    });
}

///////////////////////
function rew125() {
    var name = $('#dfg566').val();
    var mes = $('#fgtyhtyh').val();
    var params = {
        name: name,
        mes: mes
    };
    $.ajax({
        type: "POST",
        url: "ajax/otz.php",
        data: params,
        beforeSend: function() {
            document.getElementById('dsfdsf4556').innerHTML = "<div class=\"buttonSendComments\"><img src='tpl/img/load.gif'/></div>";
        },
        success: function(data) {
            document.getElementById('dsfdsf4556').innerHTML = '<a href = "javascript:void(0)" onclick="rew125()" class = "buttonSendComments">Отправить</a>';
            if (data == '1') {
                $().toastmessage('showSuccessToast', "Отзыв успешно помещен на модерацию");
                document.getElementById("fgtyhtyh").value = '';
            } else {
                $('#res1dfr78').html(data).fadeIn("slow");
            }
        }
    });
};

/////////////////////////

function vavod() {
    var kol = $('#vvod_kol1').val();
    var mes = $('#sestr').val();
    var params = {
        kol: kol,
        mes: mes
    };
    $.ajax({
        type: "POST",
        url: "ajax/vavod.php",
        data: params,
        beforeSend: function() {
            document.getElementById('dsfdsf451').innerHTML = "<div style=\"padding-top:30px;padding-left:50px;float:left;\"><center><img src='tpl/img/load.gif'/></center></div>";
        },
        success: function(data) {
            document.getElementById('dsfdsf451').innerHTML = '<input class="but" onclick="vavod()" value="Вывести" type="button" />';
            $('#res1dfr78').html(data).fadeIn("slow");
        }
    });
};

function selchange(selform) {
    var ru = document.getElementById('sel').value;
    if (ru != '0') {
        $("#otvet").css({
            'display': 'block'
        });
    } else {
        $("#otvet").css({
            'display': 'none'
        });
    }
}


function showOrHide() {
    var cb = document.getElementById('cat');
    var dis = document.getElementById('dis');
    (cb.checked) ? dis.disabled = false: dis.disabled = true;
}

function duda() {
    document.getElementById('dis').disabled = true;
    //Получаем параметры

    var u_login = $("#u_login").val()

    var u_qiwi = $("#u_qiwi").val()
    var u_kosh = $("#u_kosh").val()
    var ref = $("#ref").val()
    var mail = $("#u_mail").val()


    // Отсылаем паметры
    $.ajax({
        type: "POST",
        url: "/ajax/reg.php",
        data: "u_login=" + u_login + "&u_qiwi=" + u_qiwi + "&u_kosh=" + u_kosh + "&ref=" + ref + "&mail=" + mail,
        beforeSend: function() {
            $("#result").append('<img style=" vertical-align: middle;" src="/images/loading.gif" width=49 height=50 border=0">');
        },
        success: function(result) {

            $("#result").empty();
            $('#result').fadeIn(2000).html(result);
            //$("#result").fadeOut(2000);
            document.getElementById('dis').disabled = false;


        }
    });
}

jQuery(document).ready(function() {
    jQuery('#calc_sum').keyup(function() {
        jQuery('#calc_btn')
            .click();
    });
    jQuery('#add_plan').change(function() {
        jQuery('#calc_btn').click();
    });
});

function round2(z) {
    z = (1 * z).toFixed(2);
    return 1 * z;
}

function recalc() {
    var sum = $('#calc_sum').attr('value'),
        plans = [
            ['1 - 0%', 0, 49.999999, 0.0000],
            ['2 - 50%', 50.000000, 15000.000000, 50],
            
        ],
        pd;
    for (var p in plans) {
        if ((sum >= plans[p][1]) && (sum <= plans[p][2])) {
            pd = plans[p][3];
            break;
        }
    }
    $('.calc #prib2').text(((pd*sum/100)+sum*1));
    $('.calc #profit').text(pd);
    return false;
}


// function recalc() {
//     var sum = round2(document.forms['calc']['sum'].value);
//     if (sum <= 0) sum = 0;
//     var prib = 0;
//     var cmpd = document.forms['calc']['cmpd'];
//     if (cmpd == undefined) {
//         cmpd = 0;
//     } else {
//         cmpd = cmpd.value;
//     }
//     document.getElementById('cmpd').innerHTML = cmpd;
//     var days = document.forms['calc']['days'];
//     if (days == undefined) {
//         days = 0;
//     } else {
//         days = days.value;
//     }
//     var plans = [
//         ['1 - 25%', 0.000001, 9999.999999, 10.00, 1.500000, 10, 0.00, 1.500000],
//         ['2 - 100%', 10000.000000, 50000.000001, 100.00, 1.000000, 100, 0.00, 1.000000]
//     ];
//     var pn = '?';
//     var pd = '?';
//     var ip = '?';
//     var db = '?';
//     var dr = '?';
//     var dd = '?';
//     var p = document.forms['calc']['plan'];
//     if (p == undefined) {
//         for (var p in plans)
//             if ((sum >= plans[p][1]) & (sum < plans[p][2])) {
//                 pn = plans[p][0];
//                 pd = plans[p][3];
//                 ip = plans[p][4];
//                 db = plans[p][5];
//                 dr = plans[p][6];
//                 dd = plans[p][7];
//                 break;
//             }
//     } else {
//         p = p.value;
//         pn = plans[p][0];
//         pd = plans[p][3];
//         ip = plans[p][4];
//         db = plans[p][5];
//         dr = plans[p][6];
//         dd = plans[p][7];
//     }
//     if (pn != '?') {
//         if (ip == 0) {
//             ip = days;
//             dd = days;
//         }
//         sum = round2(sum + db * sum / 100);
//         zcomp = 0;
//         for (i = 0; i < ip; i++) {
//             profit = round2(pd * sum / 100);
//             csum = round2(cmpd * profit / 100);
//             zcomp = zcomp + csum;
//             prib = prib + profit - csum;
//             sum = sum + csum;
//         }
//         sum = round2(dr * (sum - zcomp) / 100);
//     }
//     document.getElementById('plan').innerHTML = pn;
//     document.getElementById('bonus').innerHTML = db;
//     document.getElementById('profit').innerHTML = pd;
//     document.getElementById('period').innerHTML = ip;
//     document.getElementById('days').innerHTML = dd;
//     document.getElementById('prib').innerHTML = round2(prib + zcomp);
//     document.getElementById('return').innerHTML = dr;
//     document.getElementById('prib2').innerHTML = round2(sum + prib + zcomp);
// }