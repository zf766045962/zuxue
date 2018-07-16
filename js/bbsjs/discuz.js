// 发帖提问
$j('.my_question').click(function(e){
    pop_ajax (1,1);
    showDialog(document.getElementById('question_dialog').innerHTML, 'info', '<p style="font-size:15px;">客服热线：400-788-3333</p>')
    e.preventDefault();

    $j('.question_tab').click(function(){
        if($j(this).hasClass('act')){
            return false;
        }
        $j(this).addClass('act').siblings('a').removeClass('act')
        pop_ajax (1,$j(this).attr('dtype'));
    })
})

// 发帖提问 - ajax     
function pop_ajax (page,issolve) {  // 分页码 
    var formhash = $j('input[name="formhash"]').val()
    $j.post("/index_sale_block.php", { issolve: issolve, formhash: formhash, page : page },function(json){
        var popData = json.data;
        var li = '';

        for (var i = 0; i < popData.length; i++) {
            li += '<li><a href="'+popData[i]['url']+'">'+popData[i]['subject']+'</a></li>';
        }
        $j('.question_list ul').html(li);

        if (json.totalpage > 1){
            var page_list = '';
            for (var i = 1; i <= json.totalpage; i++) {
                var type = i == page ? 'act' : '';
                page_list += '<a class="'+type+'" num="'+i+'" href="javascript:;">'+i+'</a>';
            }
            $j('.question_page .pg').html(page_list)
        }else{
            $j('.question_page .pg').html('');
        }

        $j('.question_page .pg a').on('click',function(){  //分页
            pop_ajax ($j(this).attr('num'),$j('.question_tab.act').attr('dtype'))
        })
    }, "json");
}
