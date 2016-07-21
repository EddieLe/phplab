<html>
    <head>
        <script>
// /获取数据 
function getData(page){  
    $.ajax({ 
        type: 'POST', 
        url: 'pages.php', 
        data: {'pageNum':page-1}, 
        dataType:'json', 
        beforeSend:function(){ 
            $("#list ul").append("<li id='loading'>loading...</li>");//显示加载动画 
        }, 
        success:function(json){ 
            $("#list ul").empty();//清空数据区 
            total = json.total; //总记录数 
            pageSize = json.pageSize; //每页显示条数 
            curPage = page; //当前页 
            totalPage = json.totalPage; //总页数 
            var li = ""; 
            var list = json.list; 
            $.each(list,function(index,array){ //遍历json数据列 
                li += "<li><a href='#'><img src='"+array['pic']+"'>"+array['title'] 
                +"</a></li>"; 
            }); 
            $("#list ul").append(li); 
        }, 
        complete:function(){ //生成分页条 
            getPageBar(); 
        }, 
        error:function(){ 
            alert("数据加载失败"); 
        } 
    }); 
} 
        </script>
    </head>
    <body>
        <div id="list"> 
            <ul></ul> 
        </div> 
        <div id="pagecount"></div> 
    </body>
</html>

