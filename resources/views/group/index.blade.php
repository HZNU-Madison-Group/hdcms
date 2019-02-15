@extends('layouts.admin')
@section('content')
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('group.index')}}">
                用户组列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('group.create')}}">
                添加用户组
            </a>
        </li>
    </ul>
    <div class="card">
        <div class="card-header">
            会员组列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">名称</th>
                    <th scope="col">可创建站点数量</th>
                    <th scope="col">有效期限</th>
                    <th scope="col">系统组</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{$group['name']}}</td>
                        <td>{{$group['site_num']}}</td>
                        <td>
                            <span class="badge badge-success">{{$group['days']}}天</span>
                        </td>
                        <td>
                            @if ($group['system'])
                                <i class="fa fa-check-square-o text-success"></i>
                            @else
                                <i class="fa fa-times-circle text-secondary"></i>
                            @endif
                        </td>
                        <td class=" text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a class="btn btn-secondary" href="{{route('group.edit',$group)}}">编辑</a>
                                @can('delete',$group)
                                    <button type="button" class="btn btn-secondary" onclick="destroy(this)">删除</button>
                                    <form action="{{route('group.destroy',$group)}}" method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function destroy(bt) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除会员组吗？', function () {
                    $(bt).next('form').submit();
                });
            })
        }
    </script>
@endpush