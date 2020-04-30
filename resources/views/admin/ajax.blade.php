@foreach($res as $v)
    <tr id="{{$v->vis_id}}">
        <td>{{$v->vis_id}}</td>
        <td>{{$v->cust_name}}</td>
        <td>{{$v->sale_name}}</td>
        <td zi="vis_name">
        <span class="aa">{{$v->vis_name}}</span>
        <input type="text" value="{{$v->vis_name}}" style="display: none;" class="bb">
        </td>
        <td>{{$v->vis_time}}</td>
        <td>{{$v->vis_uptime}}</td>
        <td>{{$v->vis_url}}</td>
        <td>{{$v->vis_desc}}</td>
        <td><a  href="{{url('/visdele/'.$v->vis_id)}}">删除</a>
        <a href="{{url('/visup/'.$v->vis_id)}}">修改</a>
        </td>
    </tr>
    @endforeach
		<tr>
			<td colspan="6" align="center">{{ $res->appends(['vis_name' => $vis_name])->links() }}</td>
		</tr>