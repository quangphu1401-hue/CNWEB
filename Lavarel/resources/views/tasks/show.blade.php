@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Chi tiết Task</h3>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm">Quay lại</a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>ID:</strong> {{ $task->id }}
                </div>
                
                <div class="mb-3">
                    <strong>Tiêu đề:</strong>
                    <p class="mt-1">{{ $task->title }}</p>
                </div>

                <div class="mb-3">
                    <strong>Mô tả:</strong>
                    <p class="mt-1">{{ $task->description }}</p>
                </div>

                @if($task->long_description)
                <div class="mb-3">
                    <strong>Mô tả chi tiết:</strong>
                    <p class="mt-1">{{ $task->long_description }}</p>
                </div>
                @endif

                <div class="mb-3">
                    <strong>Trạng thái:</strong>
                    @if($task->completed)
                        <span class="badge bg-success ms-2">Hoàn thành</span>
                    @else
                        <span class="badge bg-warning text-dark ms-2">Chưa hoàn thành</span>
                    @endif
                </div>

                <div class="mb-3">
                    <strong>Ngày tạo:</strong> {{ $task->created_at->format('d/m/Y H:i:s') }}
                </div>

                <div class="mb-3">
                    <strong>Cập nhật lần cuối:</strong> {{ $task->updated_at->format('d/m/Y H:i:s') }}
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa task này?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

