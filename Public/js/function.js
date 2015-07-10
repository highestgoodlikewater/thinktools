// JavaScript 文档
function install_submit(url) {//安装数据的提交
    var s = 1;
    $('#install_form .i_input').each(function () {
        var v = $(this).val();
        if (!v) {
            $(this).css('border', '#cc0000 1px solid');
            s = 0;
        } else {
            $(this).css('border', '#ccc 1px solid');
        }
    });//检测数据是否为空

    if ($('#password').val() != $('#re_password').val()) {
        s = 0;
        $('#password').css('border', '#cc0000 1px solid');
        $('#re_password').css('border', '#cc0000 1px solid');
    }//检测密码是否一致
    if (s == 1) {
        $.getJSON(url, {'db_url': $('#db_url').val(), 'db_user': $('#db_user').val(), 'db_pass': $('#db_pass').val(), 'db_database': $('#db_database').val()},
        function(data){            
            if(data.status == 1){                
                art.dialog({time:3000,content:data.msg});                
            }else{
                $('#install_form').submit();
            }
        });
    }//检测数据库链接设置是否正确
}
function set_submit() {//设置
    var s = 1;
    $('#set_form .i_input').each(function () {
        var v = $(this).val();
        if (!v) {
            $(this).css('border', '#cc0000 1px solid');
            s = 0;
        } else {
            $(this).css('border', '#ccc 1px solid');
        }
    });
    if (s == 1) {
        if (isNaN($('#get_time').val().parseInt)) {
            $('#get_time').css('border', '#ccc 1px solid');
        } else {
            $('#get_time').css('border', '#cc0000 1px solid');
            s = 0;
        }
        if (isNaN($('#time_limit').val().parseInt)) {
            $('#time_limit').css('border', '#ccc 1px solid');
        } else {
            $('#time_limit').css('border', '#cc0000 1px solid');
            s = 0;
        }
        if (isNaN($('#file_num').val().parseInt)) {
            $('#get_time').css('border', '#ccc 1px solid');
        } else {
            $('#file_num').css('border', '#cc0000 1px solid');
            s = 0;
        }
        if (isNaN($('#ok').val().parseInt)) {
            $('#ok').css('border', '#ccc 1px solid');
        } else {
            $('#ok').css('border', '#cc0000 1px solid');
            s = 0;
        }
        if (isNaN($('#js_time').val().parseInt)) {
            $('#js_time').css('border', '#ccc 1px solid');
        } else {
            $('#js_time').css('border', '#cc0000 1px solid');
            s = 0;
        }
    }
    if (s == 1) {
        $('#set_submit').submit();
    }
}

function ids(u) {
    var ids = '';//对选中的id的规则进行读取
    $('.ids:checked').each(function () {
        if (ids) {
            ids += ',' + $(this).val();
        } else {
            ids = $(this).val();
        }
    });
    if (ids) {
        window.open('preg_go.php?ids=' + ids + '&u=' + u);
    }
}

function del_data(o) {
    var ids = '';//对选中的id的规则进行读取
    $('.ids:checked').each(function () {
        if (ids) {
            ids += ',' + $(this).val();
        } else {
            ids = $(this).val();
        }
    });
    if (ids) {
        o.load('ac.php?ac=data_ids_del&ids=' + ids);
    }
}

function check_tel(string) {//检查是否是电话号码
    var i = 0;
    for (i = 0; i < string.length; i++) {
        if ((string.charAt(i) < '0' || string.charAt(i) > '9') && (string.charAt(i) != '-') && (string.charAt(i) != '+') && (string.charAt(i) != ',') && (string.charAt(i) != '(') && (string.charAt(i) != ')') && (string.charAt(i) != '\s')) {
            return true;
        }
    }
    return false;
}


function login() {//登录
    var u = $('#username');
    var p = $('#password');
    if (is_empty(u) && is_empty(p) && check_str(u) && check_str(p)) {
        $('#login').submit();
    }
}

function check_str(o) {//检查非法字符
    var pat = new RegExp("[^a-zA-Z0-9\_\u4e00-\u9fa5]", "i");
    if (pat.test(o.val()) == true)
    {
        o.css('border', '#cc0000 1px solid');
        return false;
    } else {
        o.css('border', '#cccccc 1px solid');
        return true;
    }
}

function is_empty(o) {//检查是否是空值
    if (o.val()) {
        o.css('border', '#cccccc 1px solid');
        return true;
    } else {
        o.css('border', '#cc0000 1px solid');
        return false;
    }
}

function ck(o) {//全部选择数据
    if (o.val() == '全部选择') {
        $('.ids').attr('checked', 'checked');
        o.val('全部取消');
    } else {
        $('.ids').attr('checked', '');
        o.val('全部选择');
    }
}

function preg_add() {//新建规则
    var t = is_empty($('#title'));
    var c = is_empty($('#class'));
    if (t && c && $('#list_url').val() != 'http://') {
        $('#preg_add').attr('action', 'ac.php?ac=preg_save');
        $('#preg_add').attr('target', '_self');
        $('#preg_add').submit();
    }
}

function preg_test() {//测试规则
    var t = is_empty($('#title'));
    var c = is_empty($('#class'));
    if (t && c && $('#list_url').val() != 'http://') {
        $('#preg_add').attr('action', 'preg_test.php?ac=test');
        $('#preg_add').attr('target', '_blank');
        $('#preg_add').submit();
    }
}


function preg_copy(id) {//复制规则
    window.open('ac.php?ac=preg_copy&id=' + id);
}


function  preg_shell(id) {//共享规则
    var t = is_empty($('#title'));
    var c = is_empty($('#class'));
    if (t && c && $('#list_url').val() != 'http://') {
        $('#preg_add').attr('action', 'http://open.zjhn.com/thief/ac.php?ac=preg_upload');
        $('#preg_add').submit();
    }
}



function preg_go(d, js) {
    if (!js) {
        js = 60;
    }
    js = js * 1000;
    $.each(d, function (i, n) {
        var t = js * i;
        setTimeout("item_go(" + n + ")", t)
    });
}

function item_go(id) {
    $('#preg_read').prepend('<div id="item_' + id + '"><img src="image/loading.gif">正在获取数据，请稍候</div>');
    $('#item_' + id).load('ac.php?t=1&ac=preg_get&id=' + id);
}