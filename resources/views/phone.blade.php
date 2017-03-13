<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>电话联系人</title>
<style type="text/css">
	.datalist {   
	  border: 1px solid #007eff;   
	  font-family: Arial;   
	  border-collapse: collapse;   
	}   
	.datalist th, .datalist td {   
	  border: 1px solid #429fff;   
	}   

	#retForm{width:640px;line-height:22px;padding-bottom:10px;border-bottom:1px dotted #ccc;}
	#retData{
	background:#efefef;
	padding:10px;
	line-height:18px;
	width: 96%;
	border: 0;
}
	.txtPartner{width:960px;margin:20px 10px;padding:10px 0 0 0;border-top:1px solid #dfdfdf;}
	.txtPartner h1{font-size:14px;color:#FF5632;}
	.txtPartner a{float:left;margin:0 10px 10px 0;}
    .logo {
	font-size: 18px;
	font-weight: bold;
	text-align: center;
	padding: 10px;
	font-family: "微软雅黑";
}
    .txtURL {
	font-size: 12px;
	padding: 10px;
}
</style>
 <script type="text/javascript" src="{{asset('/jquery.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('/laypage/laypage.js')}}"></script>
 <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
 <script type="text/javascript" src="{{asset('/address.js')}}"></script>
</head>
<body>
<input type="text" name="search_text" id="search_text" placeholder="请输入姓名搜索" @if($search_text != '') value="{{$search_text}} @endif"><button name="search_btn" id="search_btn" type="submit">搜索</button>
<span>
	<select name="pay_type" id="pay_type" onchange="pay()">
		<option value="6" @if($pay_type==6)selected="selected" @endif>全部</option>
		<option value="0" @if($pay_type==0)selected="selected" @endif>在线支付</option>
		<option value="1" @if($pay_type==1)selected="selected" @endif>快递支付</option>
	</select>
</span>
<div style="height:15px;"></div>
	<table class="datalist">
		<thead>
			<tr>
				<th width="40">选择</th>
				<th width="40">序号</th>
				<th width="40">姓名</th>
				<th width="60">手机</th>
				<th width="80">支付方式</th>
				<th width="80">发货状态</th>
			</tr>
		</thead>
		@foreach($data as $key=>$d)
		<tbody>
			<tr>
				<th width="40"><input type="checkbox" name="like[]"></th>
				<th width="40">{{$key+1}}</th>
				<th width="40">{{$d->username}}</th>
				<th width="60">{{$d->phone}}</th>
				<th width="120">
					@if($d->pay_type==0)
					在线支付
					@endif
					@if($d->pay_type==1)
					快递到付
					@endif
				</th>
				<th width="60">
					@if($d->is_send==0)
					未发
					@endif
					@if($d->is_send==1)
					已发
					@endif
				</th>
			</tr>
		</tbody>
		@endforeach
	</table>
	<div class="row cl" style="margin-top: 20px;float:left;" >
			<label class="form-label col-1 text-l" id="record">共 {{$page_count}} 页</label>
			<div class="formControls col-11  text-r" id="page" style="float:left;">
			</div>
	</div>
<div style="height:15px;"></div>
<br><br>
<script type="text/javascript">
	 $('button').on('click',function(){
            //判断
            switch ($(this).html()) {
                case '全选':
                    $('input').attr('checked',true);
                    break;
                case '全不选':
                    $('input').attr('checked',false);
                    break;
                case '反选':
                    //获取已经选中的。
                    var list = $('input:checked');
                    //设置全部选中。
                    $('input').attr('checked',true);
                    //将已经选中的修改成不选中。
                    list.attr('checked',false);
                    break;
            }
        });
</script>

<script type="text/javascript">
	// alert($);
	var search_btn = $('#search_btn');
	var search_text = $('#search_text');

	var pay_type = '';

	$(function(){
	if (parseInt("{{$page_count}}") > 0) {
		pay_type = $('#pay_type option:selected').val();
		laypage({
			cont: 'page',
			pages: '{{$page_count}}', //可以叫服务端把总页数放在某一个隐藏域，再获取。假设我们获取到的是18
			curr: function() { //通过url获取当前页，也可以同上（pages）方式获取
				var page = "{{$current_page}}";
				return page;
			}(),
			jump: function(e, first) { //触发分页后的回调
				if (!first) { //一定要加此判断，否则初始时会无限刷新
					location.href = GetUrlRelativePath() + '?search_text=' + search_text.val().trim() + '&pay_type=' + pay_type + '&current_page=' + e.curr;
				}
			}
		});
	}
});

	search_btn.click(function(){
		pay_type = $('#pay_type option:selected').val();
		location.href = GetUrlRelativePath() + '?search_text=' + search_text.val().trim()+ '&pay_type=' + pay_type;  //重定向到地址 带参数进行查询
	});
	function pay()
	{
		pay_type = $('#pay_type option:selected').val();
		location.href = GetUrlRelativePath() + '?search_text=' + search_text.val().trim() + '&pay_type=' + pay_type;
	}

	console.log(GetUrlRelativePath());
	function GetUrlRelativePath()
	{
		var url = document.location.toString(); //得出当前地址
		var arrUrl = url.split("//");  //以//为标识  分割为两个数组  [http:,haha.com/orm]

		var start = arrUrl[1].indexOf("/");  // 下标为1 的即为去除http头的 域名部分   indexOf('') 某个字符首次出现的位置  从0开始计数 / 在第8
		var relUrl = arrUrl[1].substring(start); //substring(n) 去除0-(n-1) 的字符串  


		if(relUrl.indexOf("?") != -1)
		{
			relUrl = relUrl.split("?")[0];  //去除参数
		}
		return relUrl;
	}  //得出地址  



</script>

</body>
</html>