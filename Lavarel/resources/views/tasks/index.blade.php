@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Danh sách Task</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Thêm mới</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th width="250px">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @if($task->completed)
                            <span class="badge bg-success">Hoàn thành</span>
                        @else
                            <span class="badge bg-warning text-dark">Chưa hoàn thành</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a class="btn btn-info btn-sm" href="{{ route('tasks.show', $task->id) }}">Xem</a>
                            <a class="btn btn-warning btn-sm" href="{{ route('tasks.edit', $task->id) }}">Sửa</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Chưa có task nào. <a href="{{ route('tasks.create') }}">Tạo task mới</a></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection